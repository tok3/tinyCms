<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Filament\Resources\Shared;
use App\Models\Company;
use App\Models\CompanySetting;
use App\Models\Product;
use App\Filament\Resources\Admin\ProductResource;
use App\Forms\Components\InfoBox;
use Illuminate\Support\HtmlString;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Image;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;
use Filament\Notifications\Notification;
use Filament\Facades\Filament;
use App\Filament\Resources\Admin\ContractResource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\View as ViewField;
use Filament\Actions\Action;
use App\Http\Controllers\CrawlController;
use Illuminate\Http\Request;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function getPluralModelLabel(): string
    {
        return 'Firmen';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Company Information')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Firmendetails')
                            ->schema([
                                Forms\Components\Section::make(function ($record) {
                                    $title = 'Firmendetails';
                                    $basePath = asset(config('filament.icons.path', 'assets/icons'));

                                    if ($record)
                                    {
                                        if ($record->is_agency)
                                        {
                                            // Agency-Icon (blau)
                                            $icon = sprintf(
                                                '<img src="%s/tenancy.svg" class="w-4 h-4 inline-block ml-2" style="color:#3b82f6;" alt="Agency">',
                                                $basePath
                                            );
                                        }
                                        elseif (!empty($record->agency_company_id))
                                        {
                                            // Tenant-Icon (grün)
                                            $icon = sprintf(
                                                '<img src="%s/tenant.svg" class="w-4 h-4 inline-block ml-2" style="color:#10b981;" alt="Tenant">',
                                                $basePath
                                            );
                                        }
                                        else
                                        {
                                            // Standard → Heroicon
                                            $icon = '<x-heroicon-o-building-office-2 class="w-4 h-4 inline-block ml-2 text-gray-400" />';
                                        }

                                        $title .= $icon;
                                    }

                                    return new HtmlString($title);
                                })
                                    ->schema([
                                        ViewField::make('agencyBadge')
                                            ->view('filament.components.company-agency-banner')
                                            ->columns(2)
                                            ->visible(fn($record) => (auth()->user()?->is_admin ?? false)
                                                && !empty($record?->agency_company_id)
                                            ),

                                        FileUpload::make('logo_image')
                                            ->label('Firmenlogo')
                                            ->disk('public')
                                            ->directory('logo-images')
                                            ->acceptedFileTypes(['image/*'])
                                            ->image()
                                            ->storeFileNamesIn('logo_orig_filename'),

                                        Forms\Components\Select::make('type')
                                            ->label('Organisationstyp')
                                            ->options([
                                                '0' => 'Unternehmen',
                                                '1' => 'Gemeinde / Behörde',
                                                '2' => 'Verein',
                                            ])
                                            ->required(),


                                        Forms\Components\TextInput::make('name')
                                            ->label(function ($record) {
                                                if ($record && $record->billing_via_agency)
                                                {
                                                    return new HtmlString('<strong>Kunde / Projektname / Domain</strong>');
                                                }

                                                return 'Firmenname';
                                            })
                                            ->maxLength(255)
                                            ->required()
                                            ->placeholder('Firmennamen eingeben'),

                                        Forms\Components\TextInput::make('name_2')
                                            ->label('Firmennamen 2')
                                            ->maxLength(255)
                                            ->nullable()
                                            ->placeholder('Firmennamen 2'),

                                        Forms\Components\TextInput::make('str')
                                            ->label('Straße')
                                            ->maxLength(255)
                                            ->placeholder('Straße eingeben')
                                            // ausblenden, wenn über Agentur abgerechnet wird
                                            ->hidden(fn($get) => $get('billing_via_agency')),

                                        Forms\Components\Grid::make(6)
                                            ->schema([
                                                Forms\Components\TextInput::make('plz')
                                                    ->label('PLZ/Postcode')
                                                    ->placeholder('PLZ/Postcode')
                                                    ->columnSpan(2),

                                                Forms\Components\TextInput::make('ort')
                                                    ->label('Ort')
                                                    ->maxLength(255)
                                                    ->placeholder('Ort eingeben')
                                                    ->columnSpan(4),
                                            ])
                                            ->hidden(fn($get) => $get('billing_via_agency')),

                                        Forms\Components\Grid::make(4)
                                            ->schema([
                                                Forms\Components\TextInput::make('fon')
                                                    ->label('Telefon')
                                                    ->tel()
                                                    ->placeholder('Telefonnummer eingeben')
                                                    ->columnSpan(2),

                                                Forms\Components\TextInput::make('mobile')
                                                    ->label('Mobil')
                                                    ->tel()
                                                    ->placeholder('Mobilnummer eingeben')
                                                    ->columnSpan(2),
                                            ])
                                            ->hidden(fn($get) => $get('billing_via_agency')),

                                        Forms\Components\Grid::make(4)
                                            ->schema([
                                                Forms\Components\TextInput::make('email')
                                                    ->label('Email (Rechnung)')
                                                    ->email()
                                                    ->maxLength(255)
                                                    ->placeholder('E-Mail-Adresse eingeben')
                                                    ->columnSpan(2),

                                                Forms\Components\TextInput::make('leitweg_id')
                                                    ->label('Leitweg ID (X-Rechnung)')
                                                    ->maxLength(255)
                                                    ->placeholder('Leitweg ID (X-Rechnung)')
                                                    ->columnSpan(2),

                                                Forms\Components\TextInput::make('web')
                                                    ->label('Webseite')
                                                    ->url()
                                                    ->maxLength(255)
                                                    ->placeholder('Webseiten-URL eingeben')
                                                    ->columnSpan(2),
                                            ])
                                            ->hidden(fn($get) => $get('billing_via_agency')),

                                        // Stattdessen: Hinweis bei Abrechnung über Agentur
                                        Forms\Components\Placeholder::make('agency_billing_info')
                                            ->label('')
                                            ->content(function ($record) {
                                                if (!$record?->agency_company_id)
                                                {
                                                    return new HtmlString(
                                                        'Die Abrechnung erfolgt über eine Agentur. '
                                                        . 'Bitte eine Agentur in <strong>agency_company_id</strong> hinterlegen.'
                                                    );
                                                }

                                                // falls du eine Relation hast, lieber $record->agencyCompany verwenden
                                                $agency = Company::find($record->agency_company_id);

                                                if (!$agency)
                                                {
                                                    return 'Die Abrechnung erfolgt über eine Agentur (Agentur nicht gefunden).';
                                                }

                                                return new HtmlString(
                                                    '<span style="font-size:12pt"><p style="color:red;font-weight:bold;">Hinweis</p>Die Abrechnung erfolgt über die Agentur '
                                                    . '<strong>' . $agency->name . '</strong>.</span>'
                                                );
                                            })
                                            ->visible(fn($get) => $get('billing_via_agency'))
                                            ->columnSpanFull(),


                                    ]),
                                Forms\Components\Section::make('SEPA-Lastschrift')
                                    ->description('Mandate für diese Firma verwalten (für Rechnungshinweise).')
                                    ->schema([
                                        Forms\Components\Repeater::make('sepaMandates')
                                            ->label('SEPA-Mandate')
                                            ->relationship('sepaMandates') // bindet direkt an die HasMany-Relation
                                            ->addActionLabel('Mandat hinzufügen')
                                            ->itemLabel(fn(array $state) => ($state['mandate_reference'] ?? null)
                                                ? 'Mandat ' . $state['mandate_reference'] . ' | ' . $state['iban']
                                                : 'Neues Mandat'
                                            )
                                            ->schema([
                                                Forms\Components\Toggle::make('is_active')->label('Aktiv')->inline(false)->default(true),
                                                Forms\Components\DatePicker::make('signature_date')->label('Datum der Unterschrift'),
                                                Forms\Components\TextInput::make('account_holder')
                                                    ->label('Kontoinhaber')
                                                    ->required()
                                                    ->maxLength(150),
                                                Forms\Components\TextInput::make('bank_name')
                                                    ->label('Bank')
                                                    ->maxLength(100),
                                                Forms\Components\TextInput::make('iban')
                                                    ->label('IBAN')
                                                    ->required()
                                                    ->maxLength(34)
                                                    ->rule('min:15') // einfache Basiskontrolle
                                                    ->helperText('Ohne Leerzeichen eingeben.'),

                                                Forms\Components\TextInput::make('bic')
                                                    ->label('BIC')
                                                    ->maxLength(11)
                                                    ->helperText('Optional.'),

                                                Forms\Components\Toggle::make('is_default')
                                                    ->label('Als Standard verwenden')
                                                    ->inline(false),
                                            ])
                                            ->columns(2)           // IBAN/BIC nebeneinander
                                            ->grid(1)              // zwei Spalten im Repeater
                                            ->minItems(0)
                                            ->collapsible()
                                            ->collapsed()
                                            ->reorderable(true),
                                    ])
                                    ->collapsed()
                                    ->visible(fn() => auth()->user()?->is_admin),
                            ]),


                        Forms\Components\Tabs\Tab::make('Einstellungen')
                            ->schema([

                                // === NEU: Affiliate Settings ===
                                Forms\Components\Fieldset::make('Affiliate Settings')
                                    ->visible(fn() => auth()->user()?->is_admin ?? false) // nur für Admins
                                    ->schema([
                                        Forms\Components\Toggle::make('is_agency')
                                            ->label('Ist Agentur / Affiliate')
                                            ->reactive()
                                            ->default(false),

                                        Forms\Components\TextInput::make('agency_discount_percent')
                                            ->label('Rabatt %')
                                            ->numeric()
                                            ->inputMode('decimal')
                                            ->minValue(0)
                                            ->maxValue(100)
                                            ->step('0.01')
                                            ->suffix('%')
                                            ->default(20)
                                            ->visible(fn(callable $get) => (bool)$get('is_agency'))
                                            ->required(fn(callable $get) => (bool)$get('is_agency')),

                                        Section::make('Mandanten dieser Agentur')
                                            ->visible(fn($record) => (bool)($record?->is_agency))   // nur zeigen, wenn Agentur
                                            ->schema([
                                                ViewField::make('agency-tenants')
                                                    ->view('filament.components.agency-tenants')      // Blade unten
                                                    ->columnSpanFull(),
                                            ]),


                                    ])
                                    ->columns(2),

                                Forms\Components\Fieldset::make('Site Observer')
                                    ->relationship('settings', CompanySetting::class)
                                    ->schema([
                                        Forms\Components\Grid::make(2)
                                            ->schema([
                                                Select::make('full_scan_interval')
                                                    ->label('Full Scan Interval')
                                                    ->options([
                                                        'daily' => 'Täglich',
                                                        'weekly' => 'Wöchentlich',
                                                    ])
                                                    ->default('weekly')
                                                    ->reactive()
                                                    ->columnSpan(1)
                                                    ->afterStateUpdated(function ($state, callable $set, callable $get, $livewire) {
                                                        if ($state === 'daily')
                                                        {
                                                            $company = $livewire->record;
                                                            $hasFeature = $company->features()->where('slug', 'scan-daily')->exists();
                                                            if (!$hasFeature)
                                                            {
                                                                Notification::make()
                                                                    ->title('Upgrade erforderlich')
                                                                    ->body('„Täglicher Scan“ ist nicht im gebuchten Paket enthalten. Bitte buchen Sie ein Upgrade.')
                                                                    ->danger()
                                                                    ->persistent()
                                                                    ->send();
                                                                $set('full_scan_interval', 'weekly');
                                                            }
                                                        }
                                                    }),
                                            ]),

                                        Select::make('default_standard')
                                            ->label('WCAG Standard')
                                            ->options([
                                                '2.0' => 'WCAG 2.0',
                                                '2.1' => 'WCAG 2.1',
                                            ])
                                            ->default('2.1')
                                            ->reactive(),

                                        Forms\Components\Toggle::make('contrast_errors')
                                            ->label('Kontrastfehler scannen')
                                            ->default(false)
                                            ->reactive()
                                            ->hidden(fn(callable $get) => $get('default_standard') === '2.0'),

                                        Forms\Components\Section::make('')
                                            ->description('')
                                            ->schema([

                                                Forms\Components\Toggle::make('start_crawl')
                                                    ->label('Domain crawlen')
                                                    ->inline(false)
                                                    ->live()
                                                    ->afterStateUpdated(function ($state, $set, $get, $livewire) {
                                                        if ($state)
                                                        {
                                                            // reset toggle so it can be triggered again
                                                            $set('start_crawl', false);
                                                            $set('auto_add_urls', false);
                                                            $set('exclude_query_string_urls', false);
                                                            // open the already-registered action’s modal
                                                            $livewire->mountAction('crawlSites');
                                                        }
                                                    }),

                                                Forms\Components\Toggle::make('auto_add_urls')
                                                    ->label('URLs automatisch hinzufügen')
                                                    ->default(true)
                                                    ->helperText('URLs bei Aufruf automatisch zum SiteScan hinzufügen.'),

                                                Forms\Components\Toggle::make('exclude_query_string_urls')
                                                    ->label('URLs mit Query-Strings ignorieren (?param=...)')
                                                    ->default(true)
                                                    ->helperText('Wenn aktiviert, werden Referrer mit Query-Strings nicht gespeichert.'),
                                            ]),
                                        Forms\Components\Section::make('Domain-Filter')
                                            ->description('Steuert, welche Referrer/Seiten automatisch gespeichert werden.')
                                            ->schema([
                                                Forms\Components\Textarea::make('valid_domains')
                                                    ->label('Erlaubte Domains (Whitelist)')
                                                    ->rows(4)
                                                    ->placeholder("example.com, projekt.de\nwww.kunde.at, https://sub.example.org")
                                                    ->helperText('Mehrere Domains durch Komma oder Zeilenumbruch. Protokolle/Subdomains werden ignoriert; intern wird auf die registrierbare Domain (z. B. example.com) normalisiert.')
                                                    ->columnSpanFull(),


                                            ]),

                                    ]),

                                Forms\Components\Fieldset::make('Altstar Typ ')
                                    ->relationship('settings', CompanySetting::class)
                                        ->schema([
                                            /*Forms\Components\Select::make('altstar_type')
                                            ->label('Altstar')
                                            ->options([
                                                0 => 'Nur leere img-Tags bearbeiten',
                                                1 => 'Alle img-Tags bearbeiten',
                                            ])
                                            ->default(0)*/
                                            Forms\Components\Toggle::make('altstar_type')
                                                    ->label('Altstar override')
                                                    ->default(false)
                                                    ->helperText('Bestehende Bildbeschreibungen werden überschrieben.')
                                            ->visible(function ($livewire) {

                                                $company = $livewire->record;
                                                //\Log::info($company);
                                                return $company->features()->where('slug', 'image-alt-tags-all')->orWhere('slug', 'image-alt-tags')->exists();
                                            })

                                    ]),


                                Forms\Components\Fieldset::make('Barrierefreiheitserklärung ')
                                    ->relationship('settings', CompanySetting::class)
                                    ->schema([
                                        // Barrierefreiheitserklärung als Section mit type und Settings-Fieldset

                                        Forms\Components\TextInput::make('a11y_feedback_receivers')
                                            ->label('Feedbak-Formular Benachrichtigungs-Empfänger')
                                            ->helperText('Kommagetrennte E-Mail-Adressen. Standard: die E-Mail-Adresse der Firma.')
                                            ->placeholder('z. B. barrierefreiheit@example.org, info@example.org')
                                            ->afterStateHydrated(function ($state, callable $set, $record) {
                                                // Wenn noch nichts gesetzt wurde, mit company.email vorbelegen
                                                if (blank($state) && $record && !blank($record->email))
                                                {
                                                    $set('a11y_feedback_receivers', $record->email);
                                                }
                                            })
                                            ->maxLength(500),

                                    ]),


                            ]),

                        Forms\Components\Tabs\Tab::make('Upgrade Möglichkeiten (intern)')
                            ->schema([
                                InfoBox::make()
                                    ->label('Für diese Firma sichtbare Upgrade-Produkte')
                                    ->content(function ($record) {
                                        if (!auth()->user()?->is_admin)
                                        {
                                            return null;
                                        }

                                        $products = Product::where('upgrade', 1)
                                            ->get()
                                            ->filter(fn($product) => $product->isVisibleForCompany($record));

                                        if ($products->isEmpty())
                                        {
                                            return new HtmlString('<em>Keine Upgrade-Produkte für diese Firma sichtbar.</em>');
                                        }

                                        $rows = $products->map(function ($product) {
                                            $editUrl = ProductResource::getUrl('edit', ['record' => $product]);

                                            return "<tr>
                                                <td class='border px-2 py-1 text-sm'>{$product->name}</td>
                                                <td class='border px-2 py-1 text-sm'>{$product->feature_tags}</td>
                                                <td class='border px-2 py-1 text-sm'>{$product->formatted_prices}</td>
                                                <td class='border px-2 py-1 text-sm'><a href='{$editUrl}' target='_blank' class='underline text-primary-600'>Produkt bearbeiten</a></td>
                                            </tr>";
                                        })->implode('');

                                        return new HtmlString("
                                            <table class='border w-full mt-2'>
                                                <thead>
                                                    <tr class='bg-gray-100'>
                                                        <th class='border px-2 py-1 text-left'>Produkt</th>
                                                        <th class='border px-2 py-1 text-left'>Features</th>

                                                        <th class='border px-2 py-1 text-left'>Preis</th>
                                                        <th class='border px-2 py-1 text-left'>Aktion</th>
                                                    </tr>
                                                </thead>
                                                <tbody>{$rows}</tbody>
                                            </table>
                                        ");
                                    }),

                            ])
                            ->visible(fn() => auth()->user()?->is_admin),

                    ])
                    ->persistTabInQueryString(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kd_nr')->label('Kd-Nr')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('name')->label('Name')->searchable()->sortable(),
                Tables\Columns\IconColumn::make('is_agency')
                    ->label('')
                    ->icon(function ($record) {
                        if ($record->is_agency)
                        {
                            return 'icon-tenancy'; // agentur
                        }

                        if (!empty($record->agency_company_id))
                        {
                            return 'icon-tenant'; // tenant
                        }

                        return null; // nichts anzeigen
                    })
                    ->color(function ($record) {
                        if ($record->is_agency)
                        {
                            return 'primary';
                        }

                        if (!empty($record->agency_company_id))
                        {
                            return 'success';
                        }

                        return 'default';
                    })
                    ->falseIcon('heroicon-o-building-office-2')
                    ->size('sm')
                    ->grow(false),          // schmal halten
                Tables\Columns\TextColumn::make('plz')->label('plz')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('ort')->label('Ort')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d.m.Y H:i')->label('Erstellt')->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getNavigationLabel(): string
    {
        return auth()->user()->is_admin ? 'Firmen/Kunden' : 'Meine Daten';
    }

    public static function getPages(): array
    {
        return [
            'index' => Shared\CompanyResource\Pages\ListCompanies::route('/'),
            'create' => Shared\CompanyResource\Pages\CreateCompany::route('/create'),
            'edit' => Shared\CompanyResource\Pages\EditCompany::route('/{record}/edit'),
        ];
    }

    protected static function startCrawling(array $data, ?int $companyId): void
    {
        if (!$companyId)
        {
            Notification::make()
                ->title('Crawl Fehler')
                ->body('Fehler: Kein Unternehmen ausgewählt.')
                ->danger()
                ->send();

            return;
        }

        // Generate unique crawl ID
        $crawlId = 'crawl_' . $companyId . '_' . now()->timestamp;

        // Direct controller call
        $controller = new CrawlController();
        $request = new Request([
            'id' => $companyId,
            'domain' => $data['domain'],
            //'id' => $crawlId,
            // 'maxPages' => $data['maxPages'] ?? 10, // Uncomment if maxPages enabled
        ]);

        try
        {
            $response = $controller->startCrawl($request);

            if ($response['status'] === 'ok')
            {
                Notification::make()
                    ->title('Crawler gestartet')
                    ->body('Crawling initiiert für ' . $data['domain'] . '. Der Vorgang kann einige Minuten dauern. Bitte laden Sie dann diese Seite erneut.')
                    ->success()
                    ->send();
            }
            else
            {
                \Log::error('Fehler beim Crawlen: ' . $response['data'] . ' Company: ' . $companyId . ' Domain: ' . $data['domain']);
                Notification::make()
                    ->title('Crawl Fehler')
                    ->body('Fehler: ' . $response['data'])
                    ->danger()
                    ->send();
            }
        }
        catch (\Exception $e)
        {
            \Log::error('Exception beim Crawlen: ' . $e->getMessage() . ' Company: ' . $companyId . ' Domain: ' . $data['domain']);
            Notification::make()
                ->title('Crawl Fehler')
                ->body('Fehler: ' . $e->getMessage())
                ->danger()
                ->send();
        }
    }


}
