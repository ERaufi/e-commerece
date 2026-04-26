<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
        $categories=Category::when($request->search_field,function($query) use ($request){
            return $query->whereAny([
                'name',
                'slug'
            ],'like','%'.$request->search_field.'%');
        })->paginate(20);
        return view('category.index',compact('categories'));
    }

    public function create(Request $request)
    {

    $path=' ';
        if($request->hasFile('image'))
            {
                $path=$request->file('image')->store('category','public');
            }

        $item=new Category();
        $item->name=$request->name;
        $item->slug=$request->slug;
        $item->image=$path;
        $item->save();

        return back();
    }

    public function edit($id)
    {
        $brand=Category::where('id',$id)->first();
        return view('category.edit',compact('brand'));
    }

    public function update(Request $request,$id)
    {
        $item=Category::where('id',$id)->first();
        $path=' ';
    if($request->hasFile('image'))
        {
            if($item->image)
                {
                    Storage::disk('public')->delete($item->image);
                }

                $path=$request->file('image')->store('category','public');
        }

        $item->name=$request->name;
        $item->slug=$request->slug;
        $item->image=$path;
        $item->update();

        return back();
    }

    public function destroy($id)
    {
        $brand=Category::where('id',$id)->first();

        if($brand->image)
            {
                Storage::disk('public')->delete($brand->image);
            }


        $brand->delete();

        return back();
    }
}
