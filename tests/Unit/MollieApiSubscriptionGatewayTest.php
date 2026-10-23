<?php

use App\Services\Mollie\MollieApiSubscriptionGateway;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

uses(TestCase::class);

function mollieGatewayWithResponses(array $responses, array &$history): MollieApiSubscriptionGateway
{
    $mock = new MockHandler($responses);
    $stack = HandlerStack::create($mock);
    $stack->push(Middleware::history($history));

    config()->set('mollie.key', 'test_contract_lifecycle_key');

    return new MollieApiSubscriptionGateway(new Client(['handler' => $stack]));
}

it('reads the remote subscription status with authenticated customer scope', function () {
    $history = [];
    $gateway = mollieGatewayWithResponses([
        new Response(200, ['Content-Type' => 'application/json'], json_encode([
            'resource' => 'subscription',
            'id' => 'sub_123',
            'status' => 'active',
        ])),
    ], $history);

    expect($gateway->status('cst_123', 'sub_123'))->toBe('active');

    $request = $history[0]['request'];
    expect($request->getMethod())->toBe('GET')
        ->and((string) $request->getUri())->toBe('https://api.mollie.com/v2/customers/cst_123/subscriptions/sub_123')
        ->and($request->getHeaderLine('Authorization'))->toBe('Bearer test_contract_lifecycle_key');
});

it('accepts current and legacy successful cancellation responses', function (int $status, string $body) {
    $history = [];
    $gateway = mollieGatewayWithResponses([new Response($status, [], $body)], $history);

    $gateway->cancel('cst_456', 'sub_456');

    expect($history[0]['request']->getMethod())->toBe('DELETE')
        ->and((string) $history[0]['request']->getUri())
        ->toBe('https://api.mollie.com/v2/customers/cst_456/subscriptions/sub_456');
})->with([
    'current 200 object' => [200, '{"resource":"subscription","id":"sub_456","status":"canceled"}'],
    'legacy 204 response' => [204, ''],
]);

it('rejects malformed success and Mollie error responses', function (Response $response, string $exceptionClass) {
    $history = [];
    $gateway = mollieGatewayWithResponses([$response], $history);

    expect(fn () => $gateway->cancel('cst_error', 'sub_error'))->toThrow($exceptionClass);
})->with([
    'wrong status in 200 body' => [
        new Response(200, [], '{"resource":"subscription","status":"active"}'),
        UnexpectedValueException::class,
    ],
    'client error' => [
        new Response(404, [], '{"status":404,"title":"Not Found"}'),
        ClientException::class,
    ],
]);
