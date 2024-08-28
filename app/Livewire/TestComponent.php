<?php

namespace App\Livewire;
//namespace App\Http\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $message = 'Hallo, Filament!';

    public function render()
    {
        return view('livewire.test-component');
    }
}
