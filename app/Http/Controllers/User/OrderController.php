<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Auth;
use App\Product;
use App\Billing;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Order::with('product')->where('user_id',Auth::user()->id)->where('status',0)->get();
        $total_price = collect($total)->sum('product.price');
        $orders = Order::where('user_id',Auth::user()->id)->where('status',0)->get();
        // dd($orders->isEmpty());
        return view('order.content',compact('orders','total_price'));  
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
        
        return view('order.checkout_register');
    }

    public function bill_details(Request $request){
        // $orders = $request->all();
        $country = $request->country;
        $state = $request->state;
        $zip = $request->zip;
        //bill create
        //total
        // dd($request->total_price);
        $bill=Billing::create(['total'=>$request->total_price]);
        $bill_id = $bill->id;

        $query = Order::where('status',0)->where('user_id',Auth::user()->id);
        $query->update([
            // 'status'=> 1,
            //bill id
            'country'=>$country,
            'state'=>$state,
            'zip'=>$zip,
            'billing_id' =>$bill_id,
        ]);
        //
        return redirect('/users/order/bill_details');
    }

    public function bill_details_show()
    {
        $query = Order::with('billing')->where('user_id',Auth::user()->id)->where('status',0)->get();
        $bill_id = $query->first()->billing;

        return view('order.bill_details',compact('bill_id'));
    }

}
