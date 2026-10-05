<?php

use App\Console\Commands\ProcessImages;
use Illuminate\Console\OutputStyle;
use Illuminate\Container\Container;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

beforeEach(function () {
    $this->previousFacadeApp = Facade::getFacadeApplication();
    Facade::clearResolvedInstances();
    Facade::setFacadeApplication(new Container());
    DB::swap(Mockery::mock());
    Http::swap(Mockery::mock());
    Log::swap(Mockery::mock());

    $query = Mockery::mock();
    DB::shouldReceive('table')->with('imagetags')->andReturn($query);
    $query->shouldReceive('whereNull')->with('hash')->andReturnSelf();
    $query->shouldReceive('whereNull')->with('deleted_at')->andReturnSelf();
    $query->shouldReceive('limit')->with(20)->andReturnSelf();
    $query->shouldReceive('get')->with(['id', 'url', 'ulid', 'lang'])->andReturn(collect([
        (object) ['id' => 123, 'url' => 'https://example.test/image', 'ulid' => 'test', 'lang' => 'de'],
    ]));
    $query->shouldReceive('where')->once()->with('id', 123)->andReturnSelf();
    $query->shouldReceive('update')->once()->with(Mockery::on(fn ($values) => isset($values['deleted_at'])))->andReturn(1);

    $this->request = Mockery::mock();
    Http::shouldReceive('withHeaders')->once()->andReturn($this->request);
    $this->request->shouldReceive('timeout')->with(10)->andReturnSelf();
    $this->output = new BufferedOutput();
    $this->command = new ProcessImages();
    $this->command->setOutput(new OutputStyle(new ArrayInput([]), $this->output));
});

afterEach(function () {
    Mockery::close();
    Facade::clearResolvedInstances();
    Facade::setFacadeApplication($this->previousFacadeApp);
});

test('large HTTP error pages are discarded and the failed image is retired', function () {
    $body = str_repeat('<div>REMOTE_HTML_BODY</div>', 40000);
    $response = new Response(new GuzzleHttp\Psr7\Response(404, [], $body));
    $this->request->shouldReceive('get')->once()->andReturn($response);
    Log::shouldReceive('error')->once()->with('Error processing image ID 123: HTTP 404 while downloading image');

    $result = (new ReflectionMethod(ProcessImages::class, 'processImages'))->invoke($this->command);
    $output = $this->output->fetch();

    expect($result)->toBe(0);
    expect($output)->toContain('HTTP 404', 'Image processing completed.')
        ->not->toContain('REMOTE_HTML_BODY');
    expect(strlen($output))->toBeLessThan(500);
});

test('other exceptions are bounded and console markup is rendered literally', function () {
    $message = '<info>untrusted</info>'.str_repeat('x', 10000);
    $this->request->shouldReceive('get')->once()->andThrow(new RuntimeException($message));
    Log::shouldReceive('error')->once()->with(Mockery::on(fn ($message) => strlen($message) < 600));

    (new ReflectionMethod(ProcessImages::class, 'processImages'))->invoke($this->command);
    $output = $this->output->fetch();

    expect($output)->toContain('<info>untrusted</info>', 'Image processing completed.');
    expect(strlen($output))->toBeLessThan(800);
});
