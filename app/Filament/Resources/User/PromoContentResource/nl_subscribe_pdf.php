<?php

use App\Helpers\FontHelper;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Fieldset;


$fonts = FontHelper::listFonts(storage_path('userfonts'));

return [
    Tabs::make('Content Tabs')
        ->tabs([
            Tabs\Tab::make('Einstellungen')
                ->schema([
                    Fieldset::make('Text')
                        ->schema([

                            Group::make([
                                TextInput::make('data.text.heading')
                                    ->label('Heading')
                                    ->required(),
                                Textarea::make('data.text.small_top')
                                    ->label('Hinweistext oben'),
                                TextInput::make('data.text.hintBottom')
                                    ->label('Hint Bottom'),


                            ])->columnSpan(1),

                        ])->columns(1),


                ]),
            Tabs\Tab::make('Erweiterte Einstellungen')
                ->schema([
                    Fieldset::make('Schrift & Farben')
                        ->schema([


                            Group::make([
                                Select::make('data.settings.colorSelectMode')
                                    ->label('Choose Option')
                                    ->options([
                                        'color_picker' => 'Color Picker',
                                        'screenshot' => 'Website Screenshot',
                                    ])
                                    ->required()
                                    ->reactive()
                                    ->afterStateUpdated(fn($state, $set) => $set('data.settings.colorSelectMode', $state)),

                                ColorPicker::make('data.settings.gradientColorTop')
                                    ->label('Verlaufsfarbe1 Code-Hintergrund')
                                    ->hidden(fn($get) => $get('data.settings.colorSelectMode') !== 'color_picker')
                                    ->required(fn($get) => $get('data.settings.colorSelectMode') === 'color_picker')
                                    ->extraAttributes(['id' => 'gradientColorTop']),

                                ColorPicker::make('data.settings.gradientColorBottom')
                                    ->label('Verlaufsfarbe2 Code-Hintergrund')
                                    ->hidden(fn($get) => $get('data.settings.colorSelectMode') !== 'color_picker')
                                    ->required(fn($get) => $get('data.settings.colorSelectMode') === 'color_picker')
                                    ->extraAttributes(['id' => 'gradientColorBottom']),

                                TextInput::make('data.settings.websiteScreenshot')
                                    ->label('Farbe von Webseite verwenden')
                                    ->hidden(fn($get) => $get('data.settings.colorSelectMode') !== 'screenshot')
                                    ->required(fn($get) => $get('data.settings.colorSelectMode') === 'screenshot')
                                    ->rule('url')
                                    ->rule('regex:/^https?:\/\//i')
                                    ->extraAttributes(['id' => 'websiteScreenshot']),

                                Select::make('data.settings.h1')
                                    ->label('Font')
                                    ->options($fonts)
                                    ->required(),
                            ])->columnSpan(1),
                        ])->columns(1),

                ]),
        ])->activeTab(2)
];
