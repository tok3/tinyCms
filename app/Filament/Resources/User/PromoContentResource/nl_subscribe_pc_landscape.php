<?php


use App\Helpers\FontHelper;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;

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
                                Textarea::make('data.text.description')
                                    ->label('Description')
                                    ->required(),
                                TextInput::make('data.text.codesub')
                                    ->label('Codesub')
                                    ->required(),
                                TextInput::make('data.text.code_heading')
                                    ->label('Code Heading')
                                    ->required(),
                                TextInput::make('data.text.copyright')
                                    ->label('Copyright')
                                    ->required(),
                            ]),
                        ])->columns(1),
                ]),
            Tabs\Tab::make('Erweiterte Einstellungen')
                ->schema([
                    Group::make([
                        Fieldset::make('Schriftarten')
                            ->schema([
                                Select::make('data.settings.fontHeading')
                                    ->label('Überschrift')
                                    ->options($fonts)
                                    ->default('Lato-Regular') // Standardwert setzen
                                    ->selectablePlaceholder(false)
                                    ->required(),
                                Select::make('data.settings.fontText')
                                    ->label('Text')
                                    ->options($fonts)
                                    ->default('Lato-Regular') // Standardwert setzen
                                    ->required(),
                                Select::make('data.settings.fontCode')
                                    ->label('Code Über/Unterschrift')
                                    ->options($fonts)
                                    ->default('Lato-Regular') // Standardwert setzen
                                    ->required(),
                            ])->columns(3),
                        Fieldset::make('Farbeinstellungen')
                            ->schema([
                                Group::make([
                                    ColorPicker::make('data.settings.fontColor')
                                        ->default('#ffffff')
                                        ->label('Schriftfarbe'),
                                    ColorPicker::make('data.settings.codeColor')
                                        ->default('#ffffff')
                                        ->label('Code-Farbe'),
                                ])->columns(2),
                                Radio::make('data.settings.backgroundType')
                                    ->options([
                                        'single' => 'Einfarbig',
                                        'gradient' => 'Zweifarbiger Farbverlauf',
                                    ])
                                    ->label('Code Hintergrund')
                                    ->reactive()
                                    ->afterStateUpdated(function (callable $set, $state) {
                                        if ($state === 'single') {
                                            $set('data.settings.showGradientBottom', false);
                                        } else {
                                            $set('data.settings.showGradientBottom', true);
                                        }
                                    }),
                                Group::make([
                                    ColorPicker::make('data.settings.gradientColorTop')
                                        ->default('#a1a1a1')
                                        ->label('Verlaufsfarbe Code-Hintergrund oben/start'),
                                    ColorPicker::make('data.settings.gradientColorBottom')
                                        ->default('#a1a1a1')
                                        ->label('Verlaufsfarbe Code-Hintergrund unten/ende')
                                        ->visible(fn($get) => $get('data.settings.backgroundType') === 'gradient'),
                                ])->columns(2),
                            ]),
                    ])->columns(1),
                ]),
        ])->activeTab(2)
];
