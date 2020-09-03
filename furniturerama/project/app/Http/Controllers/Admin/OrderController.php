<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\User;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'Order Table';
        $orders = Order::all();
        $user = User::all();
        return view('/admin/order/view',compact('title','orders','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Order";
        $order = Order::all();
        $user = User::all();
        return view('/admin/order/add',compact('title','order','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'user_id' => 'required|integer',
            'shippingStreet' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
            'shippingProvince' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'shippingCity' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'shippingPost' => ['required', 'string', 'max:255', 'regex:/^[a-zA-z][\d][a-zA-z][\s]?[\d][a-zA-z][\d]$/'],
            'shippingCost' => 'required|numeric',
            'shippingStatus' => 'required|string',
            'subtotal' => 'required|numeric',
            'GST' => 'required|numeric',
            'HST' => 'required|numeric',
            'finalPrice' => 'required|numeric'
        ]);

        Order::create([
            'shippingStreet' => $valid['shippingStreet'],
            'shippingProvince' => $valid['shippingProvince'],
            'shippingCity' => $valid['shippingCity'],
            'shippingPost' => $valid['shippingPost'],
            'shippingCost' => $valid['shippingCost'],
            'shippingStatus' => $valid['shippingStatus'],
            'subtotal' => $valid['subtotal'],
            'GST' => $valid['GST'],
            'HST' => $valid['HST'],
            'finalPrice' => $valid['finalPrice'],
        ]);

        return redirect('/admin/order/view')->with('success', 'Your new order was saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update an Order";
        $order = Order::find($id);
        $user = User::all();
        return view('/admin/order/edit',compact('title','order','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'user_id' => 'required|integer',
            'shippingStreet' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
            'shippingProvince' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
            'shippingCity' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
            'shippingPost' => ['required', 'string', 'max:255', 'regex:/^[a-zA-z][\d][a-zA-z][\s]?[\d][a-zA-z][\d]$/'],
            'shippingCost' => 'required|numeric',
            'shippingStatus' => 'required|string',
            'subtotal' => 'required|numeric',
            'GST' => 'required|numeric',
            'HST' => 'required|numeric',
            'PST' => 'required|numeric',
            'finalPrice' => 'required|numeric'
        ]);

        $order = Order::find($valid['id']);

        $order->user_id= $valid['user_id'];
        $order->shippingStreet= $valid['shippingStreet'];
        $order->shippingProvince= $valid['shippingProvince'];
        $order->shippingCity= $valid['shippingCity'];
        $order->shippingPost= $valid['shippingPost'];
        $order->shippingCost= $valid['shippingCost'];
        $order->shippingStatus= $valid['shippingStatus'];
        $order->subtotal= $valid['subtotal'];
        $order->GST= $valid['GST'];
        $order->HST= $valid['HST'];
        $order->PST= $valid['PST'];
        $order->finalPrice= $valid['finalPrice'];
       

        if( $order->save() ) {
            return redirect('/admin/order/view')->with('success', 'Order has been successfully updated!');
        }

        return redirect('/admin/order/view')->with('error', 'There was a problem updating the order!');

    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer'
        ]); 

        if(Order::find($valid['id'])->delete() ){
            return back()->with('success', 'Order has been deleted!'); 
        } 
            return back()->with('error', 'There was a problem deleting the Order'); 
    }

    public function filterShipping()
    {
        if(request()->has('shippingStatus')){
            $orders = Order::where('shippingStatus', request('shippingStatus'))->paginate(10)->appends('shippingStatus', request('shippingStatus'));
        }else{
            $orders = Order::all();
        }
        $title = 'Order Table';
        $user = User::all();
        return view('/admin/order/filterShipping',compact('title','orders','user'));
    }

    public function filterTransaction()
    {
        if(request()->has('transactionStatus')){
            $orders = Order::where('transactionStatus', request('transactionStatus'))->paginate(10)->appends('transactionStatus', request('transactionStatus'));
        }else{
            $orders = Order::all();
        }
        $title = 'Order Table';
        $user = User::all();
        return view('/admin/order/filterTransactions',compact('title','orders','user'));
    }

}
