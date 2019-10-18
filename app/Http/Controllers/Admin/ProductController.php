<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product; 
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
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $image = $request->image;
        $new_name = rand() . '.' . $image-> getClientOriginalExtension();
        $image->move(public_path('/uploads'),$new_name);
        Product::create(array_merge(['image'=>$new_name,'image_url'=>'http://127.0.0.1:8888/laravel/ishop/public/uploads/'.$new_name,'user_id'=>auth()->user()->id],$request->except(['image'])));
        
        return redirect(route('admin.product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function test(Request $request){
        dd($request->product);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.edit_product', compact('product'));
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
        // dd($request->all());
        $product=Product::where('id',$id);
        // dd($product->first()->image);
        $arr=[
            'product_name'=>$request->product_name,
            'product_description'=>$request->product_description,
            'product_category'=>$request->product_category,
            'price'=>$request->price
        ];
        if ($request->image != null){
            $url=__DIR__.'../../../../../public/uploads/'.$product->first()->image;
            File::delete($url);
            $image = $request->image;
            $new_name = rand() . '.' . $image-> getClientOriginalExtension();
            $image->move(public_path('/uploads'),$new_name);
            $arr=array_merge($arr,['image'=>$new_name,'image_url'=>'http://127.0.0.1:8888/laravel/ishop/public/uploads/'.$new_name]);
        // Product::where('id',$id)->update($request->except(['image','_token','_method']));
        }
        $product->update($arr);
        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product->delete();
        return redirect('admin/products');
    }
}
