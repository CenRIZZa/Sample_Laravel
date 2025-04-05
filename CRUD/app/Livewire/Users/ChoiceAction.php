<?php

namespace App\Livewire\Users;

use Livewire\Component;

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
            $this->processRFID();
        }
    }
    
    public function processRFID()
    {
        // Here you would implement your RFID processing logic
        // For example:
        // 1. Check if RFID exists in database
        // 2. Process borrowing request
        // 3. Redirect to success or error page
        
        // For now, let's just simulate a processing delay
        $this->processingMessage = 'Validating RFID...';
        
        // In a real application, you'd want to do this processing in the background
        // and then update the UI when complete
    }

    public function render()
    {
        return view('livewire.users.choice-action');
    }
}