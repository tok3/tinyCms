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


class AccDeclarationResource extends Resource
{
    protected static ?string $model = AccDeclaration::class;
    protected static ?string $label = 'Barrierefreiheitserklärung';
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
        if($company->hasFeature('barrierefreiheitserklaerung') && ($company->type === 1 || $company->type === 2)){
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
                    ->content(function ($record) {
                        //$tenant = Filament::getTenant();

                        //$company = Company::where('id', $tenant->id)->first();
                        $company = null;
                        if(isset($record->company_id)){

                            $company = Company::where('id', $record->company_id)->first();
                        } else {
                                $tenant = Filament::getTenant();
                                $company = Company::where('id', $tenant->id)->first();
                        }
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
                    ->content(function ($record) {
                        //$tenant = Filament::getTenant();
                        //$company = Company::where('id', $tenant->id)->first();

                        $company = null;
                        if(isset($record->company_id)){

                            $company = Company::where('id', $record->company_id)->first();
                        } else {
                                $tenant = Filament::getTenant();
                                $company = Company::where('id', $tenant->id)->first();
                        }

                        if (!$company || !$company->slug) {
                            return 'Kein Unternehmen oder Slug verfügbar';
                        }
                        $url = config('app.url') . '/showAccessibilityDeclarationEz/' . $company->slug;
                        return new \Illuminate\Support\HtmlString(
                            '<a href="' . e($url) . '" target="_blank" class="text-primary-600 hover:underline">' . e($url) . '</a>'
                        );
                    }),
                Forms\Components\Placeholder::make('form_instructions')
                    ->label('Hinweis')
                    ->content('Inhalte mit leichter Sprache werden nach dem Speichern auf Basis der entsprechenden Texte generiert und können danach frei angepasst werden.'),
                Forms\Components\Toggle::make('published')
                    ->label('Veröffentlichen')
                    ->default(true),
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

                Forms\Components\TextInput::make('scope')
                    ->url()
                    ->label('Geltungsbereich (Domain)')
                    ->nullable(),
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
                Forms\Components\select::make('enforcement_agency')
                    ->label('Durchsetzungsstelle')
                    ->options(\App\Models\AccEnforcementAgency::pluck('state', 'id')->toArray())
                    //->required()
                    ->nullable(),
                Forms\Components\Select::make('federal_or_state_law')
                    ->label('Bundes- oder Landesrecht')
                    ->options([
                        0 => 'Bundesrecht',
                        1 => 'Landesrecht',
                    ])
                    ->required(),
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
                Forms\Components\Textarea::make('market_supervision_board')
                    ->rows(7)
                    ->label('Marktüberwachungsbehörde Adresse')
                    ->required()
                    ->nullable(),
                Forms\Components\Textarea::make('enforcement_text')
                    ->rows(4)
                    ->label('Zusatztext Durchsetzungsstelle')
                    ->nullable(),
                Forms\Components\Textarea::make('enforcement_text_ez')
                    ->rows(4)
                    ->label('Zusatztext Durchsetzungsstelle (Leichte Sprache)')
                    ->nullable()
                    ->visible(fn (Get $get): bool => filled($get('enforcement_text_ez'))),
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
                    ->nullable(),
                        */
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

