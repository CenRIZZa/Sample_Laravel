<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\items;

class ItemView extends Component
{
    public function render(items $items)
    {
        $items = items::all();
        return view('livewire.item-view', [
            'items' => $items
        ]);
    }
}
