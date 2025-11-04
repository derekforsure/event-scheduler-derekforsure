<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Room') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('rooms.update', $room) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $room->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Capacity -->
                        <div class="mt-4">
                            <x-input-label for="capacity" :value="__('Capacity')" />
                            <x-text-input id="capacity" class="block mt-1 w-full" type="number" name="capacity" :value="old('capacity', $room->capacity)" required min="1" />
                            <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                        </div>

                        <!-- Open Time -->
                        <div class="mt-4">
                            <x-input-label for="open_time" :value="__('Open Time')" />
                            <x-text-input id="open_time" class="block mt-1 w-full" type="time" name="open_time" :value="old('open_time', $room->open_time)" required />
                            <x-input-error :messages="$errors->get('open_time')" class="mt-2" />
                        </div>

                        <!-- Close Time -->
                        <div class="mt-4">
                            <x-input-label for="close_time" :value="__('Close Time')" />
                            <x-text-input id="close_time" class="block mt-1 w-full" type="time" name="close_time" :value="old('close_time', $room->close_time)" required />
                            <x-input-error :messages="$errors->get('close_time')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Update Room') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>