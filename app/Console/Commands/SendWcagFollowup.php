<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WcagFollowupMail;
use App\Models\AutomationLog;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SendWcagFollowup extends Command
{
    protected $signature = 'followup:wcag';
    protected $description = 'Send WCAG follow-up mails after XX hours';

    public function handle()
    {
        $companies = Company::where('source', 'wcag_tool')
            ->whereNull('converted_at')
            ->whereDoesntHave('contracts')
            ->where('created_at', '<=', now()->subHours(24))
            ->with(['users:id,email'])
            ->get();

        $sent = 0;

        foreach ($companies as $company) {

            $alreadySent = AutomationLog::where('company_id', $company->id)
                ->where('automation', 'wcag_followup')
                ->exists();

            if ($alreadySent) {
                continue;
            }

            $user = $company->users->first();

            if (!$user || !$user->email) {
                continue;
            }

            // 👉 TOKEN ERZEUGEN + SPEICHERN
            $token = Str::random(40);

            $user->update([
                'login_token' => $token,
                'login_token_expires_at' => now()->addHours(24),
            ]);

            // 👉 MAIL MIT TOKEN
            Mail::to($user->email)
                ->send(new WcagFollowupMail($company, $user, $token));

            // 👉 LOG
            AutomationLog::create([
                'company_id' => $company->id,
                'automation' => 'wcag_followup',
                'sent_at' => now(),
            ]);

            $sent++;
        }
        $this->info("Follow-ups sent: {$sent}");
    }
}
