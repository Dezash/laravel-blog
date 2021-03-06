<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('blog') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                        {{ __('Pagrindinis') }}
                    </x-jet-nav-link>

                    @can('viewList', App\Models\Blog::class)
                    <x-jet-nav-link href="{{ route('blogadmin') }}" :active="request()->routeIs('blogadmin')">
                        Straipsnių valdiklis
                    </x-jet-nav-link>
                    @endcan

                    @can('viewQueue', App\Models\Blog::class)
                    <x-jet-nav-link href="{{ route('queue') }}" :active="request()->routeIs('queue')">
                        Straipsnių eilė
                    </x-jet-nav-link>
                    @endcan

                    @can('view', App\Models\User::class)
                    <x-jet-nav-link href="{{ route('userlist') }}" :active="request()->routeIs('userlist')">
                        Vartotojai
                    </x-jet-nav-link>
                    @endcan
                </div>
            </div>


            @guest
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-jet-nav-link align="right" href="{{ route('login') }}" :active="request()->routeIs('login')">
                    Prisijungti
                </x-jet-nav-link>

                <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    Registruotis
                </x-jet-nav-link>
            </div>
            @endguest

            @auth
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <style>
                    .dropdown:hover .dropdown-menu {
                        display: block;
                    }

                    .dropdown-menu {
                        position: static;
                    }

                    .dropdown-menu {
                        position: absolute;
                        left: 0;
                        right: 0;
                    }
                </style>

                <div class="p-5">
                    <div class="dropdown inline-block relative">
                        <button class="ml-3 text-gray-400 hover:text-gray-200 inline-flex items-center">
                            <svg class="h-5 w-5 fill-current" viewBox="0 0 24 24">
                                <path d="M8 0a2 2 0 00-2 2v.341C3.67 3.165 2 5.388 2 8v5H1a1 1 0 100 2h14a1 1 0 100-2h-1V8a6.002 6.002 0 00-4-5.659V2a2 2 0 00-2-2zM8 18a2 2 0 01-2-2h4a2 2 0 01-2 2z" />
                            </svg>
                            <span class="mr-1">Pranešimai</span>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1 w-60">
                            @foreach(Auth::user()->messagesReceived as $message)
                            <div class="flex items-center p-1 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                <img class="w-12 h-12 rounded-full object-cover mx-2" src="{{ 'https://ui-avatars.com/api/?name=' . $message->author->name . '&color=7F9CF5&background=EBF4FF' }}">
                                <div class="w-full">
                                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        {{ $message->author->name }}
                                    </p>
                                    <p class="text-sm text-gray-700 dark:text-gray-200">
                                        {{ $message->message }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                        @else
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        @if(count(Auth::user()->allTeams()) !== 0)
                        <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                            {{ __('Team Settings') }}
                        </x-jet-dropdown-link>
                        @endif

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                            {{ __('Create New Team') }}
                        </x-jet-dropdown-link>
                        @endcan

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" />
                        @endforeach

                        <div class="border-t border-gray-100"></div>
                        @endif

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @endauth
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                {{ __('Pagrindinis') }}
            </x-jet-responsive-nav-link>

            @can('viewList', App\Models\Blog::class)
            <x-jet-responsive-nav-link href="{{ route('blogadmin') }}" :active="request()->routeIs('blogadmin')">
                Straipsnių valdiklis
            </x-jet-responsive-nav-link>
            @endcan

            @can('viewQueue', App\Models\Blog::class)
            <x-jet-responsive-nav-link href="{{ route('queue') }}" :active="request()->routeIs('queue')">
                Straipsnių eilė
            </x-jet-responsive-nav-link>
            @endcan

            @can('view', App\Models\User::class)
            <x-jet-responsive-nav-link href="{{ route('userlist') }}" :active="request()->routeIs('userlist')">
                Vartotojai
            </x-jet-responsive-nav-link>
            @endcan

            @guest
            <x-jet-responsive-nav-link href="{{ route('login') }}">
                Prisijungti
            </x-jet-responsive-nav-link>
            @endguest
        </div>

        @auth
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                    {{ __('API Tokens') }}
                </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Logout') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                <div class="border-t border-gray-200"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                @if(count(Auth::user()->allTeams()) !== 0)
                <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                    {{ __('Team Settings') }}
                </x-jet-responsive-nav-link>
                @endif

                <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                    {{ __('Create New Team') }}
                </x-jet-responsive-nav-link>

                <div class="border-t border-gray-200"></div>

                <!-- Team Switcher -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                @endforeach
                @endif
            </div>
        </div>
        @endauth
    </div>
</nav>