<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\ImagetagResource\Pages;
use App\Filament\Resources\Shared\ImagetagResource\RelationManagers;
use App\Models\Imagetag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;


class ImagetagResource extends Resource
{


    protected static ?string $model = Imagetag::class;
    protected static ?string $recordTitleAttribute = 'description';


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function shouldRegisterNavigation(): bool
    {

        if (auth()->user()->is_admin == 1)
        {
            return true;

        }
        $tenant = Filament::getTenant();
        $featureIds = DB::table('contracts')
                ->join('product_feature', 'contracts.product_id', '=', 'product_feature.product_id')
                ->where('contracts.contractable_id', $tenant->id)
                ->where('contracts.deleted_at', null)
                ->pluck('product_feature.feature_id')
                ->unique()
                ->values()
                ->toArray();
        if(in_array(4, $featureIds)){
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
               /* Forms\Components\TextInput::make('ulid')
                    ->required()
                    ->maxLength(26),
                */


                Forms\Components\TextInput::make('url')
                    ->label('Image')
                    ->view('filament.tables.columns.image-column-form'),
                Forms\Components\TextInput::make('url')
                    ->disabled(),
                /*
                Forms\Components\TextInput::make('hash')
                    ->maxLength(255)
                    ->default(null),
                */
                Forms\Components\Textarea::make('description')
                    //->maxLength(255)
                    ->label('Beschreibung')
                    ->required()
                    ->default(null),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Tables\Columns\TextColumn::make('ulid')
                //    ->searchable(),
                /*Tables\Columns\ImageColumn::make('url')
                    ->label('Image')
                    ->extraAttributes(['class' => 'w-24 h-24'])
                    ->searchable(),
                */
                Tables\Columns\TextColumn::make('url')
                    ->label('Image')
                    ->view('filament.tables.columns.image-column'),
                //Tables\Columns\TextColumn::make('hash')
                //    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Beschreibung')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImagetags::route('/'),
            //'create' => Pages\CreateImagetag::route('/create'),
            'view' => Pages\ViewImagetag::route('/{record}'),
            'edit' => Pages\EditImagetag::route('/{record}/edit'),
        ];
    }
}
