<?php

namespace App\Support;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImpersonationManager
{
    public const IMPERSONATOR_ID = 'impersonator_id';
    public const IMPERSONATOR_NAME = 'impersonator_name';
    public const IMPERSONATED_USER_ID = 'impersonated_user_id';

    public function start(Request $request, User $target): RedirectResponse
    {
        $admin = $request->user();

        abort_unless($admin?->isAdmin(), 403);
        abort_if($admin->is($target), 403);
        abort_if($target->isAdmin(), 403);

        $company = $target->companies()
            ->orderBy('name')
            ->firstOrFail();

        $redirect = new RedirectResponse($this->dashboardUrl($company));

        Auth::guard('web')->login($target);
        $request->session()->regenerate();
        $request->session()->put(self::IMPERSONATOR_ID, $admin->getKey());
        $request->session()->put(self::IMPERSONATOR_NAME, $admin->name ?: $admin->email);
        $request->session()->put(self::IMPERSONATED_USER_ID, $target->getKey());
        $request->session()->put('current_company_id', $company->getKey());
        $this->storePasswordHashInSession($request, $target);

        return $redirect;
    }

    public function stop(Request $request): RedirectResponse
    {
        $adminId = $request->session()->get(self::IMPERSONATOR_ID);

        abort_unless($adminId, 403);

        $admin = User::findOrFail($adminId);

        $redirect = new RedirectResponse(url('admin'));

        Auth::guard('web')->login($admin);
        $request->session()->forget([
            self::IMPERSONATOR_ID,
            self::IMPERSONATOR_NAME,
            self::IMPERSONATED_USER_ID,
            'current_company_id',
        ]);

        $request->session()->regenerate();
        $this->storePasswordHashInSession($request, $admin);

        return $redirect;
    }

    private function dashboardUrl(Company $company): string
    {
        if ($company->isTrial()) {
            return url("dashboard/{$company->getKey()}/firmament-urls");
        }

        return url("dashboard/{$company->getKey()}");
    }

    private function storePasswordHashInSession(Request $request, User $user): void
    {
        $request->session()->put(
            'password_hash_web',
            $user->getAuthPassword(),
        );
    }
}
