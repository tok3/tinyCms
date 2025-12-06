<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\AccDeclarationResource\Pages;
use App\Filament\Resources\Shared\AccDeclarationResource\RelationManagers;
use App\Models\AccDeclaration;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Company;
use Filament\Facades\Filament;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\ViewAction;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\EditRecord;

class AccDeclarationResource extends Resource
{
    protected static ?string $model = AccDeclaration::class;
    protected static ?string $label = 'Barrierefreiheitserklärung';
    protected static ?string $navigationGroup = 'Erklärung zur Barrierefreiheit';
    protected static ?string $pluralLabel = 'Barrierefreiheitserklärung';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function shouldRegisterNavigation(): bool
    {
        if (auth()->user()->is_admin == 1)
        {

            return true;

        }
        $tenant = Filament::getTenant();
        $company = Company::where('id', $tenant->id)->first();
//\Log::info("type:". $company->type." hasFeature:".$company->hasFeature('barrierefreiheitserklaerung'));
        if ($company->hasFeature('barrierefreiheitserklaerung') && ($company->type === 1 || $company->type === 2))
        {
            return true;
        }

        return false;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\View::make('filament.forms.components.accessibility-declaration-links')
                    ->label('Links zur Barrierefreiheitserklärung'),
                Forms\Components\Toggle::make('published')
                    ->label('Veröffentlichen')
                    ->default(true)
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set, callable $get, $livewire) {
                        // Nur auf der Bearbeiten-Seite automatisch speichern,
                        // nicht beim Anlegen
                        if ($livewire instanceof EditRecord) {
                            $livewire->save();
                        }
                    }),
                Forms\Components\Grid::make(3)
                    ->schema([
                        Forms\Components\Select::make('federal_state')
                            ->label('Bundesland')
                            ->options(\App\Enums\FederalState::options())
                            ->reactive() // or ->live() depending on your needs
                            ->afterStateUpdated(function ($state, Set $set) {
                                // Assuming the options in enforcement_agency are related to federal_state
                                // You may need to adjust this logic to map federal_state to enforcement_agency
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
                        Forms\Components\select::make('enforcement_agency')
                            ->label('Durchsetzungsstelle')
                            ->options(\App\Models\AccEnforcementAgency::pluck('state', 'id')->toArray())
                            //->required()
                            ->nullable(),
                    ]),
                Forms\Components\Grid::make(12)
                    ->schema([
                        Forms\Components\TextInput::make('scope')
                            ->url()
                            ->label('Geltungsbereich (Domain)')
                            ->columnSpan(8)
                            ->nullable(),
                    ]),
                /*
                Forms\Components\Select::make('status')

                    ->options([
                        0 => 'vollständig vereinbar',
                        1 => 'teilweise vereinbar',
                        2 => 'nicht vereinbar',
                    ])
                    //->required()
                    ->default(0)
                    ->label('Vereinbarkeit'),

                Forms\Components\Select::make('category')
                    ->options([
                        0 => 'Vereinbarkeit',
                        1 => 'unverhältnismässige Belastung',
                        2 => 'Ausserhalb',
                    ])
                    //->required()
                    ->default(1)
                    ->label('Warum nicht vereinbar?'),
                */
                Forms\Components\Grid::make(12)
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

                // Leichte Sprache Texte zu Vereinbarkeit und Konformität
                Forms\Components\Section::make('Texte in Leichter Sprache')
                    ->schema([
                        Forms\Components\Grid::make(12)
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
                                    ->visible(fn(Get $get): bool => filled($get('consistency_ez'))),
                            ]),

                        Forms\Components\Grid::make(12)
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

                        Forms\Components\Grid::make(12)
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
                                    ->visible(fn(Get $get): bool => filled($get('bfsg_full_ez'))),
                            ]),

                        Forms\Components\Grid::make(12)
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

                        Forms\Components\Grid::make(12)
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
                                    ->visible(fn(Get $get): bool => filled($get('bfsg_partial_ez'))),
                            ]),

                        Forms\Components\Grid::make(12)
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

                        Forms\Components\Grid::make(12)
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
                                    ->visible(fn(Get $get): bool => filled($get('non_conform_content_ez'))),
                            ]),
                    ]),

                // Feedback-Bereich
                Forms\Components\Section::make('Feedback-Kanal')
                    ->schema([
                        Forms\Components\Grid::make(12)
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

                        Forms\Components\Grid::make(12)
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

                        Forms\Components\Grid::make(12)
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

                        Forms\Components\Grid::make(12)
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
                                    ->visible(fn(Get $get): bool => filled($get('feedback_text_ez'))),
                            ]),
                    ]),

                // Durchsetzungsstelle / Marktüberwachungsbehörde
                Forms\Components\Section::make('Durchsetzungsstelle / Marktüberwachungsbehörde')
                    ->schema([
                        Forms\Components\Grid::make(12)
                            ->schema([
                                Forms\Components\RichEditor::make('market_supervision_board')
                                    ->label('Marktüberwachungsbehörde Adresse')
                                    ->columnSpan(8)
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                    ])
                                    ->required()
                                    ->nullable(),
                            ]),

                        Forms\Components\Grid::make(12)
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

                        Forms\Components\Grid::make(12)
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
                                    ->visible(fn(Get $get): bool => filled($get('enforcement_text_ez'))),
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
                Tables\Columns\TextColumn::make('created_at')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)->format('d.m.Y'))
                    ->label('Erstellt am')
                    ->searchable()
                    ->sortable()
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                //Tables\Actions\CreateAction::make(),
            ])
            ->emptyStateHeading('Keine Einträge')
            ->emptyStateDescription('Legen Sie den ersten Eintrag an.')
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
            'index' => Pages\ListAccDeclarations::route('/'),
            'create' => Pages\CreateAccDeclaration::route('/create'),
            'view' => Pages\ViewAccDeclaration::route('/{record}'),
            'edit' => Pages\EditAccDeclaration::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
