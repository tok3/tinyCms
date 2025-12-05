<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\AccessibilityFeedbackResource\Pages;
use App\Models\AccessibilityFeedback;
use App\Models\Company;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AccessibilityFeedbackResource extends Resource
{
    protected static ?string $model = AccessibilityFeedback::class;

    protected static ?string $navigationLabel = 'Rückmeldungen Barrierefreiheit';
    protected static ?string $navigationGroup = 'Erklärung zur Barrierefreiheit';
    protected static ?string $pluralLabel = 'Rückmeldungen Barrierefreiheit';
    protected static ?string $modelLabel = 'Rückmeldung';
    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    public static function shouldRegisterNavigation(): bool
    {
        if (auth()->user()->is_admin == 1)
        {

            return true;

        }
        $tenant = Filament::getTenant();
        $company = Company::where('id', $tenant->id)->first();

        if($company->hasFeature('barrierefreiheitserklaerung')){
            return true;
        }

        return false;
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('company.name')
                ->label('Kunde')
                ->disabled(),

            Forms\Components\TextInput::make('first_name')
                ->label('Vorname')
                ->disabled(),

            Forms\Components\TextInput::make('last_name')
                ->label('Nachname')
                ->disabled(),

            Forms\Components\TextInput::make('email')
                ->label('E-Mail')
                ->disabled(),

            Forms\Components\TextInput::make('page_url')
                ->label('Beanstandete Seite')
                ->disabled(),

            Forms\Components\Textarea::make('body')
                ->label('Nachricht')
                ->rows(8)
                ->disabled(),

            Forms\Components\Toggle::make('privacy_accepted')
                ->label('Datenschutz akzeptiert')
                ->disabled(),

            Forms\Components\Toggle::make('is_read')
                ->label('Gelesen'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Eingang')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('company.name')
                    ->label('Kunde')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('first_name')
                    ->label('Vorname'),

                Tables\Columns\TextColumn::make('last_name')
                    ->label('Nachname'),

                Tables\Columns\TextColumn::make('email')
                    ->label('E-Mail')
                    ->searchable(),

                Tables\Columns\TextColumn::make('page_url')
                    ->label('Seite')
                    ->limit(40),

                Tables\Columns\BadgeColumn::make('is_read')
                    ->label('Status')
                    ->formatStateUsing(fn (bool $state) => $state ? 'Gelesen' : 'Neu')
                    ->colors([
                        'success' => true,
                        'warning' => false,
                    ]),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_read')
                    ->label('Gelesen'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->after(function (AccessibilityFeedback $record) {
                        if (! $record->is_read) {
                            $record->update(['is_read' => true]);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('mark_read')
                        ->label('Als gelesen markieren')
                        ->action(fn ($records) => $records->each->update(['is_read' => true])),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAccessibilityFeedback::route('/'),
            'view'  => Pages\ViewAccessibilityFeedback::route('/{record}'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
