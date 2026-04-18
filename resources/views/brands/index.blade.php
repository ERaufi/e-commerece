@extends('layouts.mainLayout')


@section('contect')
   <div class="page-header">
        <div>
            <h2 class="page-title">Brands</h2>
            <p class="page-subtitle">Manage product manufacturers and logos.</p>
        </div>
    </div>

    <div>
        <a href="{{URL('brands/create')}}">Create New</a>
    </div>

    <div class="table-card">

        <form action="{{URL('brands')}}" method="GET">
            <input type="text" name="search_field" class="form-control" value="{{request('search_field')}}"/>
            <button type="submit">Search</button>
        </form>


        <table class="data-table">
            <thead>
                <tr>
                    <th class="w-16">Logo</th>
                    <th>Brand Info</th>
                    <th>Created At</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>
                            <img src="{{asset('storage/'.$brand->image)}}" style="width: 50px"/>
                        </td>
                        <td>
                            <div class="user-name">{{$brand->name}}</div>
                            <div class="text-secondary text-xs">{{$brand->slug}}</div>
                        </td>
                        <td class="text-secondary text-sm">
                            {{$brand->created_at}}
                        </td>
                        <td>
                            <div class="flex-end-gap-2">
                                <a href="{{URL('brands/edit',$brand->id)}}" class="btn-secondary">Edit</a>
                                <form action="{{URL('brands/delete',$brand->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this brands?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

        {{$brands
        ->appends(request()->query())
        ->links('pagination::bootstrap-5')}}
    </div>
@endsection
