<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\EztextResource\Pages;
use App\Filament\Resources\Shared\EztextResource\RelationManagers;
use App\Models\Eztext;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Company;
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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

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
            ->schema([
                /*
                Forms\Components\TextInput::make('company_name')

                    ->label('Firma')
                    ->disabled()
                    ->hidden(fn () => ! auth()->user()?->isAdmin())
                    ->maxLength(26),
                */
                Forms\Components\Select::make('company_id')
                    ->label('Firma')
                    ->relationship(name: 'company', titleAttribute: 'name')
                    ->required()
                    ->disabled()
                    ->searchable(),
                Forms\Components\Textarea::make('text')
                    ->label('Text')
                    ->rows(20)
                    ->required(),

                    //->columnSpanFull(),
                Forms\Components\TextInput::make('count')
                    ->label('Abrufe')
                    ->numeric()
                    ->disabled(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Firma')
                    ->visible(fn () => auth()->user()?->isAdmin())
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('text')
                    ->label('Text')
                    ->wrap()
                    ->searchable(),
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
