<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\AccCompDeclarationResource\Pages;
use App\Filament\Resources\Shared\AccCompDeclarationResource\RelationManagers;
use App\Models\AccCompDeclaration;
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

class AccCompDeclarationResource extends Resource
{
    protected static ?string $model = AccCompDeclaration::class;
    protected static ?string $label = 'Barrierefreiheitserklärung';
    protected static ?string $pluralLabel = 'Barrierefreiheitserklärung 2';
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
            return true;
        }
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                                Forms\Components\Placeholder::make('accessibility_declaration_link')
                    ->label('Barrierefreiheitserklärung Link')
                    ->content(function () {
                        $tenant = Filament::getTenant();
                        $company = Company::where('id', $tenant->id)->first();
                        if (!$company || !$company->slug) {
                            return 'Kein Unternehmen oder Slug verfügbar';
                        }
                        $url = config('app.url') . '/showAccessibilityDeclaration/' . $company->slug;
                        return new \Illuminate\Support\HtmlString(
                            '<a href="' . e($url) . '" target="_blank" class="text-primary-600 hover:underline">' . e($url) . '</a>'
                        );
                    }),
                Forms\Components\Placeholder::make('accessibility_declaration_link')
                    ->label('Barrierefreiheitserklärung Link (leichte Sprache')
                    ->content(function () {
                        $tenant = Filament::getTenant();
                        $company = Company::where('id', $tenant->id)->first();
                        if (!$company || !$company->slug) {
                            return 'Kein Unternehmen oder Slug verfügbar';
                        }
                        $url = config('app.url') . '/showAccessibilityDeclarationEz/' . $company->slug;
                        return new \Illuminate\Support\HtmlString(
                            '<a href="' . e($url) . '" target="_blank" class="text-primary-600 hover:underline">' . e($url) . '</a>'
                        );
                    }),
                Forms\Components\Toggle::make('published')
                    ->label('Veröffentlichen')
                    ->default(true),
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
                    ->default(1)
                    ->label('Warum nicht vereinbar?'),
                */
                Forms\Components\Textarea::make('consistency')
                    ->rows(4)
                    ->default('Unsere Produkte und Dienstleistungen sind für Menschen mit Behinderungen in der allgemein üblichen Weise, ohne besondere Erschwernis und grundsätzlich ohne fremde Hilfe auffindbar, zugänglich und nutzbar.')
                    ->label('Vereinbarkeit'),
                Forms\Components\Textarea::make('consistency_ez')
                    ->rows(4)
                    ->label('Vereinbarkeit (leichte Sprache)')
                    ->visible(fn (Get $get): bool => filled($get('consistency_ez'))),
                Forms\Components\Textarea::make('bfsg_full')
                    ->rows(4)
                    ->default('Unsere Webseite ist mit dem BFSG und der BFSGV vereinbar; alle Anforderungen werden erfüllt.')
                    ->label('Text für volle Konformität'),
                Forms\Components\Textarea::make('bfsg_full_ez')
                    ->rows(4)
                    ->label('Text für volle Konformität (leichte Sprache)')
                    ->visible(fn (Get $get): bool => filled($get('bfsg_full_ez'))),
                Forms\Components\Textarea::make('bfsg_partial')
                    ->rows(4)
                    ->default('Unsere Webseite ist in großen Teilen mit dem BFSG und der BFSGV vereinbar. Jedoch bestehen noch einige Barrieren auf unseren Seiten, an denen wir aktiv arbeiten und diese in Zukunft beseitigen wollen. Folgende Ausnahmen und Unvereinbarkeiten bestehen:')
                    ->label('Text für teilweise Konformität'),
                Forms\Components\Textarea::make('bfsg_partial_ez')
                    ->rows(4)
                    ->label('Text für teilweise Konformität (leichte Sprache)')
                    ->visible(fn (Get $get): bool => filled($get('bfsg_partial_ez'))),

                Forms\Components\Textarea::make('non_conform_content')
                    ->rows(4)
                    ->default('Die folgenden Inhalte sind nicht barrierefrei, da Sie eine unverhältnismäßige Belastung gemäß § 12a Absatz 6 BGG darstellen:')
                    ->label('Nicht konforme Inhalte'),
                Forms\Components\Textarea::make('non_conform_content_ez')
                    ->rows(4)
                    ->label('Nicht konforme Inhalte (leichte Sprache)')
                    ->visible(fn (Get $get): bool => filled($get('non_conform_content_ez'))),

                Forms\Components\Textarea::make('declaration_intro_text')
                    ->rows(4)
                    ->label('Eingangsbeschreibung'),
                Forms\Components\Textarea::make('declaration_intro_text_ez')
                    ->rows(4)
                    ->label('Eingangsbeschreibung (Leichte Sprache)')
                    ->visible(fn (Get $get): bool => filled($get('declaration_intro_text_ez'))),
                Forms\Components\TextInput::make('feedback_url')
                    ->url()
                    ->label('Feedback URL')
                    ->nullable(),
                Forms\Components\TextInput::make('feedback_email')
                    ->label('Feedback Email')
                    ->nullable(),
                Forms\Components\TextInput::make('feedback_phone')
                    ->label('Feedback Tel.')
                    ->nullable(),
                Forms\Components\Textarea::make('feedback_address')
                    ->label('Feedback Postanschrift')
                    ->rows(4)
                    ->nullable(),
                Forms\Components\Textarea::make('feedback_text')
                    ->rows(4)
                    ->label('Feedback Zusatztext')
                    ->nullable(),
                Forms\Components\Textarea::make('feedback_text_ez')
                    ->rows(4)
                    ->label('Feedback Zusatztext (Leichte Sprache)')
                    ->nullable()
                    ->visible(fn (Get $get): bool => filled($get('feedback_text_ez'))),
                Forms\Components\Textarea::make('market_surveillance_board_address')
                    ->rows(4)
                    ->label('Marktüberwachungsbehörde Adresse')
                    ->nullable(),
                Forms\Components\Textarea::make('market_surveillance_board_address_text')
                    ->rows(4)
                    ->label('Marktüberwachungsbehörde Zusatztext')
                    ->nullable(),
                Forms\Components\Textarea::make('market_surveillance_board_address_text_ez')
                    ->rows(4)
                    ->label('Marktüberwachungsbehörde Zusatztext (Leichte Sprache)')
                    ->nullable()
                    ->visible(fn (Get $get): bool => filled($get('market_surveillance_board_address_text_ez'))),
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
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Erstellt am')
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
