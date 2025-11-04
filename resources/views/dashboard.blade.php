<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-lg font-semibold">Total Events</h3>
                            <p class="text-4xl font-bold">{{ $totalEvents }}</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-lg font-semibold">Total Rooms</h3>
                            <p class="text-4xl font-bold">{{ $totalRooms }}</p>
                        </div>
                    </div>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-lg font-semibold">Total Organizers</h3>
                            <p class="text-4xl font-bold">{{ $totalOrganizers }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold">Upcoming Events</h3>
                        @if($upcomingEvents->isEmpty())
                            <p class="text-md">No upcoming events.</p>
                        @else
                            <ul class="mt-4 space-y-2">
                                @foreach($upcomingEvents as $event)
                                    <li class="flex justify-between items-center">
                                        <div>
                                            <p class="text-lg font-medium">{{ $event->title }}</p>
                                            <p class="text-sm text-gray-500">{{ $event->start_time->format('M d, Y H:i') }} - {{ $event->end_time->format('H:i') }}</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs font-semibold text-white rounded-full" style="background-color: {{ $event->color ?? '#007bff' }}">{{ $event->room->name ?? 'N/A' }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                    },
                    events: "{{ url('/api/events') }}",
                    eventDidMount: function(info) {
                        if (info.event.extendedProps.color) {
                            info.el.style.backgroundColor = info.event.extendedProps.color;
                            info.el.style.borderColor = info.event.extendedProps.color;
                        }
                    },
                    eventClick: function(info) {
                        alert('Event: ' + info.event.title + '\nRoom: ' + info.event.extendedProps.room_name + '\nOrganizer: ' + info.event.extendedProps.organizer_name);
                    }
                });
                calendar.render();
            });
        </script>
    @endpush
</x-app-layout>