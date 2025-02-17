<div>
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif
    @if (!$editMode)
        <div class="flex justify-between items-center mb-4">
            <x-input-label for="search" value="{{ __('Search') }}" />
            <x-text-input wire:model.change="search" id="search" type="text" class="w-1/3" placeholder="Search contacts..." />
        </div>
        @endif




    <!-- Edit Contact Form -->
    @if ($editMode)
        <form wire:submit.prevent="update">
            <div class="mb-4">
                <x-input-label for="name" value="{{ __('First Name') }}" />
                <x-text-input wire:model="name" id="name" type="text" />
                <x-input-error :messages="$errors->get('name')" />
            </div>

            <div class="mb-4">
                <x-input-label for="last_name" value="{{ __('Last Name') }}" />
                <x-text-input wire:model="last_name" id="last_name" type="text" />
                <x-input-error :messages="$errors->get('last_name')" />
            </div>

            <div class="mb-4">
                <x-input-label for="phone" value="{{ __('Phone') }}" />
                <x-text-input wire:model="phone" id="phone" type="text" />
                <x-input-error :messages="$errors->get('phone')" />
            </div>

            <x-primary-button class="mt-4">
                {{ __('Update Contact') }}
            </x-primary-button>

            <x-secondary-button wire:click="$set('editMode', false)" class="mt-4">
                {{ __('Cancel') }}
            </x-secondary-button>
        </form>
    @else
        <!-- Contact List Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 border">#</th>
                    <th class="py-2 px-4 border">First Name</th>
                    <th class="py-2 px-4 border">Last Name</th>
                    <th class="py-2 px-4 border">Phone</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($contacts as $contact)
                    <tr class="border-b">
                        <td class="py-2 px-4 border">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border">{{ $contact->name }}</td>
                        <td class="py-2 px-4 border">{{ $contact->last_name }}</td>
                        <td class="py-2 px-4 border">{{ $contact->phone }}</td>
                        <td class="py-2 px-4 border">
                            <x-primary-button wire:click="edit({{ $contact->id }})">
                                Edit
                            </x-primary-button>

                            <x-danger-button wire:click="delete({{ $contact->id }})" onclick="return confirm('Are you sure?')">
                                Delete
                            </x-danger-button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No contacts found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $contacts->links() }}
        </div>
    @endif
</div>
