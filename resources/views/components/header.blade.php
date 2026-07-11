<header class="bg-slate-900 text-white p-4 border-b border-slate-800/80" x-data="{open : false}">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-semibold">
                    <a href={{url('/')}}>JobDock</a>
                </h1>
                <nav class="hidden md:flex items-center space-x-4"> 

                    <x-navlink url="/" :active="request()->is('/')">
                        Home
                    </x-navlink>

                    <x-navlink url="/jobs" :active="request()->is('jobs')">
                        All Jobs
                    </x-navlink>

                    @auth

                    <x-navlink url="/bookmarks" :active="request()->is('bookmarks')">
                        Saved Jobs
                    </x-navlink>

                    {{-- <x-navlink url="/dashboard" :active="request()->is('dashboard')" icon="gauge">
                        Dashboard
                    </x-navlink> --}}

                    @if(Auth::user()->role === 'company')
                    <x-button-link url="/jobs/create" icon="edit">
                        Create Job
                    </x-button-link>
                    @endif


                    <div class="flex items-center space-x-3">
                        <a href="{{ route('dashboard.index') }}">
                            @if(Auth::user()->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 object-cover rounded-full ring-2 ring-slate-800"/>
                            @else
                                <img src="{{ asset('images/profile.png') }}" class="w-10 h-10 object-cover rounded-full" />
                            @endif
                        </a>
                    </div>

                    <x-logout-button />
                     

                    @else

                    <x-navlink url="/login" :active="request()->is('login')" icon="user">
                        Login
                    </x-navlink>

                    <x-navlink url="/register" :active="request()->is('register')">
                        Register
                    </x-navlink>

                    @endauth

                </nav>
                <button @click="open = !open" id="hamburger" class="text-white md:hidden flex items-center">
                    <i class="fa fa-bars text-2xl"></i>
                </button>
            </div>
            <!-- Mobile Menu -->
            <nav x-show="open" @click.outside="open = false" id="mobile-menu" class="md:hidden bg-slate-900 text-white mt-5 pb-4 space-y-2 border-t border-slate-800">
                <x-navlink url="/jobs" :active="request()->is('jobs')" :mobile="true">
                    All Jobs
                </x-navlink>

                @auth

                <x-navlink url="/bookmarks" :active="request()->is('bookmarks')" :mobile="true">
                    Saved Jobs
                </x-navlink>

                <x-navlink url="/dashboard" :active="request()->is('dashboard')" icon="gauge" :mobile="true">
                    Dashboard
                </x-navlink>

                @if(Auth::user()->role === 'company')
                <x-button-link url="/jobs/create" icon="edit" :block="true">
                    Create Job
                </x-button-link>
                @endif

                <x-logout-button :mobile="true" />

                @else

                <x-navlink url="/login" :active="request()->is('login')" :mobile="true">
                    Login
                </x-navlink>

                <x-navlink url="/register" :active="request()->is('register')" :mobile="true">
                    Register
                </x-navlink>

                @endauth
            </nav>
        </header>