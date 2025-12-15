<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\A11yDeclarationResource\Pages;
use App\Models\A11yDeclaration;
use App\Models\Company;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;

class A11yDeclarationResource extends Resource
{
    protected static ?string $model = A11yDeclaration::class;

    protected static ?string $label = 'Barrierefreiheitserklärung';
    protected static ?string $navigationGroup = 'Erklärung zur Barrierefreiheit';
    protected static ?string $pluralLabel = 'Barrierefreiheitserklärungen';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        $user = auth()->user();

        if (!$user)
        {
            return false;
        }

        // Admin sieht die Resource immer
        if ($user->is_admin)
        {
            return true;
        }

        // Für normale Kunden im Dashboard-Panel:
        $tenant = Filament::getTenant();
        if (!$tenant)
        {
            return false;
        }

        $company = Company::find($tenant->id);
        if (!$company)
        {
            return false;
        }

        // Sichtbar, wenn das Feature „Barrierefreiheitserklärung“ gebucht ist
        return $company->hasFeature('barrierefreiheitserklaerung');
    }



    public static function getNavigationUrl(): string
    {
        $user = auth()->user();

        if ($user?->is_admin) {
            return static::getUrl('index');
        }

        $tenant = Filament::getTenant();

        if (! $tenant) {
            return static::getUrl('index');
        }

        $record = A11yDeclaration::query()
            ->where('company_id', $tenant->id)
            ->first();

        return $record
            ? static::getUrl('edit', ['record' => $record])
            : static::getUrl('create');
    }
    public static function getEloquentQuery(): Builder
    {
        $query = parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);

        $user = auth()->user();

        // Admin sieht alle Datensätze
        if ($user?->is_admin)
        {
            return $query;
        }

        // Kunde: nur eigene Firma (Tenant)
        $tenant = Filament::getTenant();

        if ($tenant)
        {
            return $query->where('company_id', $tenant->id);
        }

        // Fallback: nichts anzeigen, wenn wir keinen Tenant haben
        return $query->whereRaw('1 = 0');
    }

    private static function companyTypeFromForm(Get $get): ?int
    {
        $companyId = $get('company_id') ?? Filament::getTenant()?->id;

        if (! $companyId) {
            return null;
        }

        $type = Company::whereKey($companyId)->value('type');

        return $type === null ? null : (int) $type;
    }

    private static function isCompany(Get $get): bool
    {
        return self::companyTypeFromForm($get) === 0;
    }

    private static function isBoardOrAssociation(Get $get): bool
    {
        return in_array(self::companyTypeFromForm($get), [1, 2], true);
    }

    private static function editorToolbarButtons(): array
    {
        return [
            'bold',
            'italic',
            'bulletList',
            'orderedList',
            'link',
            'undo',
            'redo',
        ];
    }

    private static function editorExtraAttributes(): array
    {
        // Kompakt starten, wächst beim Tippen weiter
        return [
            // wirkt auf den Wrapper
            'style' => 'min-height:140px;',
        ];
    }

    private static function editorInputExtraAttributes(): array
    {
        // wirkt auf das eigentliche ProseMirror-Editable
        return [
            'style' => 'min-height:140px; height:auto; max-height:none; overflow:visible;',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Firma automatisch setzen (für Kunden)
                Forms\Components\Hidden::make('company_id')
                    ->default(fn() => Filament::getTenant()?->id),

                // Links / Publish oben
                Forms\Components\View::make('filament.forms.components.accessibility-declaration-links')
                    ->label('Links zur Barrierefreiheitserklärung'),

                Forms\Components\Toggle::make('published')
                    ->label('Veröffentlichen')
                    ->inline(false)
                    ->default(true)
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set, callable $get, $livewire) {
                        if ($livewire instanceof EditRecord)
                        {
                            $livewire->save();
                        }
                    }),
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Select::make('federal_state')
                            ->label('Bundesland')
                            ->options(\App\Enums\FederalState::options())
                            ->reactive()
                            ->afterStateUpdated(function ($state, Set $set) {
                                $agency = \App\Models\AccEnforcementAgency::where('id', $state)->first();
                                $set('enforcement_agency', $agency ? $agency->id : null);
                            })
                            ->required(),

                        Forms\Components\Select::make('federal_or_state_law')
                            ->label('Bundes- oder Landesrecht')
                            ->options([
                                0 => 'Bundesrecht',
                                1 => 'Landesrecht',
                            ])
                            ->required(),
                        Forms\Components\Select::make('enforcement_agency')
                            ->label('Durchsetzungsstelle')
                            ->options(\App\Models\AccEnforcementAgency::pluck('state', 'id')->toArray())
                            ->nullable(),
                    ])
                    ->visible(function (Get $get): bool {
                        // company_id kommt aus dem Hidden-Feld; Fallback auf Tenant
                        $companyId = $get('company_id') ?? Filament::getTenant()?->id;

                        if (!$companyId) {
                            // Fallback: im Zweifel anzeigen, damit Admins nicht "blind" sind
                            return true;
                        }

                        $company = Company::find($companyId);

                        if (!$company) {
                            return true;
                        }

                        // 1 = Gemeinde / Behörde, 2 = Verein
                        return in_array($company->type, [1, 2], true);
                    }),


                // Geltungsbereich (Domain)
                Forms\Components\Grid::make(12)
                    ->schema([
                        Forms\Components\TextInput::make('scope')
                            ->url()
                            ->label('Geltungsbereich (Domain)')
                            ->columnSpan(8)
                            ->nullable(),
                    ])
                    ->visible(fn (Get $get): bool => self::isBoardOrAssociation($get)),

                // Standard-Texte (Firmen + allgemeine Texte)
                Forms\Components\Section::make('Texte (Standard)')
                    ->schema([
                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Eingangsbeschreibung')
                                    ->description('Dieser Text steht am Anfang der Erklärung und wird angezeigt, bevor alle weiteren Abschnitte kommen.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('declaration_intro_text')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes()),
                                    ])
                                    ->columnSpan(8),
                            ])
                            ->visible(fn (Get $get): bool => self::isCompany($get)),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Beschreibung der Dienstleistung')
                                    ->description('Beschreiben Sie kurz, welche digitalen Dienstleistungen, Angebote oder Inhalte diese Erklärung abdeckt (z. B. Website, Online-Shop, Kundenportal).')
                                    ->schema([
                                        Forms\Components\RichEditor::make('company_offer')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes())
                                            ->nullable(),
                                    ])
                                    ->columnSpan(8),
                            ])
                            ->visible(fn (Get $get): bool => self::isCompany($get)),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Vereinbarkeit')
                                    ->description('Dieser Abschnitt beschreibt grundsätzlich, wie gut Ihre Website nutzbar ist. Je nach Ergebnis wird anschließend entweder „voll“, „teilweise“ oder „nicht vereinbar“ angezeigt.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('consistency')
                                            ->default('Unsere Produkte und Dienstleistungen sind für Menschen mit Behinderungen in der allgemein üblichen Weise, ohne besondere Erschwernis und grundsätzlich ohne fremde Hilfe auffindbar, zugänglich und nutzbar.')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes()),
                                    ])
                                    ->columnSpan(8),
                            ]),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Text für volle Konformität')
                                    ->description('Dieser Text wird angezeigt, wenn Ihre Website als vollständig vereinbar gilt (keine relevanten offenen Barrieren).')
                                    ->schema([
                                        Forms\Components\RichEditor::make('bfsg_full')
                                            ->default('Unsere Webseite ist mit dem BFSG und der BFSGV vereinbar; alle Anforderungen werden erfüllt.')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes()),
                                    ])
                                    ->columnSpan(8),
                            ]),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Text für teilweise Konformität')
                                    ->description('Dieser Text wird angezeigt, wenn noch Barrieren bestehen. Darunter werden die gefundenen Punkte/Probleme aufgelistet.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('bfsg_partial')
                                            ->default('Unsere Webseite ist in großen Teilen mit dem BFSG und der BFSGV vereinbar. Jedoch bestehen noch einige Barrieren auf unseren Seiten, an denen wir aktiv arbeiten und diese in Zukunft beseitigen wollen. Folgende Ausnahmen und Unvereinbarkeiten bestehen:')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes()),
                                    ])
                                    ->columnSpan(8),
                            ]),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Nicht konforme Inhalte')
                                    ->description('Dieser Text wird angezeigt, wenn Sie Inhalte als „nicht barrierefrei“ kennzeichnen, z. B. wegen unverhältnismäßiger Belastung. Darunter sollten die betroffenen Inhalte konkret benannt werden.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('non_conform_content')
                                            ->default('Die folgenden Inhalte sind nicht barrierefrei, da sie eine unverhältnismäßige Belastung gemäß § 12a Absatz 6 BGG darstellen:')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes()),
                                    ])
                                    ->columnSpan(8),
                            ]),
                    ]),

                // Feedback-Bereich
               /*
                Forms\Components\Section::make('Feedback-Kanal')
                    ->schema([
                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\TextInput::make('feedback_url')
                                    ->url()
                                    ->label('Feedback URL')
                                    ->columnSpan(3)
                                    ->nullable(),
                                Forms\Components\TextInput::make('feedback_email')
                                    ->label('Feedback E-Mail')
                                    ->columnSpan(3)
                                    ->nullable(),
                                Forms\Components\TextInput::make('feedback_phone')
                                    ->label('Feedback Tel.')
                                    ->columnSpan(2)
                                    ->nullable(),
                            ]),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Feedback Postanschrift')
                                    ->description('Optional: Nur ausfüllen, wenn Rückmeldungen auch per Post möglich sind.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('feedback_address')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes())
                                            ->nullable(),
                                    ])
                                    ->columnSpan(8),
                            ]),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Feedback Zusatztext')
                                    ->description('Optional: Wird oberhalb der Kontaktangaben angezeigt und erklärt, wie Feedback abgegeben werden kann.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('feedback_text')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes())
                                            ->nullable(),
                                    ])
                                    ->columnSpan(8),
                            ]),
                    ]),
*/
                // Marktüberwachungsbehörde / Durchsetzungsstelle
                Forms\Components\Section::make('Marktüberwachungsbehörde / Durchsetzungsstelle')
                    ->schema([
                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Marktüberwachungsbehörde Adresse')
                                    ->description('Wird angezeigt, wenn eine Marktüberwachungsbehörde genannt werden muss. Bitte die vollständige Kontaktadresse eintragen.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('market_surveillance_board_address')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes())
                                            ->nullable(),
                                    ])
                                    ->columnSpan(8),
                            ])
                            ->visible(fn (Get $get): bool => self::isCompany($get)),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Marktüberwachungsbehörde Zusatztext')
                                    ->description('Optional: Kurzer Hinweis, wofür die Behörde zuständig ist oder wann man sich dorthin wenden kann.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('market_surveillance_board_address_text')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes())
                                            ->nullable(),
                                    ])
                                    ->columnSpan(8),
                            ])
                            ->visible(fn (Get $get): bool => self::isCompany($get)),

                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\Section::make('Zusatztext Durchsetzungsstelle')
                                    ->description('Optional: Kurzer Hinweis zur Durchsetzungsstelle, z. B. Ablauf oder Voraussetzungen.')
                                    ->schema([
                                        Forms\Components\RichEditor::make('enforcement_text')
                                            ->label('')
                                            ->columnSpan(8)
                                            ->toolbarButtons(self::editorToolbarButtons())
                                            ->extraAttributes(self::editorExtraAttributes())
                                            ->extraInputAttributes(self::editorInputExtraAttributes())
                                            ->nullable(),
                                    ])
                                    ->columnSpan(8),
                            ])
                            ->visible(fn (Get $get): bool => self::isBoardOrAssociation($get)),
                    ]),

                // Texte in Leichter Sprache
                Forms\Components\Grid::make(12)
                    ->schema([
                        Forms\Components\Section::make('Texte in Leichter Sprache')
                            ->description('Klicken Sie auf den Abschnittstitel, um die Inhalte in Leichter Sprache zu öffnen und zu bearbeiten.')
                            ->extraAttributes(['class' => 'a11y-easy-language-section'])
                            ->columnSpan(8)
                            ->visible(function (?A11yDeclaration $record, Get $get): bool {
                                // Vor dem ersten Speichern gibt es keinen Record => ausblenden
                                if (! $record?->exists) {
                                    return false;
                                }

                                // Erst einblenden, wenn mindestens ein EZ-Text gefüllt ist
                                return self::hasEasyReadTexts($get);
                            })
                            ->schema([
                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Eingangsbeschreibung (Leichte Sprache)')
                                            ->description('Leichte Sprache ist optional. Dieser Text wird am Anfang angezeigt, wenn Sie eine Version in Leichter Sprache anbieten.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('declaration_intro_text_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes()),
                                            ]),
                                    ])
                                    ->visible(fn (Get $get): bool => self::isCompany($get)),

                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Beschreibung der Dienstleistung (Leichte Sprache)')
                                            ->description('Kurz erklären, welche Bereiche/Angebote gemeint sind – in Leichter Sprache.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('company_offer_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes()),
                                            ]),
                                    ])
                                    ->visible(fn (Get $get): bool => self::isCompany($get)),

                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Vereinbarkeit (Leichte Sprache)')
                                            ->description('Dieser Abschnitt erklärt in Leichter Sprache, wie barrierefrei die Website nutzbar ist.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('consistency_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes()),
                                            ]),
                                    ]),

                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Text für volle Konformität (Leichte Sprache)')
                                            ->description('Wird angezeigt, wenn alles erfüllt ist – in Leichter Sprache.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('bfsg_full_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes()),
                                            ]),
                                    ]),

                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Text für teilweise Konformität (Leichte Sprache)')
                                            ->description('Wird angezeigt, wenn noch Barrieren bestehen – in Leichter Sprache.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('bfsg_partial_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes()),
                                            ]),
                                    ]),

                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Nicht konforme Inhalte (Leichte Sprache)')
                                            ->description('Wird angezeigt, wenn Inhalte nicht barrierefrei sind – in Leichter Sprache.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('non_conform_content_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes()),
                                            ]),
                                    ]),

                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Feedback Zusatztext (Leichte Sprache)')
                                            ->description('Optionaler Hinweistext zum Feedback-Kanal – in Leichter Sprache.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('feedback_text_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes())
                                                    ->nullable(),
                                            ]),
                                    ]),

                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Marktüberwachungsbehörde Zusatztext (Leichte Sprache)')
                                            ->description('Optionaler Zusatztext zur Marktüberwachungsbehörde – in Leichter Sprache.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('market_surveillance_board_address_text_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes())
                                                    ->nullable(),
                                            ]),
                                    ])
                                    ->visible(fn (Get $get): bool => self::isCompany($get)),

                                Forms\Components\Grid::make(12)
                                    ->schema([
                                        Forms\Components\Section::make('Zusatztext Durchsetzungsstelle (Leichte Sprache)')
                                            ->description('Optionaler Zusatztext zur Durchsetzungsstelle – in Leichter Sprache.')
                                            ->schema([
                                                Forms\Components\RichEditor::make('enforcement_text_ez')
                                                    ->label('')
                                                    ->toolbarButtons(self::editorToolbarButtons())
                                                    ->extraAttributes(self::editorExtraAttributes())
                                                    ->extraInputAttributes(self::editorInputExtraAttributes())
                                                    ->nullable(),
                                            ]),
                                    ])
                                    ->visible(fn (Get $get): bool => self::isBoardOrAssociation($get)),
                            ])
                            ->collapsed(),
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
                Tables\Columns\TextColumn::make('created_at')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d.m.Y'))
                    ->label('Erstellt am')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->emptyStateHeading('Keine Einträge')
            ->emptyStateDescription('Legen Sie den ersten Eintrag an.')
            ->emptyStateActions([
                Tables\Actions\CreateAction::make()
                    ->visible(fn() => !auth()->user()?->is_admin),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListA11yDeclarations::route('/'),
            'create' => Pages\CreateA11yDeclaration::route('/create'),
            'edit' => Pages\EditA11yDeclaration::route('/{record}/edit'),
        ];
    }

    private static function hasEasyReadTexts(Get $get): bool
    {
        return filled($get('declaration_intro_text_ez'))
            || filled($get('company_offer_ez'))
            || filled($get('consistency_ez'))
            || filled($get('bfsg_full_ez'))
            || filled($get('bfsg_partial_ez'))
            || filled($get('non_conform_content_ez'))
            || filled($get('feedback_text_ez'))
            || filled($get('market_surveillance_board_address_text_ez'))
            || filled($get('enforcement_text_ez'));
    }

}
