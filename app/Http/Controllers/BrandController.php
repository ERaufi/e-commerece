<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //

    public function addData()
    {
        // $item=new Brand();
        // $item->name='Nike';
        // $item->slug='nike';
        // $item->image='image.jpg';
        // $item->save();

        // Brand::insert([
        // [
        //     'name'=>'Nike Pro 1',
        //     'slug'=>'nike_pro1',
        //     'image'=>'image.jpg'
        // ],
        // [
        //     'name'=>'Nike Pro2',
        //     'slug'=>'nike_pro2',
        //     'image'=>'image.jpg'
        // ],
        // [
        //     'name'=>'Nike Pro3',
        //     'slug'=>'nike_pro3',
        //     'image'=>'image.jpg'
        // ]
        // ]);

    //     $brand=Brand::where('name','Nike Pro2')->first();
    // if($brand)
    //     {
    //         $brand->name='Nike Pro2';
    //         $brand->slug='nike_pro2';
    //         $brand->image='image.jpg';
    //         $brand->update();
    //     }else{
    //         $brand=new Brand();
    //         $brand->name='Nike Pro2';
    //         $brand->slug='nike_pro2';
    //         $brand->image='image.jpg';
    //         $brand->save();
    //     }

    // $brand=Brand::firstOrCreate(
    //     ['name'=>'Nike Golden'],
    //     ['slug'=>'nike_golden','image'=>'image.jpg']
    //     );

    $brand=Brand::updateOrCreate(
        ['name'=>'Nike Golden'],
        [
        'slug'=>'ssssss','image'=>'image2.jpg']
        );

        return $brand;
    }


    public function getData()
    {
        // $items=Brand::all();
        // $items=Brand::findOrFail(99999989);
        // $items=Brand::first();
        // $items=Brand::latest()->first();

        // $items=Brand::onlyTrashed()->get();
        // $items=Brand::withTrashed()->get();
        // $items=Brand::withTrashed()->find(4);
        // $items->restore();

        $items=Brand::find(5);
        $items->forceDelete();
        return $items;
    }


    public function updateData()
    {
        // $item=Brand::find(21);
        // $item->name='Nike Updated again';
        // $item->slug='nike_updated_again';
        // $item->update();

        Brand::where('id','21')->update([
            'name'=>'nike next update',
            'slug'=>'nike_next_update'
        ]);

        return 'updated successfully';
    }

    public function deleteData()
    {
        // $items=Brand::find(25);
        // $items->delete();

        Brand::where('id',4)->delete();

        return 'deleted successfully';
    }
}
