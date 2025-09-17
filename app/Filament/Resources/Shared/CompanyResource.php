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
                                Forms\Components\Section::make('Firmendetails')
                                    ->schema([
                                        FileUpload::make('logo_image')
                                            ->label('Firmenlogo')
                                            ->disk('public')
                                            ->directory('logo-images')
                                            ->acceptedFileTypes(['image/*'])
                                            ->image()
                                            ->storeFileNamesIn('logo_orig_filename'),

                                        Forms\Components\TextInput::make('name')
                                            ->label('Firmenname')
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
                                            ->placeholder('Straße eingeben'),

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
                                            ]),

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
                                            ]),

                                        Forms\Components\Grid::make(4)
                                            ->schema([
                                                Forms\Components\TextInput::make('email')
                                                    ->label('Email')
                                                    ->email()
                                                    ->maxLength(255)
                                                    ->placeholder('E-Mail-Adresse eingeben')
                                                    ->columnSpan(2),

                                                Forms\Components\TextInput::make('web')
                                                    ->label('Webseite')
                                                    ->url()
                                                    ->maxLength(255)
                                                    ->placeholder('Webseiten-URL eingeben')
                                                    ->columnSpan(2),
                                            ]),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Einstellungen')
                            ->schema([

                                // === NEU: Affiliate Settings ===
                                Forms\Components\Fieldset::make('Affiliate Settings')
                                    ->visible(fn () => auth()->user()?->is_admin ?? false) // nur für Admins
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
                                            ->visible(fn (callable $get) => (bool) $get('is_agency'))
                                            ->required(fn (callable $get) => (bool) $get('is_agency')),
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
                                                        if ($state === 'daily') {
                                                            $company = $livewire->record;
                                                            $hasFeature = $company->features()->where('slug', 'scan-daily')->exists();
                                                            if (! $hasFeature) {
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
                                            ->hidden(fn (callable $get) => $get('default_standard') === '2.0'),

                                        Forms\Components\Toggle::make('auto_add_urls')
                                            ->label('URLs automatisch hinzufügen')
                                            ->default(true),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Upgrade Möglichkeiten (intern)')
                            ->schema([
                                InfoBox::make()
                                    ->label('Für diese Firma sichtbare Upgrade-Produkte')
                                    ->content(function ($record) {
                                        if (!auth()->user()?->is_admin) {
                                            return null;
                                        }

                                        $products = Product::where('upgrade', 1)
                                            ->get()
                                            ->filter(fn ($product) => $product->isVisibleForCompany($record));

                                        if ($products->isEmpty()) {
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
                            ->visible(fn () => auth()->user()?->is_admin),

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
                        if ($record->is_agency) {
                            return 'icon-tenancy'; // agentur
                        }

                        if (! empty($record->agency_company_id)) {
                            return 'icon-tenant'; // tenant
                        }

                        return null; // nichts anzeigen
                    })
                    ->color(function ($record) {
                        if ($record->is_agency) {
                            return 'primary';
                        }

                        if (! empty($record->agency_company_id)) {
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
}
