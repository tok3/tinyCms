<?php
namespace App\Filament\Resources\User;

use App\Filament\Resources\User\PromoContentResource\Pages;
use App\Models\Company;
use App\Models\PromoContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Notifications\Notification;
use App\Helpers\FontHelper;

class PromoContentResource extends Resource
{
    protected static ?string $model = PromoContent::class;
    protected static ?string $navigationIcon = 'heroicon-o-viewfinder-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code_id')
                    ->required()
                    ->label('Code ID'),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->label('Type')
                    ->disabled(),
                Forms\Components\Section::make('Content')
                    ->schema(fn ($get) => static::getContentFields($get('type')))
                    ->columns(2),
                // Inject the modal component into the form
                Forms\Components\View::make('components.subscription-required-modal')
            ]);
    }

    private static function getContentFields(string $type): array
    {
        $fields = [];

        // Define the destination folder based on the class name
        $dest = __DIR__ . '/' . basename(__FILE__, ".php");

        // Load type-specific fields
        switch ($type) {
            case 'nl.subscribe.pc_landscape':
                $fields = require $dest . '/nl_subscribe_pc_landscape.php';
                break;
            case 'nl.subscribe.portrait_bw':
                $fields = require $dest . '/nl_subscribe_portrait_bw.php';
                break;
            case 'nl.subscribe.pdf':
                $fields = require $dest . '/nl_subscribe_pdf.php';
                break;
            default:
                throw new \Exception("Unknown type: $type");
        }

        // Add the preview field to the right side
        $fields[] = Forms\Components\Group::make([
            Forms\Components\Placeholder::make('preview')
                ->label('Preview')
                ->content(fn($get) => view('filament.resources.promo-content-preview', [
                    'type' => $get('type'),
                    'code_id' => $get('code_id'),
                    'company' => Company::where('id', $get('company_id'))->first(),
                    'image_path' => $get('data.image_path') ?? '',
                ])),
        ])->columnSpan(1);

        return $fields;
    }

    public static function table(Table $table): Table
    {
        $columns = [
            Tables\Columns\TextColumn::make('code_id')->label('Code ID'),
            Tables\Columns\TextColumn::make('type')->label('Type'),
        ];

        if (auth()->user()->is_admin == 1) {
            array_unshift($columns, Tables\Columns\TextColumn::make('company.name')->label('Firmenname'));
        }

        $table->columns($columns)
            ->filters([
                // Filter hier
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make(),
                ]),
            ]);

        return $table;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPromoContents::route('/'),
            'create' => Pages\CreatePromoContent::route('/create'),
            'edit' => Pages\EditPromoContent::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->is_admin == 1;
    }
}
