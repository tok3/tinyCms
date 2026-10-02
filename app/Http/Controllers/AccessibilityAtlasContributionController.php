<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccessibilityAtlasContributionRequest;
use App\Mail\AccessibilityAtlasContributionMail;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

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
        $validated = $request->validated();

        if ($request->filled('website')) {
            return redirect()
                ->route('accessibility-atlas.contribute')
                ->with('accessibility_atlas_sent', true);
        }

        $contribution = array_merge($validated, [
            'submitted_at' => now(),
        ]);

        try {
            Mail::to(config('mail.accessibility_atlas_recipient'))
                ->send(new AccessibilityAtlasContributionMail($contribution));
        } catch (Throwable $exception) {
            Log::error('Accessibility atlas contribution delivery failed', [
                'exception' => $exception,
            ]);

            return redirect()
                ->route('accessibility-atlas.contribute')
                ->withInput(Arr::except($validated, ['website']))
                ->with(
                    'accessibility_atlas_error',
                    'Dein Beitrag konnte gerade nicht gesendet werden. Bitte versuche es später noch einmal oder schreibe uns direkt an info@aktion-barrierefrei.org.'
                );
        }

        return redirect()
            ->route('accessibility-atlas.contribute')
            ->with('accessibility_atlas_sent', true);
    }
}
