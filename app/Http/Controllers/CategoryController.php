<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
        $categories = Categories::all();
        return view('Admin.Categories.index', compact('categories'));
    }

    
    public function create(Categories $category)
    {
        return view('Admin.Categories.create',compact('category'));
    }

    public function store(Request $request,Categories $category)
    {
        $attributes = $request->validate([
            'title'=>'required',
            'image'=>'image|required'
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }
        // dd($request->all());

        $category = Categories::create([
            'title'=>$request->title,
            'image'=>$request->image->getClientOriginalName(),
        ]);



        session()->flash('msg','The Tag has been Created');

        return redirect('admin/categories');
    }

   
    public function show(Categories $category)
    {
        return view('Admin.Categories.details', compact('category'));
    }

    public function edit(Categories $category)
    {
        return view('Admin.Categories.edit', compact('category'));
    }

    public function update(Request $request, Categories $category)
    {
        $attributes = $request->validate([
            'title'=>'required',
            'image'=>'image|required'    
        ]);

        // dd($request->all());
        if($request->hasFile('image')){
            if(file_exists(public_path('uploads/').$category->image)){
                unlink(public_path('uploads/').$category->image);
            }
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
            $category->image =  $request->image->getClientOriginalName();
        }
        $category->update([
             'title'=>$request->title,
             'image'=>$category->image,
            
        ]);

        session()->flash('msg','Your Category Has been Updated');

        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tags  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $category->delete();

        session()->flash('msg','The Tag Has been Deleted!!');

        return redirect('admin/categories');
    }
}
