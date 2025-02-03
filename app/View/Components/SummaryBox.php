<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SummaryBox extends Component
{
    public object $accessibilityRule;

    /**
     * Create a new component instance.
     *
     * @param object $accessibilityRule
     */
    public function __construct(object $accessibilityRule)
    {
        $this->accessibilityRule = $accessibilityRule;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.summary-data', [
            'accessibilityRule' => $this->accessibilityRule,
        ]);
    }
}
