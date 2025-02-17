<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use SimpleXMLElement;

class ContactImport extends Component
{
    use WithFileUploads;

    public $xmlFile; // Public property for the uploaded file

    public function importContacts()
    {
        $this->validate([
            'xmlFile' => 'required|mimes:xml|max:10240', // Validate the file (XML only, max 10MB)
        ]);

        $duplicates = []; // To hold duplicate contacts
        $fileContent = file_get_contents($this->xmlFile->getRealPath());

        // Parse the XML
        $xml = new SimpleXMLElement($fileContent);
        foreach ($xml->contact as $contactData) {
            $existingContact = Contact::where('phone', (string) $contactData->phone)->first();

            if ($existingContact) {
                // If contact exists (duplicate), store the duplicate
                $duplicates[] = [
                    'user_id' => Auth::id(),
                    'name' => (string) $contactData->name,
                    'last_name' => (string) $contactData->lastName,
                    'phone' => (string) $contactData->phone,
                ];
            } else {
                // If no duplicate, save the contact
                Contact::create([
                    'user_id' => Auth::id(),
                    'name' => (string) $contactData->name,
                    'last_name' => (string) $contactData->lastName,
                    'phone' => (string) $contactData->phone,
                ]);
            }
        }

        // If duplicates were found, send them to the view
        if (count($duplicates) > 0) {
            session()->flash('duplicate_message', 'Some contacts were duplicates and were not added.');
            session()->flash('duplicates', $duplicates);
        } else {
            session()->flash('message', 'Contacts imported successfully.');
        }
    }

    public function render()
    {
        return view('livewire.contact-import');
    }
}
