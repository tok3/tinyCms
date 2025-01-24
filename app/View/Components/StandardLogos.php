<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StandardLogos extends Component
{
    public array $standards;

    public function __construct(array $standards)
    {
        $this->standards = $standards;
    }

    public function render()
    {
        return view('components.standard-logos', [
            'processedStandards' => $this->processStandards(),
        ]);
    }

    private function processStandards(): array
    {

        $logos = [];
        $unmatchedStandards = [];

        $logoMap = [
            'WCAG 2.2 (A)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2A-Conformance',
                'img' => 'https://www.w3.org/WAI/WCAG22/wcag2.2A-blue',
                'alt' => 'Level A conformance, W3C WAI Web Content Accessibility Guidelines 2.2',
            ],
            'WCAG 2.2 (AA)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2AA-Conformance',
                'img' => 'https://www.w3.org/WAI/WCAG22/wcag2.2AA-blue',
                'alt' => 'Level AA conformance, W3C WAI Web Content Accessibility Guidelines 2.2',
            ],
            'WCAG 2.2 (AAA)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2AAA-Conformance',
                'img' => 'https://www.w3.org/WAI/WCAG22/wcag2.2AAA-blue',
                'alt' => 'Level AAA conformance, W3C WAI Web Content Accessibility Guidelines 2.2',
            ],
            'WCAG 2.1 (A)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2A-Conformance',
                'img' => 'https://www.w3.org/WAI/WCAG21/wcag2.1A-blue-v.gif',
                'alt' => 'Level A conformance, W3C WAI Web Content Accessibility Guidelines 2.1',
            ],
            'WCAG 2.1 (AA)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2AA-Conformance',
                'img' => 'https://www.w3.org/WAI/WCAG21/wcag2.1AA-blue-v.gif',
                'alt' => 'Level AA conformance, W3C WAI Web Content Accessibility Guidelines 2.1',
            ],
            'WCAG 2.1 (AAA)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2AAA-Conformance',
                'img' => 'https://www.w3.org/WAI/WCAG21/wcag2.1AAA-blue-v.png',
                'alt' => 'Level AAA conformance, W3C WAI Web Content Accessibility Guidelines 2.1',
            ],
            'WCAG 2.0 (A)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2A-Conformance',
                'img' => 'https://www.w3.org/WAI/wcag2A-blue',
                'alt' => 'Level A conformance, W3C WAI Web Content Accessibility Guidelines 2.0',
            ],
            'WCAG 2.0 (AA)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2AA-Conformance',
                'img' => 'https://www.w3.org/WAI/wcag2AA-blue',
                'alt' => 'Level AA conformance, W3C WAI Web Content Accessibility Guidelines 2.0',
            ],
            'WCAG 2.0 (AAA)' => [
                'link' => 'https://www.w3.org/WAI/WCAG2AAA-Conformance',
                'img' => 'https://www.w3.org/WAI/wcag2AAA-blue',
                'alt' => 'Level AAA conformance, W3C WAI Web Content Accessibility Guidelines 2.0',
            ],
            'Section 508' => [
                'link' => 'https://www.section508.gov/manage/laws-and-policies/',
                'img' => asset('assets/img/logo/section-508.jpg'),
                'alt' => 'Section 508 Guidelines',
            ]
        ];

        foreach ($this->standards as $standard) {
            $trimmedStandard = trim($standard);
            if (isset($logoMap[$trimmedStandard])) {
                $logos[] = $logoMap[$trimmedStandard];
            } else {
                $unmatchedStandards[] = $trimmedStandard;
            }
        }

        return [
            'logos' => $logos,
            'unmatched' => $unmatchedStandards,
        ];
    }
}
