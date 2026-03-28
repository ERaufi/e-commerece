<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return Category::all();
    }

    public function add()
    {
        $item=new Category();
        $item->name='First Category 111';
        $item->slug='first_slug 1111';
        $item->image='this is image';
        $item->save();

        return 'added successfully';
    }


    public function show($id)
    {
        $item=Category::findOrFail($id);

        return $item;
    }

    public function update($id)
    {
        $item=Category::findOrFail($id);
        $item->name='new and updated name';
        $item->update();

        return 'updated successfully';

    }

    public function delete($id)
    {
        $item=Category::findOrFail($id);
        $item->delete();

        return 'deleted successfully';
    }
}
