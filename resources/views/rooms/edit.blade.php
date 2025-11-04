<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ route('rooms.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">
                        {{ __('Edit Room') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">Update room details and settings</p>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header Section -->
                <div class="bg-gradient-to-r from-slate-800 to-slate-900 px-8 py-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-white/10 backdrop-blur-sm rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Room Information</h3>
                            <p class="text-sm text-gray-300">Modify room details below</p>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="p-8">
                    <form method="POST" action="{{ route('rooms.update', $room) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="group">
                            <x-input-label for="name" :value="__('Name')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <x-text-input id="name" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" type="text" name="name" :value="old('name', $room->name)" required autofocus placeholder="Enter room name" />
                            </div>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Capacity -->
                        <div class="group">
                            <x-input-label for="capacity" :value="__('Capacity')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <x-text-input id="capacity" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="number" name="capacity" :value="old('capacity', $room->capacity)" required min="1" placeholder="Maximum number of people" />
                            </div>
                            <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                        </div>

                        <!-- Time Section -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Open Time -->
                            <div class="group">
                                <x-input-label for="open_time" :value="__('Open Time')" class="text-sm font-semibold text-gray-700 mb-2" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 group-focus-within:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                    </div>
                                    <x-text-input id="open_time" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" type="time" name="open_time" :value="old('open_time', $room->open_time)" required />
                                </div>
                                <x-input-error :messages="$errors->get('open_time')" class="mt-2" />
                            </div>

                            <!-- Close Time -->
                            <div class="group">
                                <x-input-label for="close_time" :value="__('Close Time')" class="text-sm font-semibold text-gray-700 mb-2" />
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400 group-focus-within:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                                        </svg>
                                    </div>
                                    <x-text-input id="close_time" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all" type="time" name="close_time" :value="old('close_time', $room->close_time)" required />
                                </div>
                                <x-input-error :messages="$errors->get('close_time')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                            <a href="{{ route('rooms.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 hover:scale-105 transition-all duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" class="group relative inline-flex items-center px-6 py-3 overflow-hidden font-semibold text-white transition-all duration-300 ease-out bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl hover:scale-105 hover:shadow-xl hover:shadow-purple-500/50">
                                <span class="absolute right-0 w-8 h-32 -mt-12 transition-all duration-1000 transform translate-x-12 bg-white opacity-10 rotate-12 group-hover:-translate-x-40 ease"></span>
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="relative">Update Room</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Helper Card -->
            <div class="mt-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl shadow-lg overflow-hidden border border-blue-100">
                <div class="p-6">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-semibold text-blue-900 mb-1">Update Tips</h4>
                            <ul class="text-sm text-blue-700 space-y-1">
                                <li>• Room name should be unique and descriptive</li>
                                <li>• Capacity must be a positive number</li>
                                <li>• Close time should be after open time</li>
                                <li>• Changes will affect future event bookings</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>