<?php
namespace App\Filament\Resources\Shared;

use App\Models\Pa11yUrl;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms;
use App\Filament\Resources\Shared\Pa11yUrlResource\Pages;

class Pa11yUrlResource extends Resource
{
    protected static ?string $model = Pa11yUrl::class;

    protected static ?string $navigationIcon = 'heroicon-o-link';
    protected static ?string $navigationLabel = 'URLs';
    protected static ?string $navigationGroup = 'Accessibility Tools';
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('url')
                    ->label('URL')
                    ->required(),
                Forms\Components\DateTimePicker::make('last_checked')
                    ->label('Last Checked'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('last_checked')
                    ->label('Last Checked')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('view_results')
                    ->label('View Results')
                    ->url(fn ($record) => static::getUrl('view', ['record' => $record->id]))
                    ->icon('heroicon-o-eye'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPa11yUrls::route('/'),
            'create' => Pages\CreatePa11yUrl::route('/create'),
            'edit' => Pages\EditPa11yUrl::route('/{record}/edit'),
            'view' => Pages\ViewPa11yUrl::route('/{record}/view'), // Neue View-Seite
        ];
    }
}
