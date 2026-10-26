<?php

namespace App\Rules;

use App\Services\EmailDomainBlocklist;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class PermanentEmailAddress implements ValidationRule
{
    public function __construct(private readonly EmailDomainBlocklist $blocklist) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (is_string($value) && $this->blocklist->blocks($value)) {
            $fail('Bitte verwenden Sie eine echte, dauerhaft erreichbare E-Mail-Adresse. Wegwerf- und Beispieladressen sind nicht erlaubt.');
        }
    }
}
