<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\items;
use Illuminate\Support\Facades\Request;
use Livewire\Attributes\On;

class ItemView extends Component
{
    public $items;
    public $message;

    #[On('items-created')]
    public function reload(){
        $this->items = items::all();
    }

    public function mount()
    {
        $this->items = items::all();
        
        if (Request::get('success') === 'true') {
            $this->message = 'Item created successfully! The list has been updated.';
        }
    }

    
    public function refreshItems()
    {
        $this->message = 'Item list updated successfully';
        $this->items = items::all();
    }

    public function render()
    {
        
        $this->items = items::all();
        
        return view('livewire.item-view', [
            'items' => $this->items,
            'message' => $this->message
        ]);
    }


    public function delete($id){
        items::find($id)->delete();
        
        return redirect()->route('crud.index')->with('success', 'Item deleted successfully.');

    }
}
