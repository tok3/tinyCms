<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Name'),
                Forms\Components\TextInput::make('email')
                    ->required()
                    ->label('Email')
                    ->email(),
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->rules(['nullable', 'min:8'])
                    ->dehydrated(fn($state) => filled($state)),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
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

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\Shared\UserResource\Pages\ListUsers::route('/'),
            'create' => \App\Filament\Resources\Shared\UserResource\Pages\CreateUser::route('/create'),
            'edit' => \App\Filament\Resources\Shared\UserResource\Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        if (auth()->user()->is_admin)
        {
            return true; // Navigation nur für Admins sichtbar
        }

        return false;
    }

    public static function getModelLabel(): string
    {
        return __('User');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Users');
    }
}
