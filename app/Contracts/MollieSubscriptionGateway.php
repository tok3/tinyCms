<?php

namespace App\Contracts;

interface MollieSubscriptionGateway
{
    public function status(string $customerId, string $subscriptionId): string;

    public function cancel(string $customerId, string $subscriptionId): void;
}
