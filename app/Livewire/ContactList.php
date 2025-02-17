<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ContactList extends Component
{
    use WithPagination;

    public $search = '';

    public $editMode = false;

    public $contactId;

    public $name;

    public $last_name;

    public $phone;

    protected function rules()
    {
        return [
            'name' => 'required|string|unique:contacts,name,'.$this->contactId.',id,last_name,'.$this->last_name,
            'last_name' => 'required|string',
            'phone' => 'required|string|unique:contacts,phone,'.$this->contactId,
        ];
    }

    protected $listeners = ['contactAdded' => 'refreshContacts'];

    public function updatingSearch()
    {

        $this->resetPage();
    }

    public function refreshContacts()
    {
        // Just re-render the component to get the latest data
        $this->resetPage();
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $this->contactId = $contact->id;
        $this->name = $contact->name;
        $this->last_name = $contact->last_name;
        $this->phone = $contact->phone;
        $this->editMode = true;
    }

    public function update()
    {
        $this->validate();

        Contact::where('id', $this->contactId)->update([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
        ]);

        session()->flash('message', 'Contact updated successfully.');

        $this->reset(['editMode', 'contactId', 'name', 'last_name', 'phone']);
    }

    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        $this->resetPage();
        session()->flash('message', 'Contact deleted successfully.');
    }

    public function render()
    {
        $contacts = Contact::where('user_id', Auth::id())
            ->where(function ($query) {
                $query->where('name', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%")
                    ->orWhere('phone', 'like', "%{$this->search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('livewire.contact-list', compact('contacts'));
    }
}
