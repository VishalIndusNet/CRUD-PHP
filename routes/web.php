<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Productcontroller;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Productcontroller::class,'index'])
->name('products.index');

Route::get('/products/create',[Productcontroller::class,'create'])
->name('products.create');


// Route:: get('/post',function(){
//     return view('post');
//     // return "<h1>post page</h1>";
// });

// Route :: view('post','/post');

// Route:: get('/first',function(){
//     return view('first');
// });