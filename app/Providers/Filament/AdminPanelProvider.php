<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\Company;
use Filament\Navigation\NavigationGroup;
use Filament\MinimalTheme;
use Filament\Support\Enums\MaxWidth;
use Filament\Facades\Filament;
use Livewire\Livewire;
use App\Http\Livewire\MoveBlockModal;
class AdminPanelProvider extends PanelProvider
{

    protected static ?string $navigationGroup = 'Settings';
    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerRenderHook('scripts.end', fn () => view('filament.includes.move-block-button'));
            Livewire::component('move-block-modal', MoveBlockModal::class);
        });
    }
    public function panel(Panel $panel): Panel
    {

        /*The options for are maxContentWidth ExtraSmall, Small, Medium, Large, ExtraLarge, TwoExtraLarge, ThreeExtraLarge, FourExtraLarge, FiveExtraLarge, SixExtraLarge, SevenExtraLarge, Full, MinContent, MaxContent, FitContent, Prose, ScreenSmall, ScreenMedium, ScreenLarge, ScreenExtraLarge and ScreenTwoExtraLarge. The default is SevenExtraLarge*/

        return $panel
            ->default()
            ->profile()
            ->id('admin')
            ->path('admin')
            ->login()
            ->plugin(new MinimalTheme())
            ->viteTheme(['resources/css/utilities.css','resources/css/filament/admin/theme.css'])
            ->colors(MinimalTheme::getColors())
            ->icons(MinimalTheme::getIcons())
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth(MaxWidth::SevenExtraLarge)->sidebarCollapsibleOnDesktop(false)
            ->sidebarFullyCollapsibleOnDesktop()
            ->sidebarWidth('15rem')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,

                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ;
    }
}
