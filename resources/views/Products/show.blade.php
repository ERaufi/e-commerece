<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $product->name }} - LuxeStore</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            :root {
                --glass-bg: rgba(255, 255, 255, 0.03);
                --glass-border: rgba(255, 255, 255, 0.08);
                --glass-shine: rgba(255, 255, 255, 0.05);
            }

            body {
                font-family: 'Outfit', sans-serif;
                background-color: #020617;
                color: #f8fafc;
            }

            .glass-card {
                background: var(--glass-bg);
                backdrop-filter: blur(12px);
                border: 1px solid var(--glass-border);
                border-radius: 24px;
            }

            .glass-nav {
                background: rgba(2, 6, 23, 0.7);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid var(--glass-border);
            }

            .btn-primary {
                background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
                box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
                transition: all 0.3s ease;
                border: none;
                border-radius: 12px;
                font-weight: 600;
                color: white;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.4);
            }

            .bg-mesh {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -1;
                background:
                    radial-gradient(at 0% 0%, rgba(79, 70, 229, 0.15) 0px, transparent 50%),
                    radial-gradient(at 100% 0%, rgba(124, 58, 237, 0.15) 0px, transparent 50%),
                    radial-gradient(at 100% 100%, rgba(79, 70, 229, 0.1) 0px, transparent 50%),
                    radial-gradient(at 0% 100%, rgba(124, 58, 237, 0.1) 0px, transparent 50%);
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fadeIn 0.5s ease-out forwards;
            }

            .thumbnail-active {
                border-color: #6366f1;
                background: rgba(99, 102, 241, 0.1);
            }
        </style>
    </head>

    <body class="antialiased">
        <div class="bg-mesh"></div>

        <!-- Navigation -->
        <nav class="glass-nav py-4 sticky top-0 z-50">
            <div class="container mx-auto px-6 flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-purple-400">
                    LuxeStore
                </a>
                <div class="flex items-center gap-8">
                    <a href="{{ url('/') }}" class="text-slate-400 hover:text-white transition">Home</a>
                    <a href="{{ route('cart.index') }}" class="relative text-slate-400 hover:text-white transition flex items-center gap-2">
                        Cart
                        @if ($cartCount > 0)
                            <span class="bg-indigo-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full">{{ $cartCount }}</span>
                        @endif
                    </a>
                </div>
            </div>
        </nav>

        <main class="container mx-auto px-6 py-12">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-sm text-slate-500 mb-8 animate-fade-in">
                <a href="{{ url('/') }}" class="hover:text-indigo-400 transition">Shop</a>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-slate-300">{{ $product->name }}</span>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-24">
                <!-- Gallery Section -->
                <div class="animate-fade-in" style="animation-delay: 0.1s">
                    <div class="glass-card overflow-hidden mb-6 aspect-square flex items-center justify-center bg-slate-900/50">
                        @if ($product->thumbnail)
                            <img id="main-product-image" src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover transition duration-500">
                        @else
                            <svg class="w-32 h-32 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        @endif
                    </div>

                    @if ($product->images->count() > 0)
                        <div class="grid grid-cols-5 gap-4">
                            <button onclick="changeImage('{{ asset('storage/' . $product->thumbnail) }}', this)"
                                class="thumbnail-active glass-card p-2 aspect-square border-2 border-transparent transition overflow-hidden">
                                <img src="{{ asset('storage/' . $product->thumbnail) }}" class="w-full h-full object-cover rounded-lg">
                            </button>
                            @foreach ($product->images as $image)
                                <button onclick="changeImage('{{ asset('storage/' . $image->path) }}', this)"
                                    class="glass-card p-2 aspect-square border-2 border-transparent hover:border-indigo-500/50 transition overflow-hidden">
                                    <img src="{{ asset('storage/' . $image->path) }}" class="w-full h-full object-cover rounded-lg">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Product Info Section -->
                <div class="animate-fade-in" style="animation-delay: 0.2s">
                    <div class="mb-4">
                        @if ($product->featured)
                            <span
                                class="bg-indigo-600/20 text-indigo-400 text-xs font-bold py-1 px-3 rounded-full border border-indigo-500/20 mb-4 inline-block">FEATURED
                                ITEM</span>
                        @endif
                        <h1 class="text-5xl font-bold mb-4">{{ $product->name }}</h1>
                        <p class="text-slate-400 text-lg leading-relaxed mb-8">{{ $product->short_description }}</p>
                    </div>

                    <div class="glass-card p-8 mb-8 border-indigo-500/20 bg-indigo-500/5">
                        <div class="flex items-end gap-4 mb-8">
                            <span class="text-4xl font-bold text-indigo-400">
                                ${{ $product->sale_price ?? $product->regular_price }}
                            </span>
                            @if ($product->sale_price)
                                <span class="text-xl text-slate-500 line-through mb-1">${{ $product->regular_price }}</span>
                            @endif
                        </div>

                        <div class="cart-action-area">
                            @auth
                                @if (in_array($product->id, $cartProductIds ?? []))
                                    <a href="{{ route('cart.index') }}" class="w-full btn-primary py-4 text-center flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Already in Cart - View Now
                                    </a>
                                @else
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <button type="submit" class="w-full btn-primary py-4">
                                            Add to Cart
                                        </button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="w-full btn-primary py-4 text-center block">
                                    Sign In to Purchase
                                </a>
                            @endauth
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-center gap-4 text-sm text-slate-400">
                            <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span>SKU: {{ $product->sku ?? 'N/A' }}</span>
                        </div>
                        <div class="flex items-center gap-4 text-sm text-slate-400">
                            <div class="w-10 h-10 rounded-xl bg-slate-800 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <span>Stock Status: <span
                                    class="{{ $product->stock_quantity > 0 ? 'text-emerald-400' : 'text-rose-400' }}">{{ $product->stock_status }}
                                    ({{ $product->stock_quantity }} units)</span></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detailed Description -->
            <div class="mb-24 animate-fade-in" style="animation-delay: 0.3s">
                <h2 class="text-3xl font-bold mb-8">Description</h2>
                <div class="glass-card p-10 prose prose-invert max-w-none text-slate-400 leading-relaxed">
                    {!! nl2br(e($product->description)) !!}
                </div>
            </div>

            <!-- Similar Products -->
            @if ($similarProducts->count() > 0)
                <div class="animate-fade-in" style="animation-delay: 0.4s">
                    <h2 class="text-3xl font-bold mb-12">Similar Items You Might Like</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($similarProducts as $similar)
                            <div class="glass-card overflow-hidden group p-4 border-transparent hover:border-indigo-500/30 transition duration-500">
                                <div class="h-64 bg-slate-800 flex items-center justify-center relative rounded-2xl overflow-hidden mb-6">
                                    <img src="{{ asset('storage/' . $similar->thumbnail) }}"
                                        class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                </div>
                                <h3 class="font-bold mb-2 truncate">{{ $similar->name }}</h3>
                                <div class="flex justify-between items-center">
                                    <span class="text-indigo-400 font-bold">${{ $similar->sale_price ?? $similar->regular_price }}</span>
                                    <a href="{{ route('products.show', $similar->slug) }}" class="text-slate-500 hover:text-white text-sm transition">View
                                        Details</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </main>

        <footer class="py-20 border-t border-white/5 bg-slate-900/50">
            <div class="container mx-auto px-6 text-center">
                <p class="text-slate-500 text-sm">
                    &copy; {{ date('Y') }} LuxeStore. All rights reserved. Premium Ecommerce Excellence.
                </p>
            </div>
        </footer>

        <script>
            function changeImage(path, btn) {
                document.getElementById('main-product-image').src = path;
                document.querySelectorAll('button[onclick*="changeImage"]').forEach(b => b.classList.remove('thumbnail-active'));
                btn.classList.add('thumbnail-active');
            }

            document.addEventListener('DOMContentLoaded', function() {
                // AJAX Add to Cart
                const forms = document.querySelectorAll('form[action="{{ route('cart.store') }}"]');
                forms.forEach(form => {
                    form.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const btn = this.querySelector('button[type="submit"]');
                        const originalText = btn.innerHTML;
                        btn.disabled = true;
                        btn.innerHTML = 'Adding...';

                        fetch(this.action, {
                                method: 'POST',
                                body: new FormData(this),
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'Accept': 'application/json'
                                }
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    showNotification(data.message);
                                    updateBadge(data.cartCount);
                                    form.closest('.cart-action-area').innerHTML = `
                                    <a href="{{ route('cart.index') }}" class="w-full btn-primary py-4 text-center flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                        Already in Cart - View Now
                                    </a>
                                `;
                                }
                            })
                            .catch(err => {
                                btn.disabled = false;
                                btn.innerHTML = originalText;
                            });
                    });
                });

                function updateBadge(count) {
                    const badge = document.querySelector('a[href="{{ route('cart.index') }}"] span');
                    if (badge) badge.textContent = count;
                    else {
                        const cartLink = document.querySelector('a[href="{{ route('cart.index') }}"]');
                        const newBadge = document.createElement('span');
                        newBadge.className = 'bg-indigo-600 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full';
                        newBadge.textContent = count;
                        cartLink.appendChild(newBadge);
                    }
                }

                function showNotification(msg) {
                    const div = document.createElement('div');
                    div.className =
                        'fixed top-24 right-6 z-[100] glass-card px-6 py-4 border-emerald-500/50 text-emerald-400 flex items-center gap-3 animate-fade-in shadow-2xl';
                    div.innerHTML =
                        `<svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7" /></svg><span>${msg}</span>`;
                    document.body.appendChild(div);
                    setTimeout(() => {
                        div.style.opacity = '0';
                        div.style.transition = '0.5s';
                        setTimeout(() => div.remove(), 500);
                    }, 3000);
                }
            });
        </script>
    </body>

</html>
