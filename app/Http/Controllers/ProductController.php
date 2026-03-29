<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        // $products=DB::table('products')
        // ->join('brands','products.brand_id','=','brands.id')
        // ->join('categories','products.category_id','=','categories.id')
        // ->select('*')
        // ->get()
        // ;



        $products=DB::table('products')
        ->leftjoin('brands','products.brand_id','=','brands.id')
        ->select('*')
        ->get()
        ;
        return $products;
    }
}
