<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Forms\Components\MenuExplorer;
use App\Filament\Forms\Components\MenuNavigator;
use App\Filament\Resources\Admin;
use App\Filament\Resources\MenuItemResource\Pages;
use App\Filament\Resources\MenuItemResource\RelationManagers;
use App\Models\MenuItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class   MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;
    protected static ?string $navigationGroup = 'CMS';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected function afterSave(): void
    {
        $this->emit('menuitem-updated', 'Neuer Eintrag erstellt');
    }

    public static function form(Form $form): Form
    {
        $record = $form->getRecord();


        return $form->schema([
            Forms\Components\Section::make('Menu Explorer (Navbar Top')
                ->schema([

                    MenuExplorer::make($record->id ?? null),

                ])->live()
                ->extraAttributes(['class' => 'overflow-y-auto overflow-visible'])
                ->collapsible()
                ->collapsed(false),
            Forms\Components\Section::make('Menu Item')
                ->schema([

                    Forms\Components\TextInput::make('name')
                        ->label('Name')
                        ->required(),
                    Forms\Components\Select::make('type')
                        ->label('Typ')
                        ->options([
                            'header' => 'Header',
                            'footer' => 'Footer',
                            /* 'nav' => 'Navigation',*/
                        ])
                        ->default('header')
                        ->required(),
                    Forms\Components\TextInput::make('slug')
                        ->label('Domain/URL-Segmente')
                        ->nullable(),
                    Forms\Components\Select::make('parent_id')
                        ->label('Übergeordnetes Element')
                        ->options([NULL => '< - - - - kein - - - - >'] + \App\Models\MenuItem::all()->pluck('name', 'id')->toArray())
                        ->placeholder('Kein übergeordneter Menüpunkt')
                        ->searchable()
                        ->nullable()
                       ,
                    Forms\Components\Select::make('page_id')
                        ->label('Seite')
                        ->options(\App\Models\Page::all()->pluck('title', 'id'))
                        ->searchable()
                        ->placeholder('Zielseite')
                    ,
                    // Weitere Felder nach Bedarf
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page.id')
                    ->label('ID')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->label('Menü')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('fullPath')
                    ->label('URI'),
                Tables\Columns\TextColumn::make('order')
                    ->label('Order')
                    ->searchable()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Admin\MenuItemResource\Pages\ListMenuItems::route('/'),
            'create' => Admin\MenuItemResource\Pages\CreateMenuItem::route('/create'),
            'edit' => Admin\MenuItemResource\Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
