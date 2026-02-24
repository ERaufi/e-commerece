<header class="navbar-header">
    <!-- Navbar Container -->
    <div class="navbar-wrapper glass-panel">
        <!-- Left Section -->
        <div class="navbar-left">
            <button @click="mobileOpen = true" class="navbar-btn lg:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <button @click="sidebarOpen = !sidebarOpen" class="navbar-btn hidden lg:flex">
                <svg class="w-6 h-6 transform transition-transform duration-300" :class="!sidebarOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
                </svg>
            </button>

        </div>

        <!-- Right Section -->
        <div class="navbar-right">
            <!-- Search Suggestion (Visual Only) -->
            <div class="navbar-search-box group">
                <div class="search-hint">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Search anything...</span>
                </div>
                <kbd class="kbd-hint">⌘K</kbd>
            </div>

            <div class="navbar-sep"></div>

            <!-- Notifications (Visual Only) -->
            <button class="navbar-btn navbar-badge-wrapper">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="navbar-badge"></span>
            </button>

            <!-- User Dropdown -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="user-btn group">
                    <div class="user-avatar-container">
                        <div class="user-avatar-inner">
                            {{ Auth::check() ? substr(Auth::user()->name, 0, 1) : 'G' }}
                        </div>
                    </div>
                </button>

                <div x-show="open" x-cloak @click.away="open = false" x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="transform opacity-0 scale-95 translate-y-2" x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                    x-transition:leave-end="transform opacity-0 scale-95 translate-y-2" class="navbar-dropdown">
                    <div class="dropdown-header">
                        <p class="dropdown-header-label">Authenticated as</p>
                        <p class="dropdown-header-value">{{ Auth::check() ? Auth::user()->name : 'Guest' }}</p>
                    </div>


                    <a href="#" class="dropdown-item">
                        <svg class="dropdown-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>

                    <div class="dropdown-sep"></div>

                    <form method="POST" action="#">
                        @csrf
                        <button type="submit" class="dropdown-btn-danger">
                            <svg class="dropdown-item-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Sign out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
