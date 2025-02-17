<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ContactManager extends Component
{
    use WithFileUploads;

    public function render()
    {
        // Return the view with a specific layout
        return view('livewire.contact-manager')->layout('layouts.app'); // Replace 'layouts.app' with your desired layout
    }
}
