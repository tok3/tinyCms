<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //


    public function index($slug)
    {
        $layout = $slug;

        if ($slug == 'index')
        {
            $layout = 'assan-welcome';

        }




        return view('theme.' . $layout)->with('layoutType', $layout);
    }
}
