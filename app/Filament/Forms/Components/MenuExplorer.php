<?php
namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Component;

class MenuExplorer extends Component
{
    protected string $view = 'filament.menu-explorer';

    public $modelId = null;

   /* protected function setUp(): void
    {
        parent::setUp();

        $this->registerListeners([
            'save' => [

            ],
        ]);
    }*/
    public static function make($id): static
    {

        $component = app(static::class);

        $component->modelId = $id; // Ändere dies zu modelId, um mit der deklarierten Eigenschaft übereinzustimmen
        return $component;
    }
    public function mount($id): void
    {
        $this->modelId = $id;
    }
    public function render(): \Illuminate\View\View
    {
        // Zugriff auf die ID und Weitergabe an den View
        return view($this->view, [
            'id' => $this->modelId, // Weitergabe der ID an den View
        ]);
    }

}
