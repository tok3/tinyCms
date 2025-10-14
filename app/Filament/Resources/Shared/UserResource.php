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
use App\Models\Company;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\View as ViewField;
use App\Filament\Resources\Shared\CompanyResource;
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
                Forms\Components\Section::make('Zugeordnete Firmen')
                    ->schema([
                        ViewField::make('user-companies')
                            ->view('filament.components.user-companies')
                            ->columnSpanFull()
                            ->visibleOn('edit'),
                    ]),
                ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kd_nr')
                    ->label('KD-Nr')
                    ->getStateUsing(function (User $user) {
                        $c = $user->companies->firstWhere('is_agency', 1) ?? $user->companies->first();
                        return $c?->kd_nr ?? '—';
                    })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('companies', function (Builder $q) use ($search) {
                            $q->where('companies.kd_nr', 'like', "%{$search}%");
                        });
                    }),
                Tables\Columns\TextColumn::make('company_name')
                    ->label('Firma')
                    ->getStateUsing(function (User $user) {
                        $c = $user->companies->firstWhere('is_agency', 1) ?? $user->companies->first();
                        return $c?->name ?? '—';
                    })
                    ->searchable(query: function (Builder $query, string $search): Builder {
                        return $query->whereHas('companies', function (Builder $q) use ($search) {
                            $q->where('companies.name', 'like', "%{$search}%");
                        });
                    }),
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

