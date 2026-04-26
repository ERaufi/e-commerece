@extends('layouts.mainLayout')


@section('contect')
   <div class="page-header">
        <div>
            <h2 class="page-title">Category</h2>
            <p class="page-subtitle">Manage product manufacturers and logos.</p>
        </div>
    </div>

    <div>
        <a href="{{URL('categories/create')}}">Create New</a>
    </div>

    <div class="table-card">

        <form action="{{URL('categories')}}" method="GET">
            <input type="text" name="search_field" class="form-control" value="{{request('search_field')}}"/>
            <button type="submit">Search</button>
        </form>


        <table class="data-table">
            <thead>
                <tr>
                    <th class="w-16">Logo</th>
                    <th>Category Info</th>
                    <th>Created At</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <img src="{{asset('storage/'.$category->image)}}" style="width: 50px"/>
                        </td>
                        <td>
                            <div class="user-name">{{$category->name}}</div>
                            <div class="text-secondary text-xs">{{$category->slug}}</div>
                        </td>
                        <td class="text-secondary text-sm">
                            {{$category->created_at}}
                        </td>
                        <td>
                            <div class="flex-end-gap-2">
                                <a href="{{URL('categories/edit',$category->id)}}" class="btn-secondary">Edit</a>
                                <form action="{{URL('categories/delete',$category->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this Category?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>

        {{$categories
        ->appends(request()->query())
        ->links('pagination::bootstrap-5')}}
    </div>
@endsection
