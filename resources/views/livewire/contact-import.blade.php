<div class="p-4 bg-white shadow-md rounded">
    <form wire:submit.prevent="importContacts" class="flex flex-col space-y-4">
        <label class="block">
            <span class="text-gray-700">Upload XML File</span>
            <input type="file" wire:model="xmlFile" class="block w-full mt-1 border border-gray-300 rounded-lg p-2" />
        </label>

        @error('xmlFile')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror

        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mt-4">
            Import Contacts
        </button>
    </form>

    @if (session()->has('message'))
        <p class="mt-2 text-green-500">{{ session('message') }}</p>
    @endif

    @if(session()->has('duplicate_message'))
        <div class="mt-4 bg-red-100 text-red-600 p-4 rounded-lg">
            <p class="font-semibold">{{ session('duplicate_message') }}</p>

            <!-- Scrollable duplicates list -->
            <div class="mt-2 max-h-48 overflow-y-auto scrollbar-thin scrollbar-thumb-indigo-400 scrollbar-track-indigo-100 space-y-2">
                <ul>
                    @foreach(session('duplicates') as $duplicate)
                        <li>{{ $duplicate['name'] }} {{ $duplicate['last_name'] }} - {{ $duplicate['phone'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
