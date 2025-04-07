<?php

namespace App\Livewire\Users;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\User;
use App\Models\items;
use App\Models\facList;
class BorrowItem extends Component
{
    public $userId;
    public $user;
    public $items;
    public $faculty;
    public $selectedFaculty = null;
    
    public function mount($userId = null)
    {
        $this->items = items::all();
        $this->faculty = facList::all()->map(function ($faculty) {
            return [
                'id' => $faculty->id,
                'faculty_name' => $faculty->faculty_name,
            ];
        })->toArray(); // Ensure proper key-value structure

        $this->userId = $userId;
        
        if ($this->userId) {
            $this->user = User::find($this->userId);
        }
    }
    
    public function render()
    {
        return view('livewire.users.borrow-item');
    }

    public function saveBorrow(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            'is_available' => 'required|boolean',

        ]);

        $newItem  = items::create($data);
    }
}