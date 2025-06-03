<?php
namespace App\Filament\Resources\Shared;

use App\Filament\Resources\CompanyResource\Pages;
use App\Filament\Resources\CompanyResource\RelationManagers;
use App\Filament\Resources\Shared;
use App\Models\Company;
use App\Models\CompanySetting;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Image;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;

class CompanyResource extends Resource
{
    protected static ?string $model = Company::class;
  //  protected static bool $shouldRegisterNavigation = true;
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
                                Forms\Components\Fieldset::make('Site Observer')
                                    ->relationship('settings', CompanySetting::class)
                                    ->schema([

                                        // Full Scan Interval (Weekly or Monthly)
                                        Forms\Components\Grid::make(2) // Definiert eine Zweispalten-Struktur
                                        ->schema([
                                            Select::make('full_scan_interval')
                                                ->label('Full Scan Interval')
                                                ->options([
                                                    'daily' => 'Täglich',
                                                    'weekly' => 'Wöchentlich',
                                                    'monthly' => 'Monatlich',
                                                ])
                                                ->default('weekly')
                                                ->reactive()
                                                ->columnSpan(1), // Nimmt nur eine Spalte ein, aber bleibt in eigener Zeile
                                        ]),



                                        // WCAG Standard Dropdown
                                        Select::make('default_standard')
                                            ->label('WCAG Standard')
                                            ->options([
                                                '2.0' => 'WCAG 2.0',
                                                '2.1' => 'WCAG 2.1',
                                            ])
                                            ->default('2.1') // Falls leer → Standardwert setzen
                                            ->reactive(),


                                        // Checkbox für Kontrastfehler-Scan
                                        Forms\Components\Toggle::make('contrast_errors')
                                            ->label('Kontrastfehler scannen')
                                            ->default(false) // Falls leer → Standardwert setzen
                                            ->reactive()
                                            ->hidden(fn (callable $get) => $get('default_standard') === '2.0'),

                                        // Checkbox für Auto-URLs hinzufügen
                                        Forms\Components\Toggle::make('auto_add_urls')
                                            ->label('Automatisch URLs hinzufügen')
                                            ->default(true), // Falls leer → Standardwert setzen
                                    ]),
                            ]),

                        ])->persistTabInQueryString() ,

            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('plz')
                    ->label('plz')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ort')
                    ->label('Ort')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')->dateTime('d.m.Y H:i')->label('Erstellt')->sortable(),

            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
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
        return [
            //
        ];
    }

    public static function getNavigationLabel(): string
    {
        if(auth()->user()->is_admin == 1){
            return 'Firmen/Kunden';
    }
        else{

            return 'Meine Daten';
        }
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
