<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\A11yDeclarationResource\Pages;
use App\Models\A11yDeclaration;
use App\Models\Company;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class A11yDeclarationResource extends Resource
{
    protected static ?string $model = A11yDeclaration::class;

    protected static ?string $label = 'Barrierefreiheitserklärung';
    protected static ?string $pluralLabel = 'Barrierefreiheitserklärungen';
    protected static ?string $navigationGroup = 'Erklärung zur Barrierefreiheit';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();

        if (! $user) {
            return false;
        }

        // Admin sieht die Resource immer
        if ($user->is_admin) {
            return true;
        }

        // Für normale Kunden im Dashboard-Panel:
        $tenant = Filament::getTenant();
        if (! $tenant) {
            return false;
        }

        $company = Company::find($tenant->id);
        if (! $company) {
            return false;
        }

        // Sichtbar, wenn das Feature „Barrierefreiheitserklärung“ gebucht ist
        return $company->hasFeature('barrierefreiheitserklaerung');
    }

    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

        $user = auth()->user();

        // Admin sieht alle Datensätze
        if ($user?->is_admin) {
            return $query;
        }

        // Kunde: nur eigene Firma (Tenant)
        $tenant = Filament::getTenant();

        if ($tenant) {
            return $query->where('company_id', $tenant->id);
        }

        // Fallback: nichts anzeigen, wenn wir keinen Tenant haben
        return $query->whereRaw('1 = 0');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Links + Publish-Toggle
                Forms\Components\View::make('filament.forms.components.accessibility-declaration-links')
                    ->label('Links zur Barrierefreiheitserklärung'),

                Forms\Components\Toggle::make('published')
                    ->label('Veröffentlichen')
                    ->inline(false)
                    ->default(true)
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set, callable $get, $livewire) {
                        // Nur auf der Bearbeiten-Seite automatisch speichern,
                        // nicht beim Anlegen
                        if ($livewire instanceof EditRecord) {
                            $livewire->save();
                        }
                    }),

                // Kopfbereich: Bundesland / Recht / Durchsetzungsstelle(n)
                Grid::make(3)
                    ->schema([
                        Forms\Components\Select::make('federal_state')
                            ->label('Bundesland')
                            ->options(\App\Enums\FederalState::options())
                            ->nullable(),

                        Forms\Components\Select::make('federal_or_state_law')
                            ->label('Bundes- oder Landesrecht')
                            ->options([
                                0 => 'Bundesrecht',
                                1 => 'Landesrecht',
                            ])
                            ->nullable(),

                        Forms\Components\TextInput::make('acc_enforcement_agencies')
                            ->label('Durchsetzungsstelle(n)')
                            ->maxLength(255)
                            ->nullable(),
                    ]),

                Grid::make(12)
                    ->schema([
                        Forms\Components\TextInput::make('scope')
                            ->url()
                            ->label('Geltungsbereich (Domain)')
                            ->columnSpan(8)
                            ->nullable(),
                    ]),

                // Standard-Texte (für alle)
                Forms\Components\Section::make('Texte (Standard)')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('declaration_intro_text')
                                    ->label('Eingangsbeschreibung')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ]),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('company_offer')
                                    ->label('Beschreibung der Dienstleistung')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable(),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('consistency')
                                    ->default('Unsere Produkte und Dienstleistungen sind für Menschen mit Behinderungen in der allgemein üblichen Weise, ohne besondere Erschwernis und grundsätzlich ohne fremde Hilfe auffindbar, zugänglich und nutzbar.')
                                    ->label('Vereinbarkeit')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ]),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('bfsg_full')
                                    ->default('Unsere Webseite ist mit dem BFSG und der BFSGV vereinbar; alle Anforderungen werden erfüllt.')
                                    ->label('Text für volle Konformität')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ]),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('bfsg_partial')
                                    ->default('Unsere Webseite ist in großen Teilen mit dem BFSG und der BFSGV vereinbar. Jedoch bestehen noch einige Barrieren auf unseren Seiten, an denen wir aktiv arbeiten und diese in Zukunft beseitigen wollen. Folgende Ausnahmen und Unvereinbarkeiten bestehen:')
                                    ->label('Text für teilweise Konformität')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ]),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('non_conform_content')
                                    ->default('Die folgenden Inhalte sind nicht barrierefrei, da Sie eine unverhältnismäßige Belastung gemäß § 12a Absatz 6 BGG darstellen:')
                                    ->label('Nicht konforme Inhalte')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ]),
                            ]),
                    ]),

                // Leichte Sprache
                Forms\Components\Section::make('Texte in Leichter Sprache')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('declaration_intro_text_ez')
                                    ->label('Eingangsbeschreibung (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->visible(fn (Get $get): bool => filled($get('declaration_intro_text_ez'))),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('company_offer_ez')
                                    ->label('Beschreibung der Dienstleistung (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->visible(fn (Get $get): bool => filled($get('company_offer_ez'))),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('consistency_ez')
                                    ->label('Vereinbarkeit (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->visible(fn (Get $get): bool => filled($get('consistency_ez'))),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('bfsg_full_ez')
                                    ->label('Text für volle Konformität (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->visible(fn (Get $get): bool => filled($get('bfsg_full_ez'))),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('bfsg_partial_ez')
                                    ->label('Text für teilweise Konformität (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->visible(fn (Get $get): bool => filled($get('bfsg_partial_ez'))),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('non_conform_content_ez')
                                    ->label('Nicht konforme Inhalte (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->visible(fn (Get $get): bool => filled($get('non_conform_content_ez'))),
                            ]),
                    ]),

                // Feedback-Bereich
                Forms\Components\Section::make('Feedback-Kanal')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                Forms\Components\TextInput::make('feedback_url')
                                    ->url()
                                    ->label('Feedback URL')
                                    ->columnSpan(4)
                                    ->nullable(),
                                Forms\Components\TextInput::make('feedback_email')
                                    ->label('Feedback E-Mail')
                                    ->columnSpan(4)
                                    ->nullable(),
                                Forms\Components\TextInput::make('feedback_phone')
                                    ->label('Feedback Tel.')
                                    ->columnSpan(4)
                                    ->nullable(),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('feedback_address')
                                    ->label('Feedback Postanschrift')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable(),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('feedback_text')
                                    ->label('Feedback Zusatztext')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable(),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('feedback_text_ez')
                                    ->label('Feedback Zusatztext (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable()
                                    ->visible(fn (Get $get): bool => filled($get('feedback_text_ez'))),
                            ]),
                    ]),

                // Marktüberwachungsbehörde / Durchsetzungsstelle
                Forms\Components\Section::make('Marktüberwachungsbehörde / Durchsetzungsstelle')
                    ->schema([
                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('market_supervision_board')
                                    ->label('Marktüberwachungsbehörde Adresse (alt / Legacy)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable(),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('enforcement_text')
                                    ->label('Zusatztext Durchsetzungsstelle')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable(),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('enforcement_text_ez')
                                    ->label('Zusatztext Durchsetzungsstelle (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable()
                                    ->visible(fn (Get $get): bool => filled($get('enforcement_text_ez'))),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('market_surveillance_board_address')
                                    ->label('Marktüberwachungsbehörde Adresse (neu)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable(),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('market_surveillance_board_address_text')
                                    ->label('Marktüberwachungsbehörde Zusatztext')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable(),
                            ]),

                        Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('market_surveillance_board_address_text_ez')
                                    ->label('Marktüberwachungsbehörde Zusatztext (Leichte Sprache)')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->nullable()
                                    ->visible(fn (Get $get): bool => filled($get('market_surveillance_board_address_text_ez'))),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Firma')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('declaration_type')
                    ->label('Typ')
                    ->formatStateUsing(fn ($state) => match ((int) $state) {
                        0 => 'Allgemein / Firma',
                        1 => 'Behörde / Gemeinde',
                        2 => 'Verein',
                        default => 'Unbekannt',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('published')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'veröffentlicht' : 'Entwurf')
                    ->color(fn ($state) => $state ? 'success' : 'warning'),
                Tables\Columns\TextColumn::make('created_at')
                    ->formatStateUsing(fn ($state) => $state ? Carbon::parse($state)->format('d.m.Y') : '')
                    ->label('Erstellt am')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->emptyStateHeading('Keine Einträge')
            ->emptyStateDescription('Legen Sie die erste Barrierefreiheitserklärung an.')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListA11yDeclarations::route('/'),
            'create' => Pages\CreateA11yDeclaration::route('/create'),
            'edit' => Pages\EditA11yDeclaration::route('/{record}/edit'),
        ];
    }
}
