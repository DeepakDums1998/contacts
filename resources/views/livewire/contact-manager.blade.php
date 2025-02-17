<x-slot name="header">
    <h2 class="font-semibold text-3xl text-indigo-600 leading-tight">
        {{ __('Manage Contacts') }}
    </h2>
</x-slot>

<div class="py-12 bg-gradient-to-br from-indigo-100 to-blue-200">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 gap-2">
        <div class="flex flex-wrap gap-8 w-full">
            <!-- Left Column: Contact List -->
            <div class="lg:w-1/3 w-full bg-white shadow-lg sm:rounded-lg h-[500px] overflow-y-auto p-4 border border-gray-200 rounded-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Contact List</h3>
                <div class="space-y-4">
                    <livewire:contact-list />
                </div>
            </div>

            <!-- Right Column: Contact Form & Import Section -->
            <div class="lg:w-2/3">
                <!-- Add New Contact Form -->
                <div class="p-4 bg-white shadow-md sm:rounded-lg mb-6 border border-gray-200 rounded-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Add New Contact</h3>
                    </div>
                    <!-- Contact Form Component -->
                    <livewire:forms.contact-form />
                </div>

                <!-- Import Section -->
                <div class="p-4 bg-white shadow-md sm:rounded-lg mb-6 border border-gray-200 rounded-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Import Contacts</h3>
                    </div>
                    <livewire:contact-import />
                </div>
            </div>
        </div>
    </div>
</div>
