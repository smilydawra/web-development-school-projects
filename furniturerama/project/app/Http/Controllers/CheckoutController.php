<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Pagerange\Bx\_5bx;
use \App\Order;
use \App\Transaction;

use \App\Cart;
use \App\User;
use \App\Tax;
use \App\Furniture;
use\App\Promotion;

use Session;

class CheckoutController extends Controller
{
    public function index()
	{
        $title= "Checkout";
        //taxes calculation
        $id=Auth::id();
        $tax_rates = Tax::where('province', Auth::user()->province)->first();
        //dd($tax_rates['HST']);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        session()->put('sub_total', $cart->totalPrice);
        if($tax_rates['GST'] && $tax_rates['PST']) {
            $pst = $tax_rates['GST'] * $cart->totalPrice;
            $gst = $tax_rates['PST'] * $cart->totalPrice;
            $hst = 0;
        } elseif($tax_rates['HST']) {
            $pst = 0;
            $gst = 0;
            $hst = $tax_rates['HST'] * $cart->totalPrice;
            //dd($hst);
        } elseif($tax_rates['PST']) {
            $pst = $tax_rates['PST'] * $cart->totalPrice;
            $gst = 0;
            $hst = 0;
        } elseif($tax_rates['GST']) {
            $pst = 0;
            $gst = $tax_rates['GST'] * $cart->totalPrice;
            $hst = 0;
        }

        //shipping
        if(($cart->totalPrice) <= 499){
            $shipping = 50;
        } else {
            $shipping = 0;
        }

        //total
        $total = $cart->totalPrice + $gst + $pst + $hst + $shipping;
        //dd($gst . ' ' . $hst . ' ' . $pst . ' ' . $shipping . ' '  . $total);
        return view('/furnitures/checkout', ['furnitures' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' =>$cart->totalQty], compact('title', 'gst', 'hst', 'pst', 'shipping', 'total'));
    }

	public function promotion(Request $request)
	{
		$coupon = Promotion::where('promotionCode', $request->coupon_code)->first();
		$oldCart = Session::get('cart');
		$cart = new Cart($oldCart);
		if(!$coupon){
			return redirect()->back()->with('error', 'Invalid Coupon Code. Please try again.');
		}

		session()->put('coupon', [
			'name' =>$coupon->promotionCode,
			'discount' =>$coupon->discount($cart->totalPrice),
            'promotionAmount'=>$coupon->promotionAmount
		]);


		//taxes calculation
        $id=Auth::id();
        $tax_rates = Tax::where('province', Auth::user()->province)->first();

		$discount = session()->get('coupon')['discount'];

		$cart->totalPrice = $cart->totalPrice - $discount;
        session()->put('sub_total', $cart->totalPrice);

		//dd($discount . ' ' . $cart->totalPrice);
		if($tax_rates['GST'] && $tax_rates['PST']) {
            $pst = $tax_rates['GST'] * $cart->totalPrice;
            $gst = $tax_rates['PST'] * $cart->totalPrice;
            $hst = 0;
        } elseif($tax_rates['HST']) {
            $pst = 0;
            $gst = 0;
            $hst = $tax_rates['HST'] * $cart->totalPrice;
            //dd($hst);
        } elseif($tax_rates['PST']) {
            $pst = $tax_rates['PST'] * $cart->totalPrice;
            $gst = 0;
            $hst = 0;
        } elseif($tax_rates['GST']) {
            $pst = 0;
            $gst = $tax_rates['GST'] * $cart->totalPrice;
            $hst = 0;
        }

		//shipping
        if(($cart->totalPrice) <= 499){
            $shipping = 50;
        } else {
            $shipping = 0;
        }

		//total
        $total = $cart->totalPrice + $gst + $pst + $hst + $shipping;
		//dd($total);

		// return redirect()->back()->with('success', 'Coupon Code succesfully applied.');

		return view('/furnitures/checkout', ['furnitures' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' =>$cart->totalQty], compact('gst', 'hst', 'pst', 'shipping', 'total'))->with('success', 'Coupon Code succesfully applied.');

	}

	public function removeCoupon(){
		session()->forget('coupon');
		return $this->index()->with('success', 'Coupon has been removed.');
	}

    /**
     * Handle post submission from checkout
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function checkout(Request $request){
        //taxes calculation
        $id=Auth::id();
        $tax_rates = Tax::where('province', Auth::user()->province)->first();
        $oldCart = Session::get('cart');
        $sub_total= session()->get('sub_total');
        $cart = new Cart($oldCart);
        //dd($cart);

        if($tax_rates['GST'] && $tax_rates['PST']) {
            $pst = $tax_rates['GST'] * $sub_total;
            $gst = $tax_rates['PST'] * $sub_total;
            $hst = 0;
        } elseif($tax_rates['HST']) {
            $pst = 0;
            $gst = 0;
            $hst = $tax_rates['HST'] * $sub_total;
            //dd($hst);
        } elseif($tax_rates['PST']) {
            $pst = $tax_rates['PST'] * $sub_total;
            $gst = 0;
            $hst = 0;
        } elseif($tax_rates['GST']) {
            $pst = 0;
            $gst = $tax_rates['GST'] * $sub_total;
            $hst = 0;
        }
        //shipping
        if(($sub_total) <= 499){
            $shipping = 20;
        } else {
            $shipping = 0;
        }
        //Round total
        $total = $sub_total + $gst + $pst + $hst + $shipping;
        $total = round($total,2);
        //Round Tax
        $gst = round($gst,2);
        $hst = round($hst,2);
        $pst = round($pst,2);

        // make order
        
        $valid = $request->validate([
            'orderaddress' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
            'orderprovince' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'ordercity' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'orderpostalcode' => ['required', 'string', 'max:255', 'regex:/^[a-zA-z][\d][a-zA-z][\s]?[\d][a-zA-z][\d]$/'],
            'paymentname' => ['required', 'string', 'max:255','regex:/^([A-Za-z\s]{1,255})$/'],
            'orderfirstname' => ['required', 'string', 'max:255','regex:/^([A-Za-z]{1,255})$/'],
            'orderlastname' => ['required', 'string', 'max:255','regex:/^([A-Za-z]{1,255})$/'],
            'orderemail' => ['required', 'string', 'max:255','regex:/^([\w]{1,32}[\!\-\.]?[\w]{1,32})@([\w]{1,32})\.([a-z]{2,12})$/'],
            'orderphonenumber' => ['required', 'string', 'max:255', 'regex:/^([\d]{3}(\.)[\d]{3}(\.)[\d]{4})|([\d]{3}(\-)[\d]{3}(\-)[\d]{4})|(\([\d]{3}\)(\s)[\d]{3}(\-)[\d]{4})|([\d]{10})$/'],
            'cardtype'=>['required'],
        ]);
        $order = Order::create([
            'user_id'=>$id,
            'transactionStatus'=>'incomplete',
            'creditCard' => substr($_POST['paymentnumber'],11,4),
            'shippingStreet' => $valid['orderaddress'],
            'shippingProvince' => $valid['orderprovince'],
            'shippingCity' => $valid['ordercity'],
            'shippingPost' => $valid['orderpostalcode'],
            'shippingCost' => '500',
            'shippingStatus' => 'pending',
            'subtotal' => $sub_total,
            'finalPrice' => $total,
            'GST' => $gst,
            'HST' => $hst,
            'PST' => $pst
        ]);
        //dd($order->id);
        $order = Order::find($order->id);
        $furniture = Furniture::all();

        //dd($cart->items[1]['item']->id);
        //dd($cart->items);
        foreach($cart->items as $item){
            // echo($cart->items[$i]['item']->id);
            $order->furnitures()->attach($item['item']->id,['quantity' => $item['qty'], 'itemPrice' => $item['price']]);
        }

        // VALIDATION

        // $valid = $request->validate([
        //     'orderpromocode' => '',

        //     'orderfirstname' => 'required|numeric',
        //     'orderlastname' => 'required|string|max:100',

        //     'orderemail' => 'required|string|max:100',

        //     'orderaddress' => 'required|string|max:100',
        //     'orderprovince' => 'required|numeric',
        //     'orderpostalcode' => 'required',
        //     'orderphonenumber' => 'required|image',
        //     'ordercity' => 'required|string|max:45',
        //     'ordercountry' => 'required|max:10',

        //     'paymentname' => 'required|string',
        //     'paymentnumber' => 'required|integer'
        //     'paymentexpire' => 'required|integer'
        //     'paymentcvv' => 'required|integer'
        // ]);

        $paymentname = $_POST['paymentname'];
        $paymentnumber = $_POST['paymentnumber'];
        $paymentexpire = $_POST['paymentexpire'];
        $paymentcvv = $_POST['paymentcvv'];
        $cardtype = $_POST['cardtype'];

        $transaction = new _5bx('5664602', 'RMQVOgXHNwWO81Qutfci98k2uFf83A0PQrC2n2D0nfCAfKQO26KFtMQLr6QQnr9X');

        $transaction->amount($total);
        $transaction->card_num($paymentnumber);
        $transaction->exp_date ($paymentexpire);
        $transaction->cvv($paymentcvv);
        $transaction->ref_num('2011099');
        $transaction->card_type($cardtype);

        $response = $transaction->authorize_and_capture(); // returns JSON object
        //dd($response);
        if($response->transaction_response->response_code == 1) {

        // update order status
            $order->update([
            'user_id'=>$id,
            'transactionStatus'=>'complete',
            ]);

        // save transaction info in transaction table
        $transaction_db = Transaction::create([
            'order_id' => $order->id,
            'transactionStatus'=> 'COMPLETE',
            'transactionCode'=>$response->transaction_response->response_code
        ]);
        // Clear cart from session
          	Session::forget('cart');
            Session::forget('coupon');
        // redirect to thankyou page
          	//return Redirect::route('clients.show, $id')->with( ['data' => $data] );
          	$reciept = [
          		'order'=>$order->id,
            	'total'=>$total,
            	'auth_code'=>$response->transaction_response->auth_code,
          		];

            return view('/furnitures/thankyou')->withErrors($reciept);

        } else {
             // redirect back() to payment with $response->errors;
             // save transaction info in transaction table
            return redirect()->back()->withInput()->withErrors($response->transaction_response->errors);
        }
    }
}
