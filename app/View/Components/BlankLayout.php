<?php
namespace App\View\Components;

use Illuminate\View\Component;

class BlankLayout extends Component
{


    public function render()
    {

        // load-Layout
        return view('layouts.blank');
    }
}
