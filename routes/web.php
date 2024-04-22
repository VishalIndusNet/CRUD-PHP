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

Route::post('/products/store',[Productcontroller::class,'store'])
->name('products.store');

Route::get('/products/{id}/edit',[Productcontroller::class,'edit'])
->name('products.edit');

Route::put('/products/{id}/update',[Productcontroller::class,'update'])
->name('products.update');

Route::delete('/products/{id}/delete',[Productcontroller::class,'destroy']);

Route::get('products/{id}/show',[Productcontroller::class,'show']);

// Route:: get('/post',function(){
//     return view('post');
//     // return "<h1>post page</h1>";
// });

// Route :: view('post','/post');

// Route:: get('/first',function(){
//     return view('first');
// });