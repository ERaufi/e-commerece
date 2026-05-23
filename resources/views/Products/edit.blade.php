@extends('layouts.mainLayout')

@section('contect')
    <div class="page-header">
        <h2 class="page-title">
            {{ __('Edit Product') }}
        </h2>
    </div>

    <div class="page-container">
        <div class="table-card">
            <div class="card-body">
                <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('Products.Templates.Fields')

                    <div class="form-actions">
                        <a href="{{ route('products.index') }}" class="cancel-link">Cancel</a>
                        <button type="submit" class="btn-primary">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
