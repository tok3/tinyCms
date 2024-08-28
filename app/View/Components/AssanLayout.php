<?php
namespace App\View\Components;

use Illuminate\View\Component;

class AssanLayout extends Component
{
    public $layoutType;

    public function __construct($layoutType = 'assan-welcome')
    {
        $this->layoutType = $layoutType;
    }

    public function render()
    {

        // load-Layout
        return view('layouts.theme.'.$this->layoutType);
    }
}
