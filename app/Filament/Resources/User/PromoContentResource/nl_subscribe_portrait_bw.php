<?php

use App\Helpers\FontHelper;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Radio;

$fonts = FontHelper::listFonts(storage_path('userfonts'));

return [
    Tabs::make('Content Tabs')
        ->tabs([
            Tabs\Tab::make('Einstellungen')
                ->schema([
                    Group::make([
                        Fieldset::make('Text')
                            ->schema([


                                TextInput::make('data.text.heading')
                                    ->label('Heading')
                                    ->required(),
                                TextInput::make('data.text.sub')
                                    ->label('Sub')
                                    ->required(),
                                Grid::make(2)
                                    ->schema([
                                        Textarea::make('data.text.bottom_left')
                                            ->label('Bottom Left')
                                            ->required(),
                                        Textarea::make('data.text.bottom_right')
                                            ->label('Bottom Right')
                                            ->required(),
                                    ]),
                                TextInput::make('data.text.footer')
                                    ->label('Footer')
                                    ->required(),

                            ])->columns(1),


                    ]),
                ]),
            Tabs\Tab::make('Erweiterte Einstellungen')
                ->schema([
                    Group::make([
                        Fieldset::make('Schriftarten')
                            ->schema([
                                Select::make('data.settings.fontHeading')
                                    ->label('Überschrift')
                                    ->options($fonts)
                                    ->required(),
                                Select::make('data.settings.fontText')
                                    ->label('Text')
                                    ->options($fonts)
                                    ->required(),
                            ])->columns(1),

                        Fieldset::make('Farbe')
                            ->schema([
                                Group::make([
                                    ColorPicker::make('data.settings.fontColor')
                                        ->default('#ffffff')
                                        ->label('Schriftfarbe')->live(),
                                    ColorPicker::make('data.settings.codeColor')
                                        ->default('#ffffff')
                                        ->label('Code-Farbe'),
                                    ColorPicker::make('data.settings.lineColor')
                                        ->default('#ffffff')
                                        ->label('Linienfarbe'),
                                ])->columns(3),
                            ])->columns(1),

                        TextInput::make('data.text.copy_flank')
                            ->label('Copyright rechts/links')
                            ->required()
                            ->extraAttributes(['class' => 'subscription-required'])
                            ->readOnly(),
                    ])->columns(1),
                ]),
        ])->activeTab(1)
];
