<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
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
                ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kd_nr')
                    ->label('KD-Nr')
                    ->getStateUsing(fn(User $user) =>
                    $user->companies
                        ->pluck('kd_nr')
                        ->implode(', ')
                    ),
                Tables\Columns\TextColumn::make('id') // Real existierendes Feld
                ->label('Companies')
                    ->getStateUsing(function (User $record) {
                        return $record->companies->pluck('name')->implode(', ');
                    })
                    ->sortable(function (Builder $query) {
                        $direction = request()->get('sortDirection', 'asc');

                        return $query
                            ->leftJoin('company_user', 'users.id', '=', 'company_user.user_id')
                            ->leftJoin('companies', 'companies.id', '=', 'company_user.company_id')
                            ->orderBy('companies.name', $direction)
                            ->select('users.*');
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                  ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                  ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->label('Email verifiziert')
                    ->default('0000-00-00')
                    ->formatStateUsing(function ($state) {
                        // Prüfe, ob das Datum gültig ist, bevor es formatiert wird
                        return ($state && Carbon::hasFormat($state, 'Y-m-d H:i:s'))
                            ? Carbon::parse($state)->format('d.m.Y H:i')
                            : 'n/a';
                    })->alignment(Alignment::Center),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Aktualisiert')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)
                        ->format('d.m.Y H:i'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Erstellt')
                    ->formatStateUsing(fn($state) => Carbon::parse($state)
                        ->format('d.m.Y H:i'))
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

// In your UserResource

    /*public static function query(): Builder
    {
        return parent::query()->with('company');
    }*/

}

