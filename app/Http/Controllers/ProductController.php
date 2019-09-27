<?php

namespace App\Http\Controllers;
use App\Product;
use Auth;

use Illuminate\Http\Request;

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
        return view('product.content');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request, $id)
    // {
    //     $user_id = Auth::user()->id;
    //     Product::create(request(['product_name', 'product_description', 'product_category', 'user_id' , 'image', 'image_url']));
    //     return view('products.create');
    // }

    public function store() {
        $products = new Product();
        $products->product_name = request('product_name');
        $products->product_description = request('product_description');
        $products->product_category = request('product_category');
        $products->user_id = Auth::user()->id;
        $products->image = request('image');
        $products->image_url = request('image_url');
        $products->save();

        return redirect('/products');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showAll()
    {
        $product=Product::all();
        // dd($user);
        return view('product.show',compact('product'));
    }
    
    public function show($id)
    {
        // dd($user);
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
