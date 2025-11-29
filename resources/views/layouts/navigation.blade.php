<nav x-data="{ open: false }" class="main-nav-container">
    <div class="nav-content-wrapper">
        <div class="flex-container">
            <div class="left-section">
                <div class="logo-section">
                    <a href="{{ route('dashboard') }}">
                        {{-- Assuming <x-application-logo> is a Blade component with the SVG --}}
                        <x-application-logo class="logo-style" />
                    </a>
                </div>

                <div class="nav-links-desktop">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="settings-dropdown-desktop">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="dropdown-trigger-button">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="arrow-icon-container">
                                <svg class="arrow-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="hamburger-container">
                <button @click="open = ! open" class="hamburger-button">
                    <svg class="hamburger-icon" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="hamburger-bars" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hamburger-cross" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="responsive-menu-container">
        <div class="responsive-nav-links">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="responsive-settings-options">
            <div class="px-4">
                <div class="responsive-user-name">{{ Auth::user()->name }}</div>
                <div class="responsive-user-email">{{ Auth::user()->email }}</div>
            </div>

            <div class="responsive-links-list">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
