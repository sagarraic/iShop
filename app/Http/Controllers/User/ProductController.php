<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Auth;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.content');
    }
    
    public function homepage()
    {
        $products = Product::all();
        return view('product.content', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = request('image');
        $new_name = rand() . '.' . $image-> getClientOriginalExtension();
        $image->move(public_path('/uploads'),$new_name);
        Product::create(array_merge(['image'=>$new_name,'image_url'=>'http://127.0.0.1:8888/laravel/ishop/public/uploads/'.$new_name,'user_id'=>1],$request->except(['image'])));

        return redirect(route('homepage'))->with('success','Image upload successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.show',compact('product'));
    }

    public function myproducts(Product $product)
    {
        $user_id = auth()->user()->id;
        $product = Product::where('user_id',$user_id)->get();
        return view('product.myproducts',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update(request(['product_name','product_description','product_category','price','image']));
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
