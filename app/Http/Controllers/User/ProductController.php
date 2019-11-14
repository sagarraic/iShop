<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Auth;
use File;
use Illuminate\Support\Facades\Validator;

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
    // public function store(Request $request)
    // {
    //     $image = request('image');
    //     $new_name = rand() . '.' . $image-> getClientOriginalExtension();
    //     $image->move(public_path('/uploads'),$new_name);
        
    //     Product::create(array_merge(['image'=>$new_name,'image_url'=>'http://127.0.0.1:8888/laravel/ishop/public/uploads/'.$new_name,'user_id'=>1],$request->except(['image'])));

    //     return redirect(route('homepage'))->with('success','Image upload successfully');
    // }

    public function store(Request $request)
    {
        $image = request('image');
        $new_name = rand() . '.' . $image-> getClientOriginalExtension();
        $image->move(public_path('/uploads'),$new_name);
        
        Product::create(array_merge(['image'=>$new_name,'image_url'=>'http://127.0.0.1:8888/laravel/ishop/public/uploads/'.$new_name,'user_id'=>1],$request->except(['image'])));

        return redirect(route('homepage'))->with('success','Image upload successfully');
    }

    public function storeapi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name'=>'required',
            'product_description'=>'required',
            'product_category'=>'required',
            'user_id'=>'required',
            'price'=>'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('product_name')) {
                $errormessage = $errors->first('product_name');
            }
            return response()->json(['status'=> true, 'message' => $errormessage]);
        }

        $image = request('image');
        $new_name = rand() . '.' . $image-> getClientOriginalExtension();
        $image->move(public_path('/uploads'),$new_name);
        
        $saved = Product::create(array_merge(['image'=>$new_name,'image_url'=>'http://127.0.0.1:8888/laravel/ishop/public/uploads/'.$new_name,'user_id'=>1],$request->except(['image'])));

        if (!$saved) {
            return response()->json(['status'=> false, 'message' => 'Something went wrong, please check again.']);
        }

        return response()->json(['status'=> true, 'message' => 'Your data has been saved successfully.']);
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
        // dd($product->toArray());
        return view('product.myproducts',compact('product'));
    }

    public function myproductsApi(Product $product)
    {
        $user_id = auth()->user()->id;
        $product = Product::where('user_id',$user_id)->get();

        return $product;
        // dd($product->toArray());
        // return view('product.myproducts',compact('product'));
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

    // public function editapi(Product $product, $id)
    // {
    //     $product = Product::where('id',$id)->get()->first();
    //     $product_id = $product->id;

    //     if(!$product) {
    //         return response()->json(['error'=>false, 'message' => 'There went something error during retrieving the product. Please try again.']);
    //     }
    //     else {
    //         return response()->json(['error'=>true, 'data' => ['product_id'=>$product_id]]);
    //     }

    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd($product);
        $product->update(request(['product_name','product_description','product_category','price','image']));
        return redirect('/products');
    }

    public function updateapi(Request $request, $id) 
    {
        $product_id = Product::find($id);
        if(!$product_id) 
        {
            return response()->json(['status'=> false, 'message' => 'There was something wrong during updating the product' ]);
        } 
        
        $array = $request->all();
        // return response()->json(['status'=> $array]);
        $saved = $product_id->update($array);


        if(!$saved)
        {
            return response()->json(['status'=> false, 'message' => 'Your product has not been updated successfully' ]);
        } else {
            return response()->json(['status'=> true, 'message' => 'Your product has been updated successfully' ]);
        }
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

    public function destroyapi($id)
    {
        $product_id = Product::find($id);
        $saved = $product_id->delete();
        if(!$saved)
        {
            return response()->json(['status'=> false, 'message' => 'Your product has not been deleted successfully' ]);
        } else {
            return response()->json(['status'=> true, 'message' => 'Your product has been deleted successfully' ]);
        }
    }

    public function test()
    {
        return response()->json(['error'=> 'test']);
    }
}
