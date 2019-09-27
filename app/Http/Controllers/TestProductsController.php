<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
    	$products = Product::all();

    	return view('products.index', compact('products'));
    }

    public function create() {
    	return view('products.create');
    }

    public function store() {
        Product::create(request(['product_name','product_description','product_category']));
        return redirect('/products');
    }

    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    public function update(Product $product) {
        $product->update(request(['product_name','product_description','product_category']));
        return redirect('/products');
    }

    public function destroy(Product $product) {
        $product->delete();

        return redirect('/products');
    }

    public function show(Product $product) {

        return view('products.show', compact('product'));
    }    
}
