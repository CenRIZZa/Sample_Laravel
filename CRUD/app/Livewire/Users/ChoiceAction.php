<?php

namespace App\Livewire\Users;

use Livewire\Component;
use App\Models\User;


class ChoiceAction extends Component
{
    public $BorrowRFID = '';
    public $BorrowModal = false;
    public $isCapturing = false;
    public $processingMessage = 'Waiting for RFID...';

    public function mount()
    {
        $this->BorrowRFID = '';
    }
    
    public function startCapture()
    {
        $this->BorrowModal = true;
        $this->isCapturing = true;
        $this->BorrowRFID = '';
        $this->processingMessage = 'Please scan your RFID card...';
    }
    
    public function updatedBorrowRFID()
    {
        // Check if we've received 10 characters
        if (strlen($this->BorrowRFID) >= 10) {
            $this->isCapturing = false;
            $this->processingMessage = 'Processing RFID: ' . substr($this->BorrowRFID, 0, 3) . '*******';
            
            // Process the RFID
            $this->processRFID($this->BorrowRFID);
        }
    }
    
      public function processRFID($rfid)
    {
        $this->processingMessage = 'Validating RFID...';
        
        // Find user with matching RFID
        $user = \App\Models\User::where('RFID', $rfid)->first();
        
        if ($user) {
            $this->processingMessage = 'RFID validated successfully!';
            return redirect()->route('borrow', ['userId' => $user->id]);
        } else {
            $this->processingMessage = 'Invalid RFID. Please try again.';
            $this->isCapturing = true;
            $this->BorrowRFID = '';
        }
    }

    public function render()
    {
        return view('livewire.users.choice-action');
    }
}