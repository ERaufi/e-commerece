@extends('layouts.mainLayout')

@section('content')
@include('subView.input',[
    'name'=>'name',
    'id'=>'name'
])
@include('subView.input',[
    'name'=>'emai',
    'id'=>'email'
])
@endsection
