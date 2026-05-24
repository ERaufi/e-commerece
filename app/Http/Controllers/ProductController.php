<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tags;
use App\Models\User;
use Illuminate\Container\Attributes\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('Products.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('Products.create', compact('categories', 'brands'));
    }
    public function store(ProductsRequest $request)
    {
        $product = new Product();
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->sku = $request->sku;
        $product->stock_quantity = $request->stock_quantity;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->created_by = 1;

        if ($request->hasFile('thumbnail')) {
            $product->thumbnail = $request->file('thumbnail')->store('products/thumbnails', 'public');
        }

        $product->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products/gallery', 'public');
                $product->images()->create([
                    'path' => $path,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('Products.edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->slug = $request->slug ? Str::slug($request->slug) : Str::slug($request->name);
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->sku = $request->sku;
        $product->stock_quantity = $request->stock_quantity;
        $product->stock_status = $request->stock_status;
        $product->featured = $request->featured;
        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            $product->thumbnail = $request->file('thumbnail')->store('products/thumbnails', 'public');
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products/gallery', 'public');
                $product->images()->create([
                    'path' => $path,
                ]);
            }
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function show()
    {
        // $item = Product::with('brand:id,name', 'category:id,name', 'creator', 'images', 'tags')
        // ->get();

        // $item = Tags::with('products')->get();

        $item = Brand::query()
            ->whereDoesntHave('products', function ($query) {
                return $query->where('stock_status', 'instock');
            })
            ->with(['products' => function ($query) {
                return $query->where('stock_status', '!=', 'instock');
            }])
            // ->with(['products' => function ($query) {
            //     return $query->where('id', '>', 5)
            //         ->where('stock_status', 'instock')
            //     ;
            // }])
            // withCount('products')
            // ->withSum('products', 'regular_price')
            // ->withAvg('products', 'regular_price')
            // ->withMax('products', 'regular_price')
            // ->withMin('products', 'regular_price')
            // ->withExists('products')
            // // ->whereHas('products')
            // ->whereDoesntHave('products')
            ->get();
        return $item;
    }
}
