<?php

use App\Services\OpenAIService;
use Illuminate\Support\Facades\Log;

function textGenerationServiceForTest(object $chat): OpenAIService
{
    $client = new class($chat) {
        public function __construct(private object $resource) {}
        public function chat(): object { return $this->resource; }
    };

    return new class($client) extends OpenAIService {
        public function __construct(object $client) { $this->client = $client; }
    };
}

test('text generation uses Luna without consuming the output budget for reasoning', function () {
    $chat = Mockery::mock();
    $chat->shouldReceive('create')->once()->with(Mockery::on(fn (array $params) =>
        $params['model'] === 'gpt-6-luna'
        && $params['reasoning_effort'] === 'none'
        && $params['max_completion_tokens'] === 500
        && !isset($params['max_tokens'])
    ))->andReturn(['choices' => [['message' => ['content' => 'Ein kurzer Text.']]]]);

    expect(textGenerationServiceForTest($chat)->generateText('Vereinfache diesen Text.'))
        ->toBe('Ein kurzer Text.');
    Mockery::close();
});

test('provider errors do not become generated text', function () {
    $chat = Mockery::mock();
    $chat->shouldReceive('create')->once()->andThrow(new RuntimeException('Model unavailable'));
    Log::shouldReceive('warning')->once()->with('Text generation failed.', [
        'model' => 'gpt-6-luna',
        'message' => 'Model unavailable',
    ]);

    expect(textGenerationServiceForTest($chat)->generateText('Ein Text.'))->toBe('');
    Mockery::close();
    Log::clearResolvedInstances();
});
