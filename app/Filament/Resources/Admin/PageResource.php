<?php

namespace App\Filament\Resources\Admin;

use App\Filament\Resources\Admin;
use App\Filament\Resources\Admin\PageResource\Actions\CopyAction;
use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Tab;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SpatieTagsColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\ViewField;

class   PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'CMS';

    public static function form(Form $form): Form
    {


        return $form
            ->schema([
                Forms\Components\Section::make()->schema([

                    Forms\Components\Actions::make([

                        Forms\Components\Actions\Action::make('Seite Ansehen')
                            ->url(fn(Forms\Get $get): string => $get('slug') ? route('frontend', $get('slug')) : '#')
                            ->openUrlInNewTab()
                            ->icon('heroicon-m-eye')
                            ->color('gray')
                            ->visible(fn(Forms\Get $get) => !is_null($get('slug')) && $get('slug') !== ''),

                        Forms\Components\Actions\Action::make('Theme Ansehen')
                            ->url('/assan/index.html')
                            ->openUrlInNewTab()
                            ->icon('heroicon-m-eye')
                            ->color('gray')
                            ->visible(),

                    ]),
                    Tabs::make('Page Tabs')->tabs([

                        Tabs\Tab::make('Page')
                            ->schema([
                                //TABCONTENT
                                Group::make([
                                    Toggle::make('published'),


                                ])->columnSpan('full'),


                                TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->autocomplete(false)
                                    ->afterStateUpdated(function ($state, Forms\Set $set) {

                                        $slug = $set('slug', str($state)->slug()->toString());
                                        while (Page::whereSlug($slug)->exists())
                                        {
                                            $slug = $set('slug', str($state)->slug()->toString());
                                        }

                                        return $slug;
                                    }
                                    ),

                                TextInput::make('slug')
                                    ->required()
                                    ->dehydrated(true),

                                SpatieTagsInput::make('tags'),


                                Select::make('navbar_type')
                                    ->options([
                                        1 => 'White Opaque',
                                        2 => 'Start Transparent',
                                    ])
                                    ->default(1)
                                    ->required()
                                    ->label('Navbar Type'),


                                Forms\Components\Section::make('Content')->schema([

                                    //-------------------------------------

                                    Forms\Components\Builder::make('blocks')
                                        ->blocks([

                                            //-------------------------------------
                                            Forms\Components\Builder\Block::make('text')
                                                ->schema([

                                                    Fieldset::make('Container Settings')
                                                        ->schema([
                                                            TextInput::make('container_id')
                                                                ->label('Container ID')
                                                                ->columnSpan(8), // Nimmt die Hälfte der Zeile ein

                                                            Select::make('margin_top')
                                                                ->label('Margin Top')
                                                                ->options([
                                                                    '60px' => '+60px',
                                                                    '50px' => '+50px',
                                                                    '40px' => '+40px',
                                                                    '30px' => '+30px',
                                                                    '20px' => '+20px',
                                                                    '10px' => '+10px',
                                                                    '0px' => '0px',
                                                                    '-10px' => '-10px',
                                                                    '-20px' => '-20px',
                                                                    '-30px' => '-30px',
                                                                    '-40px' => '-40px',
                                                                    '-50px' => '-50px',
                                                                ])
                                                                ->default('mt-0')
                                                                ->columnSpan(2), // Nimmt ein Viertel der Zeile ein

                                                            Select::make('margin_bottom')
                                                                ->label('Margin Bottom')
                                                                ->options([
                                                                    '60px' => '+60px',
                                                                    '50px' => '+50px',
                                                                    '40px' => '+40px',
                                                                    '30px' => '+30px',
                                                                    '20px' => '+20px',
                                                                    '10px' => '+10px',
                                                                    '0px' => '0px',
                                                                    '-10px' => '-10px',
                                                                    '-20px' => '-20px',
                                                                    '-30px' => '-30px',
                                                                    '-40px' => '-40px',
                                                                    '-50px' => '-50px',
                                                                ])
                                                                ->default('mb-0')
                                                                ->columnSpan(2), // Nimmt ein Viertel der Zeile ein
                                                        ])
                                                        ->columns(12) // Stellt sicher, dass das Fieldset ein 12-Spalten-Layout verwendet
                                                        ->extraAttributes(['style' => 'background-color:#F9FAFB']),

                                                    TextInput::make('heading')
                                                        ->label('Heading')
                                                        ->columnSpan(9),
                                                    Select::make('levelHeading')
                                                        ->options([
                                                            'h1' => 'Heading 1',
                                                            'h2' => 'Heading 2',
                                                            'h3' => 'Heading 3',
                                                            'h4' => 'Heading 4',
                                                            'h5' => 'Heading 5',
                                                            'h6' => 'Heading 6',
                                                        ])
                                                        ->default('h2')
                                                        ->columnSpan(3),
                                                    TextInput::make('heading2')
                                                        ->label('Heading 2')
                                                        ->columnSpan(9),
                                                    Select::make('levelHeading2')
                                                        ->options([
                                                            'h1' => 'Heading 1',
                                                            'h2' => 'Heading 2',
                                                            'h3' => 'Heading 3',
                                                            'h4' => 'Heading 4',
                                                            'h5' => 'Heading 5',
                                                            'h6' => 'Heading 6',
                                                        ])
                                                        ->default('h4')
                                                        ->columnSpan(3),
                                                    Forms\Components\Textarea::make('teaser')
                                                        ->label('Teaser/Anriss')
                                                        ->columnSpan(12)
                                                    ,

                                                    TinyEditor::make('text')->profile('custom')->toolbarSticky(true)
                                                        ->columnSpan(12),
                                                ])->label(function (?array $state): string {
                                                    if ($state === null)
                                                    {
                                                        return 'Textblock';
                                                    }

                                                    $label = $state['heading'] ?? '';

                                                    if (empty($label))
                                                    {
                                                        $label = $state['heading2'] ?? '';
                                                    }

                                                    if (empty($label))
                                                    {
                                                        $label = $state['teaser'] ?? '';
                                                        $label = trim(\Str::limit(html_entity_decode($label), 55, '[..]'));
                                                    }

                                                    if (empty($label))
                                                    {
                                                        $label = $state['text'] ?? '';
                                                        // HTML-Tags entfernen und den Text auf 55 Zeichen begrenzen
                                                        $label = trim(\Str::limit(html_entity_decode(strip_tags($label)), 55, '[..]'));
                                                    }


                                                    return $label ?: 'Untitled Textblock';
                                                })
                                                ->columns(12),


                                            //-------------------------------------

                                            Forms\Components\Builder\Block::make('tinyMCE')
                                                ->schema([

                                                    TinyEditor::make('editorContent')->profile('custom')->toolbarSticky(true)
                                                ])->label(function (?array $state): string {
                                                    $compName = "Editor TinyMCE";

                                                    if ($state === null)
                                                    {

                                                        return 'Editor TinyMCE';
                                                    }

                                                    $label = strip_tags($state['editorContent']);

                                                    //$label = $state['editorContent'];

                                                    return $compName . ' ( ' . trim(\Str::limit(html_entity_decode($label) . ' )', 55, '[..]')) ?? $compName;
                                                })
                                            ,
                                            //-------------------------------------

                                            Forms\Components\Builder\Block::make('blockquote')
                                                ->schema([
                                                    Forms\Components\Textarea::make('quote')
                                                        ->label('Blockquote')
                                                        ->required()
                                                        ->columnSpan(8),
                                                    Forms\Components\TextInput::make('author')
                                                        ->label('Autor')
                                                        ->columnSpan(4),
                                                    Forms\Components\TextInput::make('buttonText')
                                                        ->label('Button Text')
                                                        ->columnSpan(4),
                                                    Forms\Components\TextInput::make('buttonTarget')
                                                        ->label('Button Target')
                                                        ->columnSpan(4),
                                                ])
                                                ->columns(12),

                                            //-------------------------------------
                                            Forms\Components\Builder\Block::make('countdown-timer')
                                                ->schema([
                                                    // Erste Zeile: Datetimepicker und Dropdown
                                                    Forms\Components\Grid::make(12)->schema([
                                                        Forms\Components\DateTimePicker::make('endDate')
                                                            ->label('Ende Datum')
                                                            ->required()
                                                            ->columnSpan(3), // Schmaler Bereich oben

                                                        // Dropdown für Erscheinungsbild
                                                        Forms\Components\Select::make('background')
                                                            ->label('Erscheinungsbild')
                                                            ->options([
                                                                'bg-primary' => 'Primärfarbe',
                                                                'bg-secondary' => 'Sekundärfarbe',
                                                                'bg-gradient-blue' => 'Blauer Verlauf',
                                                                'bg-gradient-primary' => 'Primärer Verlauf',
                                                            ])
                                                            ->required() // Optional, falls eine Auswahl erforderlich ist
                                                            ->columnSpan(3), // Schmaler Bereich für den Dropdown
                                                    ]),

                                                    // Zweite Zeile: Überschrift untereinander
                                                    Forms\Components\Grid::make(12)->schema([
                                                        Forms\Components\Textarea::make('heading')
                                                            ->label('Überschrift')
                                                            ->required()
                                                            ->columnSpan(8), // Volle Breite
                                                    ]),

                                                    // Dritte Zeile: Subtext unter Überschrift
                                                    Forms\Components\Grid::make(12)->schema([
                                                        Forms\Components\TextInput::make('subtext')
                                                            ->label('Subtext')
                                                            ->columnSpan(8), // Volle Breite
                                                    ]),


                                                    // Vierte Zeile: Button Text, Button Target und Dropdown für Button-Erscheinungsbild auf eine Breite von 8 beschränkt
                                                    Forms\Components\Grid::make(8)->schema([ // Ändere das Grid auf 8 Spalten
                                                        Forms\Components\TextInput::make('buttonText')
                                                            ->label('Button Text')
                                                            ->columnSpan(2), // Verteilt die Breite gleichmäßig innerhalb von 8 Spalten

                                                        Forms\Components\TextInput::make('buttonTarget')
                                                            ->label('Button Target')
                                                            ->columnSpan(2), // Verteilt die Breite gleichmäßig innerhalb von 8 Spalten

                                                        // Dropdown für Button-Erscheinungsbild
                                                        Forms\Components\Select::make('buttonAppearance')
                                                            ->label('Button Erscheinungsbild')
                                                            ->options([
                                                                'btn-light' => 'Hell',
                                                                'btn-dark' => 'Dunkel',
                                                                'btn-primary' => 'Primär',
                                                                'btn-secondary' => 'Sekundär',
                                                            ])
                                                            ->required() // Optional, falls eine Auswahl erforderlich ist
                                                            ->columnSpan(2), // Verteilt die Breite gleichmäßig innerhalb von 8 Spalten
                                                    ]),
                                                ])
                                                ->columns(12),
                                            //-------------------------------------
                                            Forms\Components\Builder\Block::make('wcag-check-form')
                                                ->schema([
                                                    // Erste Zeile: Dropdown für Erscheinungsbild
                                                   /* Forms\Components\Grid::make(12)->schema([
                                                        Forms\Components\Select::make('background')
                                                            ->label('Erscheinungsbild')
                                                            ->options([
                                                                'bg-primary' => 'Primärfarbe',
                                                                'bg-secondary' => 'Sekundärfarbe',
                                                                'bg-gradient-blue' => 'Blauer Verlauf',
                                                                'bg-gradient-primary' => 'Primärer Verlauf',
                                                            ])
                                                            ->required()
                                                            ->columnSpan(3),
                                                    ]),*/

                                                    // Zweite Zeile: Überschrift
                                                    Forms\Components\Grid::make(12)->schema([
                                                        Forms\Components\Textarea::make('heading')
                                                            ->label('Überschrift')
                                                            ->required()
                                                            ->columnSpan(8),
                                                    ]),

                                                    // Dritte Zeile: Subtext
                                                    Forms\Components\Grid::make(12)->schema([
                                                        Forms\Components\TextInput::make('subtext')
                                                            ->label('Subtext')
                                                            ->columnSpan(8),
                                                    ]),

                                                    // Vierte Zeile: Text nach Result
                                                    Forms\Components\Grid::make(12)->schema([
                                                        TinyEditor::make('resulttext')->profile('custom')->toolbarSticky(true)
                                                            ->label('Text nach Ergebniss')
                                                            ->required()
                                                            ->columnSpan(8),
                                                    ]),

                                                    // CTA-Sektion
                                                    Forms\Components\Section::make('CTA-Einstellungen')
                                                        ->schema([
                                                            // Checkbox für CTA anzeigen (eigene Zeile)
                                                            Forms\Components\Grid::make(12)->schema([
                                                                Forms\Components\Checkbox::make('showCta')
                                                                    ->label('CTA nach Prüfung anzeigen')
                                                                    ->reactive() // Sichtbarkeit der Felder steuern
                                                                    ->columnSpan(6),
                                                            ]),

                                                            // CTA-Felder untereinander (jede Überschrift in einer Zeile)
                                                            Forms\Components\Grid::make(12)->schema([
                                                                Forms\Components\TextInput::make('ctaHeadingSmall')
                                                                    ->label('CTA Heading Small')
                                                                    ->visible(fn ($get) => $get('showCta'))
                                                                    ->columnSpan(3),
                                                                Forms\Components\TextInput::make('ctaHeading')
                                                                    ->label('CTA Heading')
                                                                    ->visible(fn ($get) => $get('showCta'))
                                                                    ->columnSpan(6),
                                                            ]),

                                                            Forms\Components\Grid::make(12)->schema([
                                                                Forms\Components\Textarea::make('ctaText')
                                                                    ->label('CTA Text')
                                                                    ->visible(fn ($get) => $get('showCta'))
                                                                    ->columnSpan(6),
                                                            ]),



                                                            // CTA Button-Felder in einer Zeile
                                                            Forms\Components\Grid::make(6)->schema([
                                                                Forms\Components\TextInput::make('ctaButtonText')
                                                                    ->label('CTA Button Text')
                                                                    ->visible(fn ($get) => $get('showCta'))
                                                                    ->columnSpan(2), // Button-Text: 1/3 der Zeile

                                                                Forms\Components\TextInput::make('ctaButtonTarget')
                                                                    ->label('CTA Button Target')
                                                                    ->visible(fn ($get) => $get('showCta'))
                                                                    ->columnSpan(2), // Button-Target: 1/3 der Zeile

                                                                Forms\Components\Select::make('ctaButtonAppearance')
                                                                    ->label('Button Erscheinungsbild')
                                                                    ->options([
                                                                        'btn-light' => 'Hell',
                                                                        'btn-dark' => 'Dunkel',
                                                                        'btn-primary' => 'Primär',
                                                                        'btn-secondary' => 'Sekundär',
                                                                    ])
                                                                    ->visible(fn ($get) => $get('showCta'))
                                                                    ->required()
                                                                    ->columnSpan(1), // Erscheinungsbild: 1/3 der Zeile
                                                            ]),
                                                        ])
                                                        ->collapsible(), // Sektion kann ein- und ausgeklappt werden
                                                ])
                                                ->columns(12),


                                        ])
                                        ->reorderableWithButtons()
                                        ->collapsible()
                                        ->cloneable()
                                        ->addActionLabel('Add a new block')
                                    ,
                                ]), // END BlOCK


                                // END TABCONTENT
                            ]),
                        Tabs\Tab::make('SEO')
                            ->schema([

                                Fieldset::make('Meta Information')->schema([
                                    Textarea::make('meta.description')->columnSpan(2)
                                        ->label('Meta Description'),
                                    Textarea::make('meta.keywords')->columnSpan(2)
                                        ->label('Meta Keywords'),
                                ])->columns(2),
                                Fieldset::make('Opengraph')->schema([
                                    Textarea::make('meta_og.description')
                                        ->columnSpan(2)
                                        ->label('og:description'),
                                    Select::make('meta_og.type')
                                        ->label('OG Type')
                                        ->options([
                                            'website' => 'Website',
                                            'article' => 'Article',
                                            'profile' => 'Profile',
                                        ])
                                        ->default('website'),

                                    FileUpload::make('meta_og.image')
                                        ->label('OG Image')
                                        ->image()
                                        ->disk('public') // oder einen anderen Disk, je nachdem, wo Sie die Bilder speichern möchten
                                        ->directory('meta_images') // Das Verzeichnis im gewählten Disk, in dem die Bilder gespeichert werden
                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif']),


                                ])->columns(2),
                                Fieldset::make('Twitter X')->schema([

                                    Textarea::make('meta_twitter.description')
                                        ->label('twitter:description')
                                        ->columnSpan(2),
                                    Select::make('meta_twitter.card')
                                        ->label('Twitter Card Type')
                                        ->options([
                                            'summary' => 'Summary',
                                            'summary_large_image' => 'Summary with Large Image',
                                            'app' => 'App',
                                            'player' => 'Player',
                                        ])
                                        ->default('summary'),

                                    FileUpload::make('meta_twitter.image')
                                        ->label('Twitter Image')
                                        ->image()
                                        ->disk('public') // oder einen anderen Disk, je nachdem, wo Sie die Bilder speichern möchten
                                        ->directory('meta_images') // Das Verzeichnis im gewählten Disk, in dem die Bilder gespeichert werden
                                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif'])


                                ])->columns(2),
                            ]),
                        Tabs\Tab::make('Settings')
                            ->schema([
                                // Hier können weitere Einstellungsfelder hinzugefügt werden
                            ]),
                    ])->columns(2),

                ]),

            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('published'),
                SpatieTagsColumn::make('tags'),
            ])
            ->filters([
                Filter::make('is_published')
                    ->query(fn(Builder $query): Builder => $query->where('published', true)),

                /**
                 * @NOTE
                 * This got a bit complicated
                 * since the Filter would show the object
                 * { en: "Foo" } and not just "Foo"
                 */
                SelectFilter::make('tags')
                    /** @phpstan-ignore-next-line */
                    ->options(\App\Models\Tag::all()
                        ->pluck('name', 'id')
                        ->unique())
                    ->query(function (Builder $query, array $data): Builder {
                        $tag = (int)data_get($data, 'value');

                        return $query->when($tag, function ($query) use ($tag) {
                            $query->whereHas('tags', function ($query) use ($tag) {
                                $query->where('tags.id', '=', $tag);
                            });
                        });
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                CopyAction::make('copy')
                    ->color('gray'),


            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Admin\PageResource\Pages\ListPages::route('/'),
            'create' => Admin\PageResource\Pages\CreatePage::route('/create'),
            'edit' => Admin\PageResource\Pages\EditPage::route('/{record}/edit'),
        ];
    }

    protected static function getActions(): array
    {
        return [
            // Andere Aktionen...

            Action::make('customAction')
                ->label('Mein Button')
                ->url(route('custom.route')) // URL oder Route, zu der navigiert wird
                ->icon('heroicon-o-document-add') // Optional: Icon
                ->color('success'), // Optional: Farbe des Buttons
        ];
    }
}
