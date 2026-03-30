<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

use Filament\Models\Contracts\HasTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;

use Filament\Facades\Filament;
use App\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * Class User
 * @package YourNamespace
 *
 * This class represents a user in the system.
 */
class User extends Authenticatable implements FilamentUser, HasTenants, MustVerifyEmail
{

    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    // ...

    var $panelPath;


    public function canAccessPanel(Panel $panel): bool
    {

        $tenant = Filament::getTenant();

        if ($panel->getId() == 'admin' && !$this->is_admin)
        {
            return false;
        }

        return true;

    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'login_token',
        'last_login_at',
        'login_token_expires_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }
    // In App\Models\User

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_user');
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->companies->contains($tenant);
    }

    public function getTenants(Panel $panel): Collection
    {
        return $this->companies;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return (bool) $this->is_admin;
    }

    /**
     * @return bool
     */
    public function isTrial(): bool
    {
        $company = $this->companies()->first();

        if (!$company) {
            return false;
        }

        return $company->isTrial();
    }

    /**
     * @return string
     */
    public function getPanelUri()
    {
        if ($this->is_admin == 1) {
            return 'admin';
        }

        $company = $this->companies()->orderBy('name', 'ASC')->first();

        if (!$company) {
            return '/'; // fallback
        }


        // 👉 HIER DIE MAGIC
        if ($this->isTrial()) {
            return "dashboard/{$company->id}/firmament-urls";
        }

        return "dashboard/{$company->id}";
    }

}
