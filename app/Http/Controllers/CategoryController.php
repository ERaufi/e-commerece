<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function store()
    {
        // DB::table('categories')->insert([
        //     'name'=>'123456',
        //     'slug'=>'abc',
        //     'image'=>'lsdkfjlsdkf',
        // ]);

        // DB::table('categories')->insert([
        //     ['name'=>'1234563213',
        //     'slug'=>'abc12312',
        //     'image'=>'ls12312'],
        //     [
        //         'name'=>'ssss',
        //         'slug'=>'ffss',
        //         'image'=>'cvvvv',
        //     ]
        // ]);

        $id=DB::table('categories')->insertGetId([
            'name'=>'123svfv',
            'slug'=>'tttt',
            'image'=>'lsdkfjlsdkf',
        ]);

        return $id;
    }

    public function getMyData()
    {
        $categories=DB::table('categories')
        ->where('id',71)
        ->value('name');

        return $categories;
    }

    public function whereCond()
    {
        // $categories=DB::table('categories')
        // ->where('name','=','Toys')
        // ->orwhere('id','=',44)
        // ->get();

        //         $categories=DB::table('categories')
        // ->whereIn('id',[1,2,3])
        // ->get();

        // $categories=DB::table('categories')
        // ->whereBetween('id',[1,10])
        // ->get();

        $categories=DB::table('categories')
        ->whereNull('image')
        ->get();

        return $categories;
    }

    public function update()
    {
        DB::table('categories')
        ->where('id','5')
        ->update(['name'=>'123','slug'=>'new_slug']);

        return 'successfully';
    }

    public function detelesssssw()
    {
        DB::table('categories')
        ->where('id','10')
        ->delete();

        return 'deleted successfully';
    }

}
