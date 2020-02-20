<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   
    public function index(Product $products)
    {
        $categories = Categories::all();
        $products = Product::get();
        // dd($products);
        return view('Admin.products.index', compact('products','categories'));
    }

    
    public function create(Product $product)
    {
        $categories = Categories::all();
        return view('Admin.Products.create' , compact('product','categories'));
    }

    public function store(Request $request , Product $product)
    {
        $attributes = $request->validate([
            'title'=>'required',
            'category'=>'required',
            'image'=>'image|required'
        ]);

        // dd($attributes);
        if($request->hasFile('image')){
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }
        // dd($request->all());


        Product::create([
            'title'=>$request->title,
            'image'=>$request->image->getClientOriginalName(),
            'category_id'=>$request->category
        ]);
      
        

        session()->flash('msg','The Product has been Created');

        return redirect('admin/products');
    }

   
    public function show(Product $product)
    {
        $categories = Categories::all();
                                 
        return view('Admin.products.details', compact('product','categories'));
    }

    public function edit(Product $product)
    {
                $categories = Categories::all();

        return view('Admin.Products.edit', compact('product','categories'));
    }

    public function update(Request $request, Product $product)
    {
        $attributes = $request->validate([
            'title'=>'required',
            'category'=>'required',
            'image'=>'image|required'
        ]);

        if($request->hasFile('image')){
            if(file_exists(public_path('uploads/').$product->image)){
                unlink(public_path('uploads/').$product->image);
            }
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
            $product->image =  $request->image->getClientOriginalName();
        }

        $product->update([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'image'=>$product->image
        ]);

        session()->flash('msg','Your Product Has been Updated');

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        session()->flash('msg','The Product Has been Deleted!!');

        return redirect('admin/products');
    }
}
