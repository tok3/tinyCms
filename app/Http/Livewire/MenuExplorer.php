<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MenuItem;

class MenuExplorer extends Component
{
    public $id;
    public $menuItems;

    protected $listeners = [
        "menuitem-updated" => '$refresh',
    ];
    public function mount($id = null)
    {
        $this->id = $id;
        $this->menuItems = MenuItem::whereNull('parent_id')->with('children')->orderBy('order')->get();
    }


    public function moveUp($itemId)
    {
        $currentItem = MenuItem::find($itemId);
        // Sicherstellen, dass $currentItem gefunden wurde und existiert
        if (!$currentItem) {
            // Fehlerbehandlung oder Benachrichtigung
            return;
        }

        $this->reorderItems($currentItem->parent_id);

        $previousItem = MenuItem::select(['order','id'])->where('parent_id', $currentItem->parent_id)
            ->where('order', '<', $currentItem->order)
            ->orderBy('order', 'desc')
            ->first();

        if ($previousItem) {
            $tempOrder = $currentItem->order;
            $currentItem->order = $previousItem->order;
            $previousItem->order = $tempOrder;

            unset($previousItem->name);
            unset($currentItem->name);

            $currentItem->save();
            $previousItem->save();

        }
        $this->refreshComponent();

    }

    public function moveDown($itemId)
    {
        $currentItem = MenuItem::find($itemId);
        // Sicherstellen, dass $currentItem gefunden wurde und existiert
        if (!$currentItem) {
            // Fehlerbehandlung oder Benachrichtigung
            return;
        }

        $this->reorderItems($currentItem->parent_id);

        $nextItem = MenuItem::where('parent_id', $currentItem->parent_id)
            ->where('order', '>', $currentItem->order)
            ->orderBy('order', 'asc')
            ->first();

        if ($nextItem) {
            $tempOrder = $currentItem->order;
            $currentItem->order = $nextItem->order;
            $nextItem->order = $tempOrder;

            unset($nextItem->name);
            unset($currentItem->name);

            $currentItem->save();
            $nextItem->save();

        }
        $this->refreshComponent();

    }

    public function reorderItems($parentId)
    {
        $items = MenuItem::where('parent_id', $parentId)->orderBy('order')->get();
        $order = 0;
        foreach ($items as $item) {
            $item->order = $order++;
            $item->save();
        }
    }


    public function canMoveUp($itemId)
    {
        $currentItem = MenuItem::find($itemId);
        if (!$currentItem) {
            return false;
        }

        return MenuItem::where('parent_id', $currentItem->parent_id)
            ->where('order', '<', $currentItem->order)
            ->exists();
    }

    public function canMoveDown($itemId)
    {
        $currentItem = MenuItem::find($itemId);
        if (!$currentItem) {
            return false;
        }

        return MenuItem::where('parent_id', $currentItem->parent_id)
            ->where('order', '>', $currentItem->order)
            ->exists();
    }

    public function refreshComponent()
    {
        $this->menuItems = MenuItem::whereNull('parent_id')->with('children')->orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.menu-explorer', [
            'menuItems' => $this->menuItems,
        ]);
    }
}
