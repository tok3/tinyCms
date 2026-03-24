<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyReminderMail;
use App\Models\AutomationLog;
use Illuminate\Support\Facades\URL;

class SendVerifyReminder extends Command
{
    protected $signature = 'followup:verify';
    protected $description = 'Send verify reminder emails';

    public function handle()
    {
        $companies = Company::where('source', 'wcag_tool')
            ->whereNull('converted_at')
            ->whereDoesntHave('contracts')
            ->with(['users'])
            ->get();

        $sent = 0;

        foreach ($companies as $company) {

            $user = $company->users->first();

            if (!$user || !$user->email) {
                continue;
            }

            // 👉 nur NICHT verifizierte User
            if ($user->email_verified_at !== null) {
                continue;
            }

            // 👉 schon Reminder geschickt?
            $alreadySent = AutomationLog::where('company_id', $company->id)
                ->where('automation', 'verify_reminder')
                ->exists();

            if ($alreadySent) {
                continue;
            }

            // 👉 VERIFY LINK generieren (Laravel Standard)
            $verifyUrl = URL::temporarySignedRoute(
                'verification.verify',
                now()->addHours(48),
                [
                    'id' => $user->id,
                    'hash' => sha1($user->email),
                ]
            );

            // 👉 scanned URL (optional)
            $scannedUrl = $company->pa11yUrls()->first()?->url;

            Mail::to($user->email)
                ->send(new VerifyReminderMail($company, $user, $verifyUrl, $scannedUrl));

            AutomationLog::create([
                'company_id' => $company->id,
                'automation' => 'verify_reminder',
                'sent_at' => now(),
            ]);

            $sent++;
        }

        $this->info("Verify reminders sent: {$sent}");
    }
}
