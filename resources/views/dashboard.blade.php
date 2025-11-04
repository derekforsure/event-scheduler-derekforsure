<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-3xl font-bold text-gray-900">
                    {{ __('Dashboard') }}
                </h2>
                <p class="mt-1 text-sm text-gray-600">Welcome back! Here's what's happening with your events.</p>
            </div>
            <div class="flex items-center space-x-3">
                <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-full text-sm font-medium text-blue-700">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                    </svg>
                    {{ now()->format('M d, Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Total Events Card -->
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-2xl blur opacity-20 group-hover:opacity-30 transition duration-300"></div>
                    <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/10 to-indigo-500/10 rounded-bl-full"></div>
                        <div class="p-6 relative">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                    Active
                                </span>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Events</h3>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalEvents }}</p>
                            <div class="mt-4 flex items-center text-sm">
                                <span class="text-green-600 font-semibold flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd"/>
                                    </svg>
                                    All time
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Rooms Card -->
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl blur opacity-20 group-hover:opacity-30 transition duration-300"></div>
                    <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-400/10 to-pink-500/10 rounded-bl-full"></div>
                        <div class="p-6 relative">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-800">
                                    Available
                                </span>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Rooms</h3>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalRooms }}</p>
                            <div class="mt-4 flex items-center text-sm">
                                <span class="text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                                    </svg>
                                    Facilities
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Organizers Card -->
                <div class="relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-2xl blur opacity-20 group-hover:opacity-30 transition duration-300"></div>
                    <div class="relative bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-400/10 to-teal-500/10 rounded-bl-full"></div>
                        <div class="p-6 relative">
                            <div class="flex items-center justify-between mb-4">
                                <div class="w-12 h-12 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
                                    Team
                                </span>
                            </div>
                            <h3 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Organizers</h3>
                            <p class="text-4xl font-bold text-gray-900 mt-2">{{ $totalOrganizers }}</p>
                            <div class="mt-4 flex items-center text-sm">
                                <span class="text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                                    </svg>
                                    Members
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events and Calendar Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Upcoming Events -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full">
                        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-5">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-white/20 backdrop-blur-sm rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-white">Upcoming Events</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            @if($upcomingEvents->isEmpty())
                                <div class="text-center py-12">
                                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 font-medium">No upcoming events</p>
                                    <p class="text-sm text-gray-400 mt-1">Your schedule is clear</p>
                                </div>
                            @else
                                <div class="space-y-4">
                                    @foreach($upcomingEvents as $event)
                                        <div class="group relative">
                                            <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500/10 to-purple-500/10 rounded-xl opacity-0 group-hover:opacity-100 transition duration-300"></div>
                                            <div class="relative bg-gradient-to-br from-gray-50 to-white border border-gray-200 rounded-xl p-4 hover:border-indigo-300 transition-all duration-300">
                                                <div class="flex items-start justify-between mb-3">
                                                    <div class="flex-1">
                                                        <h4 class="font-semibold text-gray-900 text-lg mb-1 group-hover:text-indigo-600 transition-colors">
                                                            {{ $event->title }}
                                                        </h4>
                                                        <div class="flex items-center text-sm text-gray-600 mb-2">
                                                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                            </svg>
                                                            {{ $event->start_time->format('M d, Y H:i') }} - {{ $event->end_time->format('H:i') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between">
                                                    <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-semibold text-white shadow-sm" style="background: linear-gradient(135deg, {{ $event->color ?? '#007bff' }}, {{ $event->color ?? '#007bff' }}dd);">
                                                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        </svg>
                                                        {{ $event->room->name ?? 'N/A' }}
                                                    </span>
                                                    <button class="text-gray-400 hover:text-indigo-600 transition-colors">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Calendar -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-slate-800 to-slate-900 px-6 py-5">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-xl font-bold text-white">Event Calendar</h3>
                                </div>
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-white/10 text-white backdrop-blur-sm">
                                    Interactive View
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div id='calendar' class="contentium-calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
        <style>
            .contentium-calendar {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            }
            .contentium-calendar .fc-toolbar-title {
                font-size: 1.75rem !important;
                font-weight: 700 !important;
                color: #1f2937;
            }
            .contentium-calendar .fc-button {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%) !important;
                border: none !important;
                border-radius: 0.5rem !important;
                padding: 0.5rem 1rem !important;
                font-weight: 600 !important;
                text-transform: capitalize !important;
                box-shadow: 0 2px 4px rgba(79, 70, 229, 0.2) !important;
                transition: all 0.3s ease !important;
            }
            .contentium-calendar .fc-button:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 8px rgba(79, 70, 229, 0.3) !important;
            }
            .contentium-calendar .fc-button:active {
                transform: translateY(0);
            }
            .contentium-calendar .fc-button-active {
                background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%) !important;
            }
            .contentium-calendar .fc-col-header-cell {
                background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
                border: none !important;
                padding: 1rem 0.5rem !important;
                font-weight: 700 !important;
                font-size: 0.75rem !important;
                text-transform: uppercase !important;
                letter-spacing: 0.05em !important;
                color: #6b7280 !important;
            }
            .contentium-calendar .fc-daygrid-day {
                transition: all 0.2s ease;
            }
            .contentium-calendar .fc-daygrid-day:hover {
                background-color: #f9fafb;
            }
            .contentium-calendar .fc-daygrid-day-number {
                font-weight: 600 !important;
                color: #374151;
                padding: 0.5rem !important;
            }
            .contentium-calendar .fc-day-today {
                background-color: #eff6ff !important;
            }
            .contentium-calendar .fc-day-today .fc-daygrid-day-number {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
                color: white !important;
                border-radius: 0.5rem;
                padding: 0.375rem 0.625rem !important;
                display: inline-block;
            }
            .contentium-calendar .fc-event {
                border: none !important;
                border-radius: 0.375rem !important;
                padding: 0.25rem 0.5rem !important;
                font-weight: 600 !important;
                font-size: 0.813rem !important;
                cursor: pointer !important;
                transition: all 0.2s ease !important;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            }
            .contentium-calendar .fc-event:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
            }
            .contentium-calendar .fc-daygrid-event-dot {
                display: none;
            }
            .contentium-calendar .fc-scrollgrid {
                border: 1px solid #e5e7eb !important;
                border-radius: 0.75rem !important;
                overflow: hidden;
            }
            .contentium-calendar .fc-scrollgrid td,
            .contentium-calendar .fc-scrollgrid th {
                border-color: #e5e7eb !important;
            }
        </style>
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