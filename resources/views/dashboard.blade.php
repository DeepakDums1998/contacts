<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Report Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Total Contacts -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-gray-700">Total Contacts</h3>
                    <p class="text-4xl font-bold text-blue-500 mt-2">{{ $totalContacts }}</p>
                </div>

                <!-- New Contacts This Week -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-gray-700">New Contacts (Last 7 Days)</h3>
                    <p class="text-4xl font-bold text-green-500 mt-2">
                        {{ App\Models\Contact::where('created_at', '>=', now()->subWeek())->count() }}
                    </p>
                </div>

                <!-- Recently Added Contact -->
                <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-gray-700">Recent Contact</h3>
                    <p class="text-xl font-semibold text-gray-900 mt-2">
                        {{ optional($recentContacts->first())->name ?? 'No Contacts' }}
                    </p>
                </div>
            </div>

            <!-- Recent Contacts Table -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Contacts</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200">
                        <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="py-3 px-4 border">#</th>
                            <th class="py-3 px-4 border">Name</th>
                            <th class="py-3 px-4 border">Phone</th>
                            <th class="py-3 px-4 border">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($recentContacts as $contact)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="py-3 px-4 border">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 border">{{ $contact->name }}</td>
                                <td class="py-3 px-4 border">{{ $contact->phone }}</td>
                                <td class="py-3 px-4 border">{{ $contact->created_at->format('d M, Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">No recent contacts.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
