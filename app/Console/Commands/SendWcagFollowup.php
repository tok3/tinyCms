<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\WcagFollowupMail;
use App\Models\AutomationLog;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Services\DemoUrlDiscoveryService;
use App\Models\Pa11yUrl;

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

            $urlCount = Pa11yUrl::where('company_id', $company->id)->count();

            if ($urlCount < 5) {

                $firstUrl = Pa11yUrl::where('company_id', $company->id)
                    ->latest()
                    ->first();

                if ($firstUrl && filter_var($firstUrl->url, FILTER_VALIDATE_URL)) {

                    $parsed = parse_url($firstUrl->url);

                    if (!empty($parsed['scheme']) && !empty($parsed['host'])) {

                        $domain = $parsed['scheme'] . '://' . $parsed['host'];

                        app(DemoUrlDiscoveryService::class)
                            ->discoverAndScan($company, $domain, 10);

                        \Log::info("Demo Scan gestartet für Company {$company->id} ({$domain})");
                    }
                }
            }

            // kleine Pause damit Jobs anlaufen
            usleep(500000);

            Mail::to($user->email)
                ->send(new WcagFollowupMail($company, $user, $token));

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
