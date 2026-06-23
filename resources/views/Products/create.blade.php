@extends('layouts.mainLayout')

@section('contect')
    <div class="page-header">
        <h2 class="page-title">
            {{ __('Create Product') }}
        </h2>
    </div>

    <x-validation-errors />

    <div class="page-container">
        <div class="table-card">
            <div class="card-body">
                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf

                    @include('Products.Templates.Fields')

                    <div class="form-actions">
                        <a href="{{ route('products.index') }}" class="cancel-link">Cancel</a>
                        <button type="submit" class="btn-primary">
                            <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
