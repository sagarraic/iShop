<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_name'=>'required',
            'category_description'=>'required',
        ]);
        $image = $request->image;   
        $new_name = rand() . '.' . $image-> getClientOriginalExtension();
        $image->move(public_path('/uploads'),$new_name);
        Category::create(array_merge(['image'=>$new_name,'image_url'=>'http://127.0.0.1:8888/laravel/ishop/public/uploads/'.$new_name],$request->except(['image'])));

        return redirect(route('admin.category'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.show_category',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category=Category::where('id',$id);
        $array = [
            'category_name' => $request->category_name,
            'category_description' => $request->category_description
        ];
        if ($request->image != null) {
            $url=__DIR__.'../../../../../public/uploads/'.$category->first()->image;
            File::delete($url);
            $image = $request->image;
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/uploads'),$new_name);
            $array = array_merge($array,['image'=>$new_name,'image_url'=>'http://127.0.0.1:8888/laravel/ishop/public/uploads/'.$new_name]);
        }
        $category->update($array);
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $url=__DIR__.'../../../../../public/uploads/'.$category->image;
        File::delete($url);
        $category->delete();
        return redirect('admin/categories');
    }
}
