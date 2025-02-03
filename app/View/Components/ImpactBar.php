<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ImpactBar extends Component
{
    public string $impact;

    /**
     * Create a new component instance.
     *
     * @param string $impact
     */
    public function __construct(string $impact)
    {
        $this->impact = $impact;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.impact-bar', [
            'impact' => $this->impact,
        ]);
    }
}
