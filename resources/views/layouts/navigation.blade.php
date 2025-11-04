<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50 backdrop-blur-lg bg-white/95">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
                        <div class="relative">
                            <div class="absolute inset-0 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl blur opacity-50 group-hover:opacity-75 transition-opacity"></div>
                            <div class="relative w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg transform group-hover:scale-105 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="hidden lg:block">
                            <span class="text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                                EventHub
                            </span>
                            <div class="text-xs text-gray-500 -mt-1">Management System</div>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex sm:items-center">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="group relative inline-flex items-center px-4 py-2 text-sm font-semibold transition-all duration-200">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            <span>{{ __('Dashboard') }}</span>
                        </span>
                        @if(request()->routeIs('dashboard'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-purple-500 to-pink-600"></span>
                        @endif
                    </x-nav-link>
                    
                    <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')" class="group relative inline-flex items-center px-4 py-2 text-sm font-semibold transition-all duration-200">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ __('Events') }}</span>
                        </span>
                        @if(request()->routeIs('events.index'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-purple-500 to-pink-600"></span>
                        @endif
                    </x-nav-link>
                    
                    <x-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.index')" class="group relative inline-flex items-center px-4 py-2 text-sm font-semibold transition-all duration-200">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <span>{{ __('Rooms') }}</span>
                        </span>
                        @if(request()->routeIs('rooms.index'))
                            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-gradient-to-r from-purple-500 to-pink-600"></span>
                        @endif
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="group inline-flex items-center px-4 py-2 border border-gray-200 text-sm leading-4 font-semibold rounded-xl text-gray-700 bg-white hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 hover:border-purple-200 focus:outline-none transition-all duration-200 shadow-sm hover:shadow-md">
                            @auth
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center shadow-sm">
                                        <span class="text-white text-xs font-bold">{{ substr(Auth::user()->name, 0, 2) }}</span>
                                    </div>
                                    <div class="text-left hidden lg:block">
                                        <div class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                                        <div class="text-xs text-gray-500">Administrator</div>
                                    </div>
                                </div>
                            @endauth

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 text-gray-400 group-hover:text-purple-600 transition-colors" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-gray-100">
                            @auth
                                <div class="text-sm font-semibold text-gray-900">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-500 mt-0.5">{{ Auth::user()->email }}</div>
                            @endauth
                        </div>
                        
                        <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-2 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span>{{ __('Profile') }}</span>
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="flex items-center space-x-2 text-red-600 hover:bg-red-50">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                </svg>
                                <span>{{ __('Log Out') }}</span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-gray-400 hover:text-gray-500 hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 focus:outline-none focus:bg-purple-50 focus:text-purple-600 transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-200 bg-gradient-to-b from-white to-gray-50">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" :class="request()->routeIs('dashboard') ? 'bg-gradient-to-br from-purple-500 to-pink-600' : 'bg-gray-100'">
                    <svg class="w-4 h-4" :class="request()->routeIs('dashboard') ? 'text-white' : 'text-gray-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <span class="font-semibold">{{ __('Dashboard') }}</span>
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" :class="request()->routeIs('events.index') ? 'bg-gradient-to-br from-purple-500 to-pink-600' : 'bg-gray-100'">
                    <svg class="w-4 h-4" :class="request()->routeIs('events.index') ? 'text-white' : 'text-gray-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="font-semibold">{{ __('Events') }}</span>
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('rooms.index')" :active="request()->routeIs('rooms.index')" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-all duration-200">
                <div class="w-8 h-8 rounded-lg flex items-center justify-center" :class="request()->routeIs('rooms.index') ? 'bg-gradient-to-br from-purple-500 to-pink-600' : 'bg-gray-100'">
                    <svg class="w-4 h-4" :class="request()->routeIs('rooms.index') ? 'text-white' : 'text-gray-600'" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <span class="font-semibold">{{ __('Rooms') }}</span>
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-3 border-t border-gray-200 bg-white">
            @auth
                <div class="px-4 mb-3">
                    <div class="flex items-center space-x-3 p-3 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold">{{ substr(Auth::user()->name, 0, 2) }}</span>
                        </div>
                        <div>
                            <div class="font-semibold text-base text-gray-900">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-600">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>
            @endauth

            <div class="space-y-1 px-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 transition-all duration-200">
                    <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <span class="font-semibold">{{ __('Profile') }}</span>
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-red-50 transition-all duration-200">
                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                        </div>
                        <span class="font-semibold text-red-600">{{ __('Log Out') }}</span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<style>
/* Custom styles for navigation active states */
.nav-link-active {
    @apply text-purple-600;
}

/* Smooth dropdown animations */
[x-cloak] { display: none !important; }
</style>