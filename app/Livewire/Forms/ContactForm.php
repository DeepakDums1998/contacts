<?php

namespace App\Livewire\Forms;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContactForm extends Component
{
    public $name;

    public $last_name;

    public $phone;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:contacts,name,NULL,id,last_name,'.$this->last_name,
            'last_name' => 'required|string',
            'phone' => 'required|string|unique:contacts,phone',
        ];
    }

    public function store()
    {
        $this->validate();

        Contact::create([
            'user_id' => Auth::user()->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
        ]);

        // Emit event to refresh contact list
        $this->dispatch('contactAdded');

        session()->flash('message', 'Contact added successfully.');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.forms.contact-form');
    }
}
