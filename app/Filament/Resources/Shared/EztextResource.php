<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\EztextResource\Pages;
use App\Filament\Resources\Shared\EztextResource\RelationManagers;
use App\Models\Eztext;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Company;
use Filament\Forms\Components\Placeholder;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Support\HtmlString;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class EztextResource extends Resource
{
    protected static ?string $model = Eztext::class;
    protected static ?string $recordTitleAttribute = 'text';
    protected static ?string $label = 'Leichte Sprache'; // Singular name
    protected static ?string $pluralModelLabel = 'Leichte Sprache'; // Plural name

    public static function getRecordTitle($record): ?string
    {
        return Str::limit($record->text, 30); // Replace 'name' with your attribute
    }

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
    {
        //return static::getRecordTitle($record);
        return substr($record->text, 0, 35)."... (".$record->url.")";
}

    public static function getGloballySearchableAttributes(): array
    {
        return ['text', 'url',];
    }

    protected static ?string $navigationIcon = 'icon-leichte-sprache';

    public static function shouldRegisterNavigation(): bool
    {

        if (auth()->user()->is_admin == 1)
        {
            return true;

        }
        $tenant = Filament::getTenant();
        /*
        $featureIds = DB::table('contracts')
                ->join('product_feature', 'contracts.product_id', '=', 'product_feature.product_id')
                ->where('contracts.contractable_id', $tenant->id)
                ->where('contracts.deleted_at', null)
                ->pluck('product_feature.feature_id')
                ->unique()
                ->values()
                ->toArray();
        */
        /*
        $featureIds = DB::table('company_feature')
            ->where('company_id', $tenant->id)
            ->where('deleted_at', null)
            ->pluck('company_feature.feature_id')
            ->unique()
            ->values()
            ->toArray();


        if(in_array(8, $featureIds)){ //TODO feature id fuer eazytext
            return true;
        }
        return false;
        */
        $company = Company::where('id', $tenant->id)->first();
        if($company->hasFeature('leichte-sprache') || $company->hasFeature('eztext') || $company->hasFeature('ezspeak')){
            return true;
        }
        return false;

    }

        public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->columns(2)            // <-- alle Felder in einer Spalte
            ->schema([
                Grid::make()
                    ->columns(12)
                    ->schema([
                        Forms\Components\Select::make('company_id')
                            ->label('Firma')
                            ->relationship(name: 'company', titleAttribute: 'name')
                            ->required()
                            ->disabled()
                            ->searchable()
                            ->visible(fn () => auth()->user()?->isAdmin())
                    ->columnSpan(3),
                    ]),

                Forms\Components\RichEditor::make('text')
                    ->label('Text in leichter Sprache')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'bulletList',
                        'orderedList',
                        'link',
                        'undo',
                        'redo',
                    ])
                    ->required(),

                Placeholder::make('url')
                    ->label('Url')
                    ->columnSpan(2)
                    ->content(fn (callable $get) => new HtmlString(
                        '<a style="text-decoration: underline;" href="' . e($get('url')) . '" target="_blank">' . e($get('url')) . '</a>'
                    )),

                Placeholder::make('count')
                    ->label('Abrufe')
                    ->columnSpan(2)
                    ->content(fn (callable $get) => new HtmlString(
                        '<strong>' . e($get('count')) . '</strong>'
                    )),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Firma')
                    ->visible(fn () => auth()->user()?->isAdmin())
                    ->verticalAlignment(VerticalAlignment::Start)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('text')
                    ->label('Text')
                    ->wrap()
                    ->formatStateUsing(function ($state) {
                        if ($state === null) {
                            return '';
                        }

                        // 1) Entities decodieren, 2) HTML-Tags entfernen, 3) Whitespace normalisieren
                        $plain = html_entity_decode((string) $state, ENT_QUOTES | ENT_HTML5, 'UTF-8');
                        $plain = strip_tags($plain);
                        $plain = preg_replace('/\s+/u', ' ', trim($plain));

                        // 4) Auf 200 Wörter kürzen
                        $words = preg_split('/\s+/u', $plain, -1, PREG_SPLIT_NO_EMPTY);
                        if (! is_array($words)) {
                            return $plain;
                        }

                        if (count($words) <= 50) {
                            return $plain;
                        }

                        return implode(' ', array_slice($words, 0, 50)) . ' [...]';
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('Url')
                    ->wrap()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('count')
                    ->label('Abrufe')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            /*->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])*/
            ->bulkActions([])
            ;
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
            'index' => Pages\ListEztexts::route('/'),
            //'create' => Pages\CreateEztext::route('/create'),
            'view' => Pages\ViewEztext::route('/{record}'),
            'edit' => Pages\EditEztext::route('/{record}/edit'),
        ];
    }
}
