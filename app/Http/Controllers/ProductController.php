<?php

namespace App\Http\Controllers;

use App\Product;
use Auth;
use File;

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

    public function store(Request $request) {

        $products = new Product();
        $products->product_name = request('product_name');
        $products->product_description = request('product_description');
        $products->product_category = request('product_category');
        $products->price = request('price');
        $products->user_id = Auth::user()->id;
        $products->image='image'.time().'.jpg';
        $request->image->move(public_path('/uploads'),$products->image);
        $products->image_url = '/uploads/'.$products->image;
        // dd($products);      
        $products->save();

        return redirect(route('homepage'));
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
        // dd($product->toArray());
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
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
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
