<?php

namespace App\Filament\Resources\Shared;

use App\Filament\Resources\Shared\ImagetagResource\Pages;
use App\Filament\Resources\Shared\ImagetagResource\RelationManagers;
use App\Models\Imagetag;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Company;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Http;
use Filament\Forms\Components\Placeholder;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;


class ImagetagResource extends Resource
{


    protected static ?string $model = Imagetag::class;
    protected static ?string $recordTitleAttribute = 'description';
    protected static ?string $label = 'Image alt-tags'; // Singular name
    protected static ?string $pluralModelLabel = 'Image alt-tags'; // Plural name


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function shouldRegisterNavigation(): bool
    {

        if (auth()->user()->is_admin == 1)
        {
            return true;

        }
        $tenant = Filament::getTenant();
        /*$featureIds = DB::table('contracts')
                ->join('product_feature', 'contracts.product_id', '=', 'product_feature.product_id')
                ->where('contracts.contractable_id', $tenant->id)
                ->where('contracts.deleted_at', null)
                ->pluck('product_feature.feature_id')
                ->unique()
                ->values()
                ->toArray();
        */
        /*
        $featureIds = DB::table('company_feature')
            ->where('company_id', $tenant->id)
            ->where('deleted_at', null)
            ->pluck('company_feature.feature_id')
            ->unique()
            ->values()
            ->toArray();
        if(in_array(4, $featureIds)){
            return true;
        }
        return false;
        */
        $company = Company::where('id', $tenant->id)->first();

        if($company->hasFeature('image-alt-tags')){
            return true;
        }
        return false;


    }

    public static function canCreate(): bool
    {
        return false;
    }
    public static function form_wotitletags(Form $form): Form
    {
        $hasTitleTagFeature = false;
        if(auth()->user()->is_admin == 1){
            $hasTitleTagFeature = true;
        } else {
            $tenant = Filament::getTenant();
            $company = Company::where('id', $tenant->id)->first();
            $hasTitleTagFeature = ($company && $company->hasFeature('titletags') || auth()->user()->is_admin == 1);
        }

        return $form
            ->schema([
               /* Forms\Components\TextInput::make('ulid')
                    ->required()
                    ->maxLength(26),
                */
                Grid::make()
                    ->columns(12)
                    ->schema([
                        Placeholder::make('company_info')
                            ->label('Firma')
                            ->content(fn ($record) => new HtmlString(
                                '<div class="space-y-1 pb-2">
            <span class="block text-lg font-bold"> '.$record->company?->name .'</span>'))
                            ->columnSpan(3),
                    ]),

            Grid::make()
                ->columns(6)
                ->extraAttributes(['class' => 'py-4'])
                ->schema([
                    Forms\Components\TextInput::make('url')
                        ->label('Image')
                        ->view('filament.tables.columns.image-column-form')
                        ->columnSpan(2),
                    Grid::make()
                        ->columns(1) // Single column to stack fields vertically
                        ->schema([
                            Forms\Components\Textarea::make('description')
                                ->label('Bildbeschreibung (alt-tag)')
                                ->required()
                                ->default(null),
                            // Conditionally add titletag field
                            ...($hasTitleTagFeature ? [
                                Forms\Components\Textarea::make('titletag')
                                    ->label('Title Tag')
                                    ->default(null),
                            ] : []),
                        ])
                        ->columnSpan(3),
                ]),


                Placeholder::make('url_display')
                    ->label('Image-URL')
                    ->content(fn (callable $get) => $get('url') ?? '–')
                    ->columnSpan(3),

                /*
                Forms\Components\TextInput::make('hash')
                    ->maxLength(255)
                    ->default(null),
                */


            ]);
    }


    public static function form(Form $form): Form
{
    $isAdmin = auth()->user()->is_admin == 1;
    $record = $form->getRecord(); // Get the current record
    $companyForRecord = $record ? Company::where('id', $record->ulid)->first() : null;
    //\Log::info($record);
    $hasTitleTagFeature = false; // Default for non-admin or when tenant is unavailable
    $recordCompanyHasTitleTags = $companyForRecord && $companyForRecord->hasFeature('titletags');

    // For non-admin users, check the tenant's company for the titletags feature
    if (!$isAdmin) {
        $tenant = Filament::getTenant();
        if ($tenant) {
            $company = Company::where('id', $tenant->id)->first();
            $hasTitleTagFeature = $company && $company->hasFeature('titletags');
        }
    }

    return $form
        ->schema([
            Grid::make()
                ->columns(12)
                ->schema([
                    Placeholder::make('company_info')
                        ->label('Firma')
                        ->content(fn ($record) => new HtmlString(
                            '<div class="space-y-1 pb-2">
                                <span class="block text-lg font-bold"> ' . ($record->company?->name ?? '') . '</span>'
                        ))
                        ->columnSpan(3),
                ]),

            Grid::make()
                ->columns(6)
                ->extraAttributes(['class' => 'py-4'])
                ->schema([
                    Forms\Components\TextInput::make('url')
                        ->label('Image')
                        ->view('filament.tables.columns.image-column-form')
                        ->columnSpan(2),
                    Grid::make()
                        ->columns(1) // Single column to stack fields vertically
                        ->schema([
                            Forms\Components\Textarea::make('description')
                                ->label('Bildbeschreibung (alt-tag)')
                                ->required()
                                ->default(null),
                            // Conditionally add titletag field for admin or tenant with titletags feature
                            ...($isAdmin || $hasTitleTagFeature ? [
                                Forms\Components\Textarea::make('titletag')
                                    ->label('Title Tag')
                                    ->default(null)
                                    ->disabled($isAdmin && !$recordCompanyHasTitleTags) // Disable if admin and company lacks feature
                                    ->placeholder($isAdmin && !$recordCompanyHasTitleTags
                                        ? "Feature 'titletags' is not active for this company"
                                        : null)
                                    ->dehydrated($isAdmin && !$recordCompanyHasTitleTags ? false : true), // Prevent saving if disabled
                            ] : []),
                        ])
                        ->columnSpan(3),
                ]),

            Placeholder::make('url_display')
                ->label('Image-URL')
                ->content(fn (callable $get) => $get('url') ?? '–')
                ->columnSpan(3),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //Tables\Columns\TextColumn::make('ulid')
                //    ->searchable(),
                /*Tables\Columns\ImageColumn::make('url')
                    ->label('Image')
                    ->extraAttributes(['class' => 'w-24 h-24'])
                    ->searchable(),
                */
                Tables\Columns\TextColumn::make('company.name')
                    ->label('Firma')
                    ->visible(fn () => auth()->user()?->isAdmin())
                    ->sortable()
                    ->searchable(),

//                Tables\Columns\TextColumn::make('url')
//                    ->label('Image')
//                    ->view('filament.tables.columns.image-column'),

                ViewColumn::make('image_info')
                    ->label('Bild')
                    ->view('filament.tables.columns.image-with-info')
                    ->getStateUsing(fn ($record) => [
                        'url'    => $record->url,
                        'alt'  => $record->description,
                        'width'  => $record->image_width,
                        'height' => $record->image_height,
                        'size'   => $record->image_size, // z.B. in KB, bereits in DB gespeichert
                    ])
                    ->extraAttributes([
                        'class' => 'flex items-center', // optional, wenn du mehr als nur das Bild rendern willst
                    ]),

                //Tables\Columns\TextColumn::make('hash')
                //    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Beschreibung')
                    ->wrap()
                    ->searchable(),

                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
           /* ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])*/
            ->bulkActions([])
            ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }


    /*
        // Customize global search to include multiple columns
    public static function getGlobalSearchResults(string $search): Collection
    {
        \Log::info("search");
        $query = static::getModel()::query();

        // Split search query into individual terms for more flexible matching
        $searchTerms = collect(explode(' ', $search))->filter()->map(fn($term) => trim($term));

        // Build the query to search 'url' and 'description' columns
        $query->where(function (Builder $query) use ($searchTerms) {
            foreach ($searchTerms as $term) {
                $query->orWhere('url', 'like', "%{$term}%")
                      ->orWhere('description', 'like', "%{$term}%");
            }
        });

        // Execute the query and return a Collection
        return $query->limit(50)->get(); // Limit to 50 results for performance
    }
        */
    public static function getGloballySearchableAttributes(): array
    {
        return ['description', 'url', 'titletag',];
    }

    public static function getGlobalSearchResultTitle(Model $record): string | Htmlable
{
    //return static::getRecordTitle($record);
    return substr($record->description, 0, 35)."... (".$record->url.")";
}

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImagetags::route('/'),
            //'create' => Pages\CreateImagetag::route('/create'),
            'view' => Pages\ViewImagetag::route('/{record}'),
            'edit' => Pages\EditImagetag::route('/{record}/edit'),
        ];
    }
}
