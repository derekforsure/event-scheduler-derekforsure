<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <a href="{{ route('events.index') }}" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">
                        {{ __('Edit Event') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">Update event details and settings</p>
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
                            <h3 class="text-xl font-bold text-white">Event Information</h3>
                            <p class="text-sm text-gray-300">Modify event details below</p>
                        </div>
                    </div>
                </div>

                <!-- Form Section -->
                <div class="p-8">
                    <form method="POST" action="{{ route('events.update', $event) }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="group">
                            <x-input-label for="title" :value="__('Title')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-purple-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <x-text-input id="title" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" type="text" name="title" :value="old('title', $event->title)" required autofocus placeholder="Enter event title" />
                            </div>
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Start Time -->
                        <div class="group">
                            <x-input-label for="start_time" :value="__('Start Time')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-green-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <x-text-input id="start_time" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" type="datetime-local" name="start_time" :value="old('start_time', $event->start_time ? $event->start_time->format('Y-m-d\TH:i') : '')" required />
                            </div>
                            <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                        </div>

                        <!-- End Time -->
                        <div class="group">
                            <x-input-label for="end_time" :value="__('End Time')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <x-text-input id="end_time" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all" type="datetime-local" name="end_time" :value="old('end_time', $event->end_time ? $event->end_time->format('Y-m-d\TH:i') : '')" required />
                            </div>
                            <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                        </div>

                        <!-- Participants -->
                        <div class="group">
                            <x-input-label for="participants" :value="__('Participants')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <x-text-input id="participants" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="number" name="participants" :value="old('participants', $event->participants)" required min="1" placeholder="Number of participants" />
                            </div>
                            <x-input-error :messages="$errors->get('participants')" class="mt-2" />
                        </div>

                        <!-- Room -->
                        <div class="group">
                            <x-input-label for="room_id" :value="__('Room')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-amber-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <select id="room_id" name="room_id" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all appearance-none bg-white" required>
                                    <option value="">Select a Room</option>
                                    @foreach ($rooms as $room)
                                        <option value="{{ $room->id }}" {{ old('room_id', $event->room_id) == $room->id ? 'selected' : '' }}>
                                            {{ $room->name }} (Capacity: {{ $room->capacity }}, Open: {{ $room->open_time }}, Close: {{ $room->close_time }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('room_id')" class="mt-2" />
                        </div>

                        <!-- Organizer -->
                        <div class="group">
                            <x-input-label for="organizer_id" :value="__('Organizer')" class="text-sm font-semibold text-gray-700 mb-2" />
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400 group-focus-within:text-cyan-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <select id="organizer_id" name="organizer_id" class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-xl focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-all appearance-none bg-white" required>
                                    <option value="">Select an Organizer</option>
                                    @foreach ($organizers as $organizer)
                                        <option value="{{ $organizer->id }}" {{ old('organizer_id', $event->organizer_id) == $organizer->id ? 'selected' : '' }}>
                                            {{ $organizer->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('organizer_id')" class="mt-2" />
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                            <a href="{{ route('events.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 hover:scale-105 transition-all duration-200">
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
                                <span class="relative">Update Event</span>
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
                                <li>• Ensure the event time falls within the room's operating hours</li>
                                <li>• Number of participants should not exceed room capacity</li>
                                <li>• Check for scheduling conflicts before updating</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>