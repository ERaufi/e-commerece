@extends('layouts.mainLayout')

@section('contect')
    <div class="page-header">
        <div>
            <h2 class="page-title">{{ __('Products Management') }}</h2>
            <p class="page-subtitle">Manage your inventory, prices, and product visibility.</p>
        </div>
        {{-- <a href="{{ route('products.create') }}" class="btn-primary">
            <svg class="w-5 h-5 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
            {{ __('New Product') }}
        </a> --}}

        <x-button href="products/create">
            Create New Product
        </x-button>
    </div>

    <div class="page-container">
        @if (session('success'))
            <div class="alert-success">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card">
            <table class="data-table">
                <thead>
                    <tr>
                        <th class="w-16">Thumbnail</th>
                        <th>Product Info</th>
                        <th>Brand & Category</th>
                        <th>Pricing</th>
                        <th>Inventory</th>
                        <th>Status</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                @if ($product->thumbnail)
                                    <img src="{{ asset('storage/' . $product->thumbnail) }}" alt="{{ $product->name }}"
                                        class="w-12 h-12 object-cover rounded-lg border-white/5">
                                @else
                                    <div
                                        class="w-12 h-12 bg-white/5 rounded-lg flex items-center justify-center border border-white/5">
                                        <svg class="w-6 h-6 text-secondary" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="font-medium text-white">{{ $product->name }}</div>
                                <div class="text-xs text-secondary mt-0.5">SKU: {{ $product->sku ?? 'N/A' }}</div>
                            </td>
                            <td>
                                <div class="text-sm text-white">{{ $product->brand->name ?? 'No Brand' }}</div>
                                <div class="text-xs text-secondary mt-0.5">{{ $product->category->name ?? 'No Category' }}
                                </div>
                            </td>
                            <td>
                                <div class="text-sm font-semibold text-emerald-400">
                                    ${{ number_format($product->regular_price, 2) }}</div>
                                @if ($product->sale_price)
                                    <div class="text-xs text-secondary line-through mt-0.5">
                                        ${{ number_format($product->sale_price, 2) }}</div>
                                @endif
                            </td>
                            <td>
                                <div class="flex items-center">
                                    <span
                                        class="w-2 h-2 rounded-full me-2 {{ $product->stock_status == 'instock' ? 'bg-emerald-500' : 'bg-rose-500' }}"
                                        style="display: inline-block;"></span>
                                    <span
                                        class="text-sm {{ $product->stock_status == 'instock' ? 'text-emerald-400' : 'text-rose-400' }}">
                                        {{ $product->stock_status == 'instock' ? 'In Stock' : 'Out of Stock' }}
                                    </span>
                                </div>
                                <div class="text-xs text-secondary mt-1">Qty: {{ $product->stock_quantity ?? 0 }}</div>
                            </td>
                            <td>
                                @if ($product->status == 'active')
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-400 text-xs font-medium border border-emerald-500/20">
                                        Active
                                    </span>
                                @elseif($product->status == 'draft')
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-amber-500/10 text-amber-400 text-xs font-medium border border-amber-500/20">
                                        Draft
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-rose-500/10 text-rose-400 text-xs font-medium border border-rose-500/20">
                                        {{ ucfirst($product->status) }}
                                    </span>
                                @endif
                            </td>
                            <td>
                                <div class="flex-end-gap-2">
                                    @can('update', $product)
                                        <a href="{{ route('products.edit', $product) }}" class="btn-secondary">
                                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                            Edit
                                        </a>
                                    @endcan


                                    @can('delete', $product)
                                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-danger" onclick="return confirm('Are you sure?')">
                                                <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    @endcan



                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
