<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        // $items=Product::where('status','published')
        // ->where('stock_status','instock')
        // ->get();

        // $items=Product::where('stock_status','instock')
        // ->where(function($query){
        //     $query->where('status','published')
        //     ->orWhere('featured','yes');
        // })
        // ->get();

        // $items=Product::whereIn('id',[1,2,3])->get();
        // $items=Product::whereBetween('id',[1,5])->get();
        // $items=Product::whereNull('sku')->get();
        // $items=Product::whereNotNull('sku')->get();

        // $items=Product::where('regular_price',1000)
        // ->where('sale_price',1000)
        // ->get();
        // $items=Product::whereAll(['regular_price','sale_price'],'=',1000)
        // ->get();
        $items=Product::whereAny(['regular_price','sale_price','id'],'1000')
        ->get();
        return $items;
    }

    public function whereCond()
    {
        // $items=Product::draft()->get();
        $items=Product::status('published')->get();

        return $items;
    }

        public function whereCond2()
    {
        $items=Product::draft()->get();

        return $items;
    }
}
