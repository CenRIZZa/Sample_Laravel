<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ItemHistory;

class ViewTransac extends Component
{
    public $itemHistories;

    public function render()
    {
        $this->itemHistories = ItemHistory::all();
        return view('livewire.view-transac');
    }
}