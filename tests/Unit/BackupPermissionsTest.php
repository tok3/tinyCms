<?php

use App\Backup\PrunedFileSelection;
use App\Services\SharedTemporaryDirectory;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Symfony\Component\Finder\Exception\AccessDeniedException;

beforeEach(function () {
    $this->root = sys_get_temp_dir().'/akb-backup-test-'.bin2hex(random_bytes(6));
    mkdir($this->root, 0700);
});

afterEach(function () {
    $remove = function ($path) use (&$remove) {
        if (is_dir($path) && !is_link($path)) {
            chmod($path, 0700);
            foreach (scandir($path) as $name) {
                if ($name !== '.' && $name !== '..') $remove($path.'/'.$name);
            }
            rmdir($path);
        } else {
            unlink($path);
        }
    };
    $remove($this->root);
});

test('excluded unreadable directories are pruned before traversal', function () {
    mkdir($this->root.'/private', 0000);
    file_put_contents($this->root.'/keep.txt', 'keep');
    $selection = (new PrunedFileSelection([$this->root]))->excludeFilesFrom([$this->root.'/private']);
    expect(iterator_to_array($selection->selectedFiles()))->toBe([$this->root.'/keep.txt']);
});

test('unreadable included directories still fail instead of silently omitting data', function () {
    mkdir($this->root.'/private', 0000);
    if (is_readable($this->root.'/private')) $this->markTestSkipped('Run without root privileges.');
    expect(fn () => iterator_to_array((new PrunedFileSelection([$this->root]))->selectedFiles()))
        ->toThrow(AccessDeniedException::class);
});

test('late exclusions and explicit files respect directory boundaries', function () {
    mkdir($this->root.'/private');
    mkdir($this->root.'/private-other');
    file_put_contents($this->root.'/private/skip.txt', 'skip');
    file_put_contents($this->root.'/private-other/keep.txt', 'keep');
    file_put_contents($this->root.'/skip.txt', 'skip');
    $selection = new PrunedFileSelection([$this->root, $this->root.'/skip.txt']);
    $selection->excludeFilesFrom([$this->root.'/private', $this->root.'/skip.txt']);
    $files = iterator_to_array($selection->selectedFiles());
    expect($files)->toContain($this->root.'/private-other/keep.txt')
        ->not->toContain($this->root.'/private/skip.txt', $this->root.'/skip.txt');
});

test('a fully excluded include root is never opened', function () {
    mkdir($this->root.'/private', 0000);
    $selection = (new PrunedFileSelection([$this->root.'/private']))->excludeFilesFrom([$this->root.'/private']);
    expect(iterator_to_array($selection->selectedFiles()))->toBe([]);
});

test('shared temp directories retain setgid and new native and Flysystem files are group writable', function () {
    $service = new SharedTemporaryDirectory();
    $mask = umask();
    $service->run(function () {
        file_put_contents($this->root.'/temp/native.txt', 'native');
        $disk = new Filesystem(new LocalFilesystemAdapter($this->root));
        $disk->write('temp/flysystem.txt', 'flysystem');
    }, $this->root.'/temp');
    $service->run(fn () => null, $this->root.'/temp');
    clearstatcache();
    expect(fileperms($this->root.'/temp') & 07777)->toBe(02770)
        ->and(fileperms($this->root.'/temp/native.txt') & 0777)->toBe(0660)
        ->and(fileperms($this->root.'/temp/flysystem.txt') & 0777)->toBe(0660)
        ->and(umask())->toBe($mask);
});

test('shared temp operations restore the process mask after failure', function () {
    $mask = umask();
    expect(fn () => (new SharedTemporaryDirectory())->run(
        fn () => throw new RuntimeException('test failure'), $this->root.'/temp'
    ))->toThrow(RuntimeException::class);
    expect(umask())->toBe($mask);
});
