<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class AccessibilityAtlasContributionController extends Controller
{
    public function create(): View
    {
        $pageMeta = json_encode([
            'title' => 'Beitrag zum Barrierefreiheitsatlas | Aktion Barrierefrei',
            'meta' => [
                'description' => 'Eine digitale Barriere melden und zur Arbeit am Barrierefreiheitsatlas im Web beitragen.',
            ],
            'meta_og' => [
                'description' => 'Hilf uns, digitale Barrieren sichtbar zu machen.',
            ],
            'meta_twitter' => [
                'description' => 'Hilf uns, digitale Barrieren sichtbar zu machen.',
            ],
        ], JSON_THROW_ON_ERROR);

        return view('accessibility-atlas.contribute', compact('pageMeta'));
    }
}
