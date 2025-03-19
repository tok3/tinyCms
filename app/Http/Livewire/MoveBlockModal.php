<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Page;

class MoveBlockModal extends Component
{
    public $blockId;
    public $newPageId;
    public $currentPageId;

    protected $listeners = ['openMoveBlockModal' => 'open'];

    public function open($blockId)
    {
        $this->blockId = $blockId;
        $this->newPageId = null;
        $this->emit('openModal', 'move-block-modal'); // Öffnet das Modal
    }

    public function moveBlock()
    {
        // Aktuelle Seite finden
        $currentPage = Page::find($this->currentPageId);
        $newPage = Page::find($this->newPageId);

        if (!$currentPage || !$newPage) {
            session()->flash('error', 'Seite nicht gefunden.');
            return;
        }

        // Blocks JSON aktualisieren
        $blocks = collect($currentPage->blocks);
        $blockToMove = $blocks->pull($this->blockId);

        if ($blockToMove) {
            $currentPage->blocks = $blocks->values();
            $currentPage->save();

            $newBlocks = collect($newPage->blocks);
            $newBlocks->push($blockToMove);

            $newPage->blocks = $newBlocks->values();
            $newPage->save();

            session()->flash('success', 'Block erfolgreich verschoben!');
            $this->emit('closeModal', 'move-block-modal'); // Schließt das Modal
        }
    }

    public function render()
    {
        return view('livewire.move-block-modal', [
            'pages' => Page::pluck('title', 'id')
        ]);
    }
}
