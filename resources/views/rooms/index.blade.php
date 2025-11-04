<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rooms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900">All Rooms</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        This is where you can manage your rooms.
                    </p>
                    <div class="mt-6">
                        <a href="{{ route('rooms.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Add New Room
                        </a>
                    </div>
                    <div class="mt-6 border-t border-gray-200 pt-6">
                        <!-- Room list will go here -->
                        <p>No rooms found.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>