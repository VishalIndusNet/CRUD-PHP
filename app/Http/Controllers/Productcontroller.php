<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Productcontroller extends Controller
{
    //
    public function index(){
        return view('products.index');
    }
    public function create(){
        return view('products.create');
    }
}