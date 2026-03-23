<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WcagFollowupMail;
use App\Models\AutomationLog;

class SendWcagFollowup extends Command
{
    protected $signature = 'followup:wcag';
    protected $description = 'Send WCAG follow-up mails after 24 hours';

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
                ->where('automation', 'wcag_followup_24h')
                ->exists();

            if ($alreadySent) {
                continue;
            }

            $user = $company->users->first();

            if (!$user || !$user->email) {
                continue;
            }

            Mail::to($user->email)
                ->send(new WcagFollowupMail($company, $user));

            AutomationLog::create([
                'company_id' => $company->id,
                'automation' => 'wcag_followup_24h',
                'sent_at' => now(),
            ]);

            $sent++;
        }
        $this->info("Follow-ups sent: {$sent}");
    }
}
