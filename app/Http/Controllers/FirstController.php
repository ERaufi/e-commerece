<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstController extends Controller
{
    //
    protected $name;

    public function __construct()
    {
        $this->name='my name';
    }

    public function index()
    {
        return $this->name;
        // return $this->abc();
        return 'hi from controller';
    }

    public function aboutus($id,$name)
    {
        // return 'the id is '.$id . 'the name is '.$name;
        return view('aboutus',compact('id','name'));
    }

    private function abc()
    {
        return 'this is private function';
    }
}
