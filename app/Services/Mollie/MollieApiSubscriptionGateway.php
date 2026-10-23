<?php

namespace App\Services\Mollie;

use App\Contracts\MollieSubscriptionGateway;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use UnexpectedValueException;

class MollieApiSubscriptionGateway implements MollieSubscriptionGateway
{
    private const API_BASE = 'https://api.mollie.com/v2/';

    public function __construct(private ?ClientInterface $client = null)
    {
        $this->client ??= new Client;
    }

    public function status(string $customerId, string $subscriptionId): string
    {
        $response = $this->client->request('GET', $this->subscriptionUrl($customerId, $subscriptionId), [
            'headers' => $this->headers(),
        ]);
        $body = json_decode((string) $response->getBody(), true);

        if (! is_array($body) || ! is_string($body['status'] ?? null)) {
            throw new UnexpectedValueException('Mollie subscription response has no status.');
        }

        return $body['status'];
    }

    public function cancel(string $customerId, string $subscriptionId): void
    {
        $response = $this->client->request('DELETE', $this->subscriptionUrl($customerId, $subscriptionId), [
            'headers' => $this->headers(),
        ]);

        if ($response->getStatusCode() === 204) {
            return;
        }

        $body = json_decode((string) $response->getBody(), true);

        if (! is_array($body) || ($body['status'] ?? null) !== 'canceled') {
            throw new UnexpectedValueException('Mollie did not confirm subscription cancellation.');
        }
    }

    private function subscriptionUrl(string $customerId, string $subscriptionId): string
    {
        return self::API_BASE.'customers/'.rawurlencode($customerId).'/subscriptions/'.rawurlencode($subscriptionId);
    }

    private function headers(): array
    {
        return [
            'Authorization' => 'Bearer '.config('mollie.key'),
            'Accept' => 'application/json',
        ];
    }
}
