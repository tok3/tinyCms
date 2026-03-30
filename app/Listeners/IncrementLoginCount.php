<?php
namespace App\Listeners;

use Illuminate\Auth\Events\Login;

class IncrementLoginCount
{
    public function handle(Login $event): void
    {
        $user = $event->user;

        $user->increment('login_count');
        $user->update([
            'last_login_at' => now(),
        ]);
    }
}
