<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class Productcontroller extends Controller
{
    //
    public function index(){

        return view('products.index',[
            'products'=> Product::paginate(5)
        ]);
    }
    public function create(){
        return view('products.create');
    } 

    public function store(Request $request){

       $request->validate([
        'name'=> 'required',
        'description'=> 'required',
        'image'=> 'required|mimes:png,jpg,jpeg|max:10000'
       ]);

    //    dd($request->all());
        $imageName = time(). '.'.$request->image->extension();
        $request->image->move(public_path('products'),$imageName);
      //  dd($imageName);
      $product = new Product;
      $product->image =  $imageName ;
      $product->name =  $request->name;
      $product->description = $request->description;

      $product->save();
      return back()->withSuccess('Product Created');
        // return view('products.store');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit',[
            'product'=> $product
        ]);
    }
        public function update(Request $request,$id){
            // dd($request->all());
            $request->validate([
                'name'=> 'required',
                'description'=> 'required',
                'image'=> 'nullable|mimes:png,jpg,jpeg|max:10000'
               ]);

               $product = Product::where('id',$id)->first();
        
            if(isset($request->image)){
                $imageName = time(). '.'.$request->image->extension();
                $request->image->move(public_path('products'),$imageName);
                $product->image =  $imageName ;
            }
              
              $product->name =  $request->name;
              $product->description = $request->description;
        
              $product->save();
              return back()->withSuccess('Product Updated');
        }

        public function destroy($id){
          $product = Product::where('id',$id)->first();
          $product-> delete();
          return back()->withSuccess('Product delete');
        }

        public function show($id){
            $product = Product::where('id',$id)->first();
        
            return view('products.show',['product'=> $product]); 
          }
    }

