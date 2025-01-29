<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DisabilitiesList extends Component
{
    /**
     * The disabilities array.
     */
    public $disabilities;

    /**
     * Create a new component instance.
     *
     * @param mixed $disabilities
     */
    public function __construct($disabilities = [])
    {
        // Stelle sicher, dass $disabilities ein Array ist
        $this->disabilities = is_array($disabilities) ? $disabilities : json_decode($disabilities, true);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.disabilities-list', [
            'disabilities' => $this->disabilities,
        ]);
    }
}
