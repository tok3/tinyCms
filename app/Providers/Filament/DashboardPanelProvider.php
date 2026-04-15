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
use Filament\PluginServiceProvider;
use Filament\Support\Assets\Js;
use Filament\Support\Assets\Css;

class DashboardPanelProvider extends PanelProvider
{


    public function panel(Panel $panel): Panel
    {
        $tenant_id = \Request::segment(2);

       $tenant = Company::where('id', $tenant_id)->first();



        $items = [];

        $items[] = NavigationItem::make('Termin Vereinbaren')
            ->url('https://calendar.google.com/calendar/appointments/schedules/AcZssZ002z7FSLxfqDLL47QcSvPz_XZbGC-2uwnyJso0MjsOmuNK9FDuwO_HG3uJKMpsWoLqfOBefBw9?gv=true', shouldOpenInNewTab: true)
            ->icon('heroicon-o-calendar')
            ->sort(999);


        $upsellFeatures = [
            'image-alt-tags' => [
                'label' => 'altStar',
                'icon'  => 'icon-img-tag',
            ],
            'widget-support' => [
                'label' => 'fixstern',
                'icon'  => 'fixstern-fi-icon',
            ],
            'barrierefreiheitserklaerung' => [
                'label' => 'be. Barrierefreiheitserklaerung',
                'icon'  => 'be-card-check',
            ],
            'inclucert' => [
                'label' => 'incluCert',
                'icon'  => 'inclu-cert-shield',
            ],
        ];

        foreach ($upsellFeatures as $feature => $config) {
            if (! $tenant?->hasFeature($feature)) {

                $items[] = NavigationItem::make($config['label'])
                    ->url("#feature={$feature}")
                    ->icon($config['icon'])
                    ->group('Features')
                    ->sort(1000);
            }
        }




        $widgets = [
            Widgets\AccountWidget::class,
            \App\Filament\Dashboard\Widgets\CalendarAppointmentWidget::class,
            \App\Filament\Dashboard\Widgets\AgencyCreateCustomerWidget::class,
            \App\Filament\Dashboard\Widgets\FixsternInfoWidget::class,
            \App\Filament\Dashboard\Widgets\FixsternIntegrationWidget::class,
            \App\Filament\Dashboard\Widgets\ImageTagsIntegrationWidget::class,
            \App\Filament\Dashboard\Widgets\FirmamentInfoWidget::class,

        ];


        $panel->id('dashboard')
            ->path('dashboard')
            ->profile()
            ->tenant(Company::class)
            ->login()
            ->plugin(new MinimalTheme())
            ->viteTheme(['resources/css/app.css', 'resources/css/filament/admin/theme.css'])
            ->colors(MinimalTheme::getColors())
            ->darkMode(false)
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
            ->widgets(
                $widgets
            )
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
            ->assets([
                Js::make('shepherd', 'https://cdn.jsdelivr.net/npm/shepherd.js@11.2.0/dist/js/shepherd.min.js'),
                Js::make('trial-tour', resource_path('trial-tour.js')),
                Js::make('panel-dashboard-custom', resource_path('panel-dashboard-custom.js')),
                Css::make('shepherd-css', 'https://cdn.jsdelivr.net/npm/shepherd.js@11.2.0/dist/css/shepherd.css'),
                Css::make('shepherd-custom', resource_path('shepherd-custom.css')),
            ])
            ->renderHook(
                'panels::body.end',
                fn () => view('filament.partials.trial-data')

            )
            ->renderHook(
                'panels::page.end',
                fn () => view('filament.partials.tour-button')
            )
            ->renderHook(
                'body.end',
                fn () => view('filament.modals.upgrade-modal')
            )
            ->renderHook(
                'panels::body.end',
                fn () => view('filament.modals.upsell-modal')
            )
            ->renderHook(
                'panels::scripts.after',
                fn () => '<script src="' . asset('js/upsell-modal.js') . '"></script>'
            )
            ->renderHook(
                'panels::body.end',
                fn () => view('filament.partials.upsell-templates')
            )
            ->navigationItems($items);



        return $panel;
    }
}
