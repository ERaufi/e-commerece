@extends('layouts.mainLayout')


@section('contect')

    <x-validation-errors />

    <div class="page-container narrow">
        <div class="table-card">
            <div class="card-body">
                <form method="POST" action="{{URL('brands/update',$brand->id)}}" enctype="multipart/form-data">
                    @csrf

                    @include('brands.Templates.Fields')

                    <div class="form-actions">
                        <a href="" class="cancel-link">Cancel</a>
                        <button type="submit" class="btn-primary">
                            <svg class="btn-icon margin-end-sm" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M5 13l4 4L19 7" />
                            </svg>
                            Save Brand
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
