<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\DomainurlResource\Pages;
use App\Filament\Resources\Shared\DomainurlResource\RelationManagers;

use App\Models\Domainurl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;
use Filament\Facades\Filament;

class DomainurlResource extends Resource
{
    protected static ?string $model = Domainurl::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';

    protected static ?string $navigationLabel = 'URLs';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('domain_id')
                    ->required()
                    ->maxLength(26),
                Forms\Components\TextInput::make('company_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255)
                    ->default(null),
                /*Forms\Components\Textarea::make('overall_stats')
                    ->columnSpanFull(),*/
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                /*
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable(),
                Tables\Columns\TextColumn::make('domain_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('company_id')
                    ->numeric()
                    ->sortable(),
                */
                Tables\Columns\TextColumn::make('url')
                    ->searchable()
                    ->label('URL'),
                Tables\Columns\TextColumn::make('failed_oldest')
                    ->sortable()
                    ->colors([
                        'primary',   // Default color
                        'success' => 'active', // Green for "active"
                        'danger' => 'inactive', // Red for "inactive"
                    ])
                    ->label('Failed erste Eval.'),
                Tables\Columns\TextColumn::make('failed_latest')
                    ->sortable()
                    ->label('Failed letzte Eval.'),
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
                Action::make('evaluationReport')
                    ->label('Evaluations - Report')
                    ->url(fn ($record) => route('filament.dashboard.resources.shared.evaluations.view', ['tenant' => Filament::getTenant()->id, 'record' => $record]))

                    ->openUrlInNewTab(),


                //Tables\Actions\ViewAction::make(),
               // Tables\Actions\EditAction::make(),
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
            //RelationManagers\EvaluationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDomainurls::route('/'),
            //'create' => Pages\CreateDomainurl::route('/create'),
            'view' => Pages\ViewDomainurl::route('/{record}'),
            //'edit' => Pages\EditDomainurl::route('/{record}/edit'),
        ];
    }
}
