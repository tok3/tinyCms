<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\AccCompDeclarationResource\Pages;
use App\Filament\Resources\Shared\AccCompDeclarationResource\RelationManagers;
use App\Models\AccCompDeclaration;
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

class AccCompDeclarationResource extends Resource
{
    protected static ?string $model = AccCompDeclaration::class;
    protected static ?string $label = 'Firmen-Barrierefreiheitserklärung';
    protected static ?string $navigationGroup = 'Erklärung zur Barrierefreiheit';
    protected static ?string $pluralLabel = 'Firmen-Barrierefreiheitserklärung';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function shouldRegisterNavigation(): bool
    {
    if (auth()->user()->is_admin == 1)
        {

            return true;

        }
        $tenant = Filament::getTenant();
        $company = Company::where('id', $tenant->id)->first();

        if($company->hasFeature('barrierefreiheitserklaerung') && $company->type === 0){
            \Log::info("type:". $company->type." hasFeature:".$company->hasFeature('barrierefreiheitserklaerung'));
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
                ->inline(false)
                ->default(true)
                ->live()
                ->afterStateUpdated(function ($state, callable $set, callable $get, $livewire) {
                    if ($livewire instanceof EditRecord) {
                        $livewire->save();
                    }
                }),

            // Standard-Texte
            Forms\Components\Section::make('Texte (Standard)')
                ->schema([
                    Forms\Components\Grid::make(12)
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

            // Texte in Leichter Sprache
            Forms\Components\Section::make('Texte in Leichter Sprache')
                ->schema([
                    Forms\Components\Grid::make(12)
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
                                ->visible(fn (Get $get): bool => filled($get('consistency_ez'))),
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
                                ->visible(fn (Get $get): bool => filled($get('bfsg_full_ez'))),
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
                                ->visible(fn (Get $get): bool => filled($get('bfsg_partial_ez'))),
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
                                ->visible(fn (Get $get): bool => filled($get('non_conform_content_ez'))),
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
                                ->label('Feedback Email')
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
                                ->visible(fn (Get $get): bool => filled($get('feedback_text_ez'))),
                        ]),
                ]),

            // Marktüberwachungsbehörde / Durchsetzungsstelle
            Forms\Components\Section::make('Marktüberwachungsbehörde / Durchsetzungsstelle')
                ->schema([
                    Forms\Components\Grid::make(12)
                        ->schema([
                            Forms\Components\RichEditor::make('market_surveillance_board_address')
                                ->label('Marktüberwachungsbehörde Adresse')
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

                    Forms\Components\Grid::make(12)
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

            // Die auskommentierten Debug-/JSON-Felder unverändert auskommentiert lassen
            /*
                Forms\Components\Textarea::make('html')
                ->rows(6)
                ->label('HTML Content')
                ->nullable(),
            Forms\Components\Textarea::make('html_eztext')
                ->rows(6)
                ->label('HTML Content (Easy Read)')
                ->nullable(),
            Forms\Components\Textarea::make('json_full')
                ->rows(6)
                ->label('JSON Full')
                ->json()
                ->nullable(),
            Forms\Components\Textarea::make('json_eztext')
                ->rows(6)
                ->label('JSON Easy Read')
                ->json()
                ->nullable(),*/
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
            'index' => Pages\ListAccCompDeclarations::route('/'),
            'create' => Pages\CreateAccCompDeclaration::route('/create'),
            'view' => Pages\ViewAccCompDeclaration::route('/{record}'),
            'edit' => Pages\EditAccCompDeclaration::route('/{record}/edit'),
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
