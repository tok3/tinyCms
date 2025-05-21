<?php

namespace App\Providers\Filament;

use App\Filament\Resources\Admin\MollieSubscriptionResource;
use Filament\Facades\Filament;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use http\Env\Request;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\Company;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\MinimalTheme;

class DashboardPanelProvider extends PanelProvider
{


    public function panel(Panel $panel): Panel
    {

        $tenant_id = \Request::segment(2);

        $panel->id('dashboard')
            ->path('dashboard')
            ->profile()
            ->tenant(Company::class)
            ->login()
            ->plugin(new MinimalTheme())
            ->viteTheme(['resources/css/app.css', 'resources/css/filament/admin/theme.css'])
            ->colors(MinimalTheme::getColors())
            ->icons(MinimalTheme::getIcons())
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('15rem')
            ->discoverResources(in: app_path('Filament/Resources/User'), for: 'App\\Filament\\Resources\\User')
            ->discoverResources(in: app_path('Filament/Resources/Shared'), for: 'App\\Filament\\Resources\\Shared')
            ->discoverPages(in: app_path('Filament/Dashboard/Pages'), for: 'App\\Filament\\Dashboard\\Pages')
            ->pages([
                Pages\Dashboard::class,

                 ])
            ->resources([

                MollieSubscriptionResource::class,

                // Weitere Ressourcen können hier hinzugefügt werden
            ])
            ->widgets([
                Widgets\AccountWidget::class,
                \App\Filament\Dashboard\Widgets\FixsternInfoWidget::class,
                \App\Filament\Dashboard\Widgets\FixsternIntegrationWidget::class,

                //\App\Filament\Dashboard\Widgets\Pa11yStatChart::class,
                \App\Filament\Dashboard\Widgets\FirmamentInfoWidget::class,
                \App\Filament\Widgets\PdfHashWidget::class,
                //Widgets\FilamentInfoWidget::class,

            ])
            //->discoverWidgets(in: app_path('Filament/Dashboard/Widgets'), for: 'App\\Filament\\Dashboard\\Widgets')

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
            ->navigationItems([

                /*    NavigationItem::make('Firmendaten')
                        ->url('/'.$panel->getId().'/'.$tenant_id.'/companies/'.$tenant_id.'/edit', shouldOpenInNewTab: false)
                        ->icon('heroicon-o-newspaper')
                        ->sort(3),
    */
                /*  NavigationItem::make('Analytics')
                      ->visible(fn(): bool => auth()->user()->can('view-analytics')),*/
                // ...
            ]);


        return $panel;
    }
}
