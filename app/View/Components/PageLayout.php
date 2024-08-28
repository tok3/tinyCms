<?php
namespace App\View\Components;

use Illuminate\View\Component;

class PageLayout extends Component
{


    public function render()
    {

        // load-Layout
        return view('layouts.page-default');
    }
}
