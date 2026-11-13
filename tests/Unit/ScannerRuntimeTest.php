<?php

use App\Support\ScannerRuntime;
use Illuminate\Config\Repository;
use Illuminate\Container\Container;

beforeEach(function () {
    $this->previousContainer = Container::getInstance();
    $container = new Container;
    $container->instance('config', new Repository);
    Container::setInstance($container);
});

afterEach(function () {
    Container::setInstance($this->previousContainer);
});

it('keeps the legacy TLS option as the local default', function () {
    expect(ScannerRuntime::tlsOption())->toBe('ignoreHTTPSErrors');
});

it('writes the selected TLS option into both real scanner configurations', function ($option) {
    config(['accessibility_scan.browser.tls_option' => $option,
        'accessibility_scan.browser.use_temp_profile' => false]);
    foreach ([App\Console\Commands\ScanAccessibility21::class, App\Console\Commands\ScanAccessibility22::class] as $class) {
        $command = new $class;
        $method = new ReflectionMethod($command, 'buildPa11yConfigFile');
        $path = $method->invoke($command, '/test/chrome', ['--no-sandbox']);
        try {
            $contents = file_get_contents($path);
            $json = substr($contents, strlen('module.exports = '));
            $config = json_decode(substr($json, 0, strrpos($json, ';')), true, 512, JSON_THROW_ON_ERROR);
            expect($config['chromeLaunchConfig'][$option])->toBeTrue()
                ->and($config['chromeLaunchConfig']['executablePath'])->toBe('/test/chrome')
                ->and(array_key_exists($option === 'acceptInsecureCerts' ? 'ignoreHTTPSErrors' : 'acceptInsecureCerts', $config['chromeLaunchConfig']))->toBeFalse();
        } finally {
            unlink($path);
        }
    }
})->with(['ignoreHTTPSErrors', 'acceptInsecureCerts']);

it('rejects misspelled TLS options instead of silently losing compatibility', function () {
    config(['accessibility_scan.browser.tls_option' => 'acceptInsecureCert']);
    ScannerRuntime::tlsOption();
})->throws(InvalidArgumentException::class);

it('isolates writable Chrome data and keeps certificate validation for HTMLCS and public scans', function () {
    config(['accessibility_scan.browser.path' => '/test/chrome',
        'accessibility_scan.browser.args' => ['--no-sandbox']]);
    $files = ScannerRuntime::createValidatedConfig();
    try {
        $contents = file_get_contents($files[0]);
        $json = substr($contents, strlen('module.exports = '));
        $config = json_decode(substr($json, 0, strrpos($json, ';')), true, 512, JSON_THROW_ON_ERROR);
        expect($config['chromeLaunchConfig']['env']['XDG_CONFIG_HOME'])->toBe($files[1].'/config')
            ->and($config['chromeLaunchConfig']['executablePath'])->toBe('/test/chrome')
            ->and(isset($config['chromeLaunchConfig']['acceptInsecureCerts']))->toBeFalse()
            ->and(isset($config['chromeLaunchConfig']['ignoreHTTPSErrors']))->toBeFalse();
    } finally {
        ScannerRuntime::removeValidatedConfig($files);
    }
    expect(file_exists($files[0]))->toBeFalse()->and(file_exists($files[1]))->toBeFalse();
});
