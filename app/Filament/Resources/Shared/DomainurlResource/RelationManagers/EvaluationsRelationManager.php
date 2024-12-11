<?php

namespace App\Filament\Resources\Shared\DomainurlResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;

use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Section;

class EvaluationsRelationManager extends RelationManager
{
    protected static string $relationship = 'evaluations';




    public function form(Form $form): Form
    {
        return $form

            ->schema([
                Section::make('Evaluation')
                    ->schema([


                /*Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
                */
                Forms\Components\DatePicker::make('created_at')
                    ->disabled(),
                /*Forms\Components\TextArea::make('evaluation')
                    ->label('Evaluation')
                    ->readOnly()
                    ->formatStateUsing(fn ($state) =>



                        json_encode(
                            json_decode($state, true), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)),
                        ]),
                */
                ViewField::make('evaluation')
                    ->view('forms.components.evaluation-view')
                    ->label('Evaluation'),
            ])
            ]);

    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            /*->columns([
                Tables\Columns\TextColumn::make('id'),
            ])*/
            ->columns([
                Tables\Columns\TextColumn::make('passed')
                ->label('Passed'),
                Tables\Columns\TextColumn::make('warnings')
                ->label('Warnings'),
                Tables\Columns\TextColumn::make('failed')
                ->label('Failed'),
                Tables\Columns\TextColumn::make('inapplicable')
                ->label('Inapplicable'),
                Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                    return $query->orderBy('created_at', 'desc');

            })
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
