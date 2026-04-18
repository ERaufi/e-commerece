<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    //

    public function index(Request $request)
    {
        $brands=Brand::when($request->search_field,function($query) use ($request){
            return $query->whereAny([
                'name',
                'slug'
            ],'like','%'.$request->search_field.'%');
        })->paginate(20);
        return view('brands.index',compact('brands'));
    }

    public function create(Request $request)
    {

    $path=' ';
        if($request->hasFile('image'))
            {
                $path=$request->file('image')->store('brands','public');
            }

        $item=new Brand();
        $item->name=$request->name;
        $item->slug=$request->slug;
        $item->image=$path;
        $item->save();

        return back();
    }

    public function edit($id)
    {
        $brand=Brand::where('id',$id)->first();
        return view('brands.edit',compact('brand'));
    }

    public function update(Request $request,$id)
    {
        $item=Brand::where('id',$id)->first();
        $path=' ';
    if($request->hasFile('image'))
        {
            if($item->image)
                {
                    Storage::disk('public')->delete($item->image);
                }

                $path=$request->file('image')->store('brands','public');
        }

        $item->name=$request->name;
        $item->slug=$request->slug;
        $item->image=$path;
        $item->update();

        return back();
    }

    public function destroy($id)
    {
        $brand=Brand::where('id',$id)->first();

        if($brand->image)
            {
                Storage::disk('public')->delete($brand->image);
            }


        $brand->delete();

        return back();
    }
}
