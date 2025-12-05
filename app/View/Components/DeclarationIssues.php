<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeclarationIssues extends Component
{
    public ?string $fullText;
    public ?string $partialText;
    public ?string $nonConformText;
    public $issues; // array oder Collection

    public function __construct(
        ?string $fullText = null,
        ?string $partialText = null,
        ?string $nonConformText = null,
               $issues = []
    ) {
        $this->fullText = $fullText;
        $this->partialText = $partialText;
        $this->nonConformText = $nonConformText;
        $this->issues = $issues ?? [];
    }

    public function render()
    {
        return view('components.declaration-issues');
    }
}
