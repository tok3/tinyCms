<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessibilityAtlasContributionRequest;
use App\Mail\AccessibilityAtlasContributionMail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

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

    public function store(AccessibilityAtlasContributionRequest $request): RedirectResponse
    {
        $contribution = array_merge($request->validated(), [
            'submitted_at' => now(),
        ]);

        Mail::to(config('mail.accessibility_atlas_recipient'))
            ->send(new AccessibilityAtlasContributionMail($contribution));

        return redirect()
            ->route('accessibility-atlas.contribute')
            ->with('accessibility_atlas_sent', true);
    }
}
