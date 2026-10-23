<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use LogicException;

class ContractLifecycleEvent extends Model
{
    protected $fillable = [
        'contract_id',
        'user_id',
        'type',
        'occurred_at',
        'idempotency_key',
        'context',
    ];

    protected $casts = [
        'occurred_at' => 'datetime',
        'context' => 'array',
    ];

    protected function performUpdate(Builder $query): bool
    {
        throw new LogicException('Contract lifecycle events are append-only.');
    }

    public function delete()
    {
        if ($this->exists) {
            throw new LogicException('Contract lifecycle events are append-only.');
        }

        return parent::delete();
    }

    public static function record(
        Contract $contract,
        string $type,
        array $context = [],
        ?int $actorId = null,
        ?string $idempotencyKey = null
    ): self {
        $attributes = [
            'contract_id' => $contract->getKey(),
            'user_id' => $actorId,
            'type' => $type,
            'occurred_at' => now(),
            'context' => $context,
        ];

        if ($idempotencyKey === null) {
            return static::query()->create($attributes);
        }

        return static::query()->firstOrCreate(
            ['idempotency_key' => $idempotencyKey],
            $attributes
        );
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
