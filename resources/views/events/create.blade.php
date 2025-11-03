@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Create New Event</h1>

    <form action="{{ route('events.store') }}" method="POST" class="w-full max-w-lg">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="title" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Event Title</label>
                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" name="title" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="start_date" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Start Date</label>
                <input type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="start_date" name="start_date" required>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="start_time" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Start Time</label>
                <input type="time" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="start_time" name="start_time" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="end_date" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">End Date</label>
                <input type="date" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="end_date" name="end_date" required>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="end_time" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">End Time</label>
                <input type="time" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="end_time" name="end_time" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="participants" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Participants</label>
                <input type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="participants" name="participants" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="room_id" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Room</label>
                <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="room_id" name="room_id" required>
                    <option value="">Select Room</option>
                    {{-- Rooms will be loaded here by JavaScript or passed from controller --}}
                </select>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="user_id" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Organizer</label>
                <select class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="user_id" name="user_id" required>
                    <option value="">Select Organizer</option>
                    {{-- Users will be loaded here by JavaScript or passed from controller --}}
                </select>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            <a href="{{ route('events.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
        </div>
    </form>

    <div id="form-messages" class="mt-3"></div>

@endsection