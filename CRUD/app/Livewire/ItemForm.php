<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\items;

class ItemForm extends Component
{
    public string $name = '';
    public string $description = '';
    public int $quantity = 1;
    public bool $is_available = true;

    public function submit(){
        
        try {
            
            $this->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:1000',
                'quantity' => 'required|integer|min:1',
                'is_available' => 'required|boolean',
            ]); 

            items::create([
                'name' => $this->name,
                'description' => $this->description,
                'quantity' => $this->quantity,
                'is_available' => $this->is_available
            ]);
            
            session()->flash('success', 'Item created successfully!');
            $this->reset();
            return;
            
            
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() === '23000') {
                $this->addError('error', 'This item already exists.');
                return;
            }
            $this->addError('error', 'Error saving to database. Please try again.');
            
        } catch (\Exception $e) {
            $this->addError('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }



    public function render(items $items)
    {
        $items = items::all();
        return view('view');
    }
}
