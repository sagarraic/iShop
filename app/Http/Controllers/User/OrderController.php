<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        // foreach ($orders as $order) {
        //     dump($order->id);
        //     dump($order->user->email);
        //     dump($order->product->product_name);

        //     dump($order->product->image);
        //     # code...
        // }
        return view('order.content',compact('orders'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alreadySelected = Order::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->where('status',0)->count();

        if($alreadySelected == 0){
        $array = [
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'status' => 0, 
        ]; 

        Order::create($array);
        }
        
        return redirect('/orders' );
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
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/orders');
    }

    public function checkout_register(){
        $status = Order::where('status',0)->where('user_id',Auth::user()->id);
        $status->update([
            'status'=> 1,
        ]);
        return view('order.checkout_register');
    }

    public function bill_details(){
        return view('order.bill_details');
    }
}
