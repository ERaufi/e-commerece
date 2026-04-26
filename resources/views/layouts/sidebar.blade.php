        <aside class="sidebar-container sidebar-transition glass-panel">
            <!-- Brand -->
            <div class="sidebar-brand">
                <div class="brand-logo">
                    <svg class="brand-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="brand-name">
                    ERaufi
                </span>
            </div>

            <!-- Navigation -->
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <p class="nav-section-title">Core</p>



                    <a href="{{ URL('categories') }}" class="nav-item group">
                        <div class="nav-icon-wrapper">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                            </svg>
                        </div>
                        <span x-show="sidebarOpen" class="nav-label">Categories</span>
                    </a>

                    <a href="{{ URL('brands') }}" class="nav-item group">
                        <div class="nav-icon-wrapper">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <span x-show="sidebarOpen" class="nav-label">Brands</span>
                    </a>

                    <a href="{{ route('products.index') }}"
                        class="nav-item group {{ request()->routeIs('products.*') ? 'nav-item-active active' : '' }}">
                        <div class="nav-icon-wrapper">
                            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                        </div>
                        <span x-show="sidebarOpen" class="nav-label">Products</span>
                    </a>
                </div>
            </nav>
        </aside>
