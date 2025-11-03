@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Room</h1>

    <form action="{{ route('rooms.update', $room->id) }}" method="POST" class="w-full max-w-lg">
        @csrf
        @method('PUT')
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Room Name</label>
                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" name="name" value="{{ old('name', $room->name) }}" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="capacity" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Capacity</label>
                <input type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="capacity" name="capacity" value="{{ old('capacity', $room->capacity) }}" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label for="open_time" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Open Time</label>
                <input type="time" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="open_time" name="open_time" value="{{ old('open_time', \Carbon\Carbon::parse($room->open_time)->format('H:i')) }}" required>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label for="close_time" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Close Time</label>
                <input type="time" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="close_time" name="close_time" value="{{ old('close_time', \Carbon\Carbon::parse($room->close_time)->format('H:i')) }}" required>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
            <a href="{{ route('rooms.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</a>
        </div>
    </form>

    <div id="form-messages" class="mt-3"></div>

@endsection