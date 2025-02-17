

<form wire:submit.prevent="store">
    <div>
        <x-input-label for="name" value="{{ __('First Name') }}" />
        <x-text-input wire:model="name" id="name" type="text" />
        <x-input-error :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="last_name" value="{{ __('Last Name') }}" />
        <x-text-input wire:model="last_name" id="last_name" type="text" />
        <x-input-error :messages="$errors->get('last_name')" />
    </div>

    <div>
        <x-input-label for="phone" value="{{ __('Phone') }}" />
        <x-text-input wire:model="phone" id="phone" type="text" />
        <x-input-error :messages="$errors->get('phone')" />
    </div>

    <x-primary-button class="mt-4">
        {{ __('Save Contact') }}
    </x-primary-button>
</form>
