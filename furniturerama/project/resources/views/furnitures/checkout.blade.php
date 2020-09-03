@extends('layouts.main')

@section('content')
<div class='container bg-white mt-5 mb-3 pb-4' >
    <div class="col pb-4">
        <small>
            <ul class="breadcrumb bg-white mt-2">
                <li><a href="/" class="text-dark">HOME</a> </li>&nbsp;
                <li>/ <a href="/checkout" class="text-dark">CHECKOUT</a></li>&nbsp;
            </ul>
        </small>
        <h1 class="ml-2 text-muted font-weight-bold" style="font-size:2.2em;">{{ $title ?? '' }}</h1>

        <table class="table font-weight-bold text-muted table-responsive-md">
            <tr class="text-dark">
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
			@foreach($furnitures as $furniture)
            <tr>
                <td><img src="{{ $furniture['item']['image']}}" width=120 height=120 alt="{{ $furniture['item']['name']}}"></td>
                <td>{{ $furniture['item']['name'] }}
                    <br />
                </td>
                <td>${{ number_format($furniture['item']['cost'], 2) }}</td>
                <td><p style="width: 60px;">{{ $furniture['qty'] }}</p></td>
                <td>${{ number_format($furniture['price']*$furniture['qty'], 2) }}</td>
            </tr>
			@endforeach
        </table>
        <div class="row my-3">
            <div class="col-md-5">

            </div>
            <div class="col-md-7">
                <table style="margin-left:50%;" class="table-sm">
                    <tr class="font-weight-bold text-muted">
                        <td>No. of Items:</td>
						<td></td>
                        <td class="text-right"> {{ $totalQty }}</td>
						<td></td>

                    </tr>
                    <hr/>
					@if(!session()->has('coupon'))
					<!-- Subtotal -->
                    <tr class="font-weight-bold text-muted">
                        <td>Subtotal:</td>
						<td></td>
                        <td class="text-right">${{ number_format($totalPrice, 2)}}</td>
						<td></td>
                    </tr>
					@endif
					<!-- discount -->
					@if(session()->has('coupon'))
					<!-- Subtotal -->
                    <tr class="font-weight-bold text-primary">
                        <td>New Subtotal:</td>
						<td></td>
                        <td class="text-right">${{ number_format($totalPrice, 2)}}</td>
						<td></td>
                    </tr>
                    <tr class="font-weight-bold text-success">
                        <td>{{ session()->get('coupon')['promotionAmount'] }}%({{ session()->get('coupon')['name'] }})  &nbsp;
						</td>
						<td></td>
                        <td class="text-right"> -${{ number_format(session()->get('coupon')['discount'], 2) }}
						</td>
						<td>
						<form class="" action="/checkoutRemovePromotion" method="post">
							@csrf
							<input class="btn btn-light btn-sm" type="submit" value="remove">
						</form>
						</td>
                    </tr>
					@endif
					<!-- taxes -->
					@if(($gst != 0) && ($pst != 0))
                    <tr  class="font-weight-bold text-muted">
                        <td>GST:</td>
						<td></td>
                        <td class="text-right">${{ number_format($gst, 2) }}</td>
						<td></td>
                    </tr>
					<tr class="font-weight-bold text-muted">
                        <td>PST:</td>
						<td></td>
                        <td class="text-right">${{ number_format($pst, 2) }}</td>
						<td></td>
                    </tr>
					@elseif($hst != 0)
                    <tr class="font-weight-bold text-muted">
                        <td>HST:</td>
						<td></td>
                        <td class="text-right">${{ number_format($hst, 2) }}</td>
						<td></td>
                    </tr>
					@else
					<tr class="font-weight-bold text-muted">
                        <td>GST:</td>
						<td></td>
                        <td class="text-right">${{ number_format($gst, 2) }}</td>
						<td></td>
                    </tr>
					@endif
					<!-- shipping -->
					<tr class="font-weight-bold text-muted">
                        <td>Shipping:</td>
						<td></td>
                        <td class="text-right">${{ number_format($shipping,2) }}</td>
						<td></td>
                    </tr>

					<!-- Total -->
                    <tr class="font-weight-bold text-danger">
                        <td>Total:</td>
						<td></td>
                        <td class="text-right">${{ number_format($total,2) }}</td>
						<td></td>
                    </tr>
                </table>
				<hr/>
            </div>
        </div>
        @if(count($errors) >0)
            <div class='alert alert-danger'>
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="text-align: center; list-style-type: none;">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-4">
                    <!--PROMO CODE-->

                    <div class="form-group">
                        @if(!session()->has('coupon'))
                            <form class="card p-2" method="post" action="/checkoutAddPromotion">
                                @csrf
                                <div class="input-group">
                                      <input type="text" class="form-control" name="coupon_code" autofocus placeholder="Discount Code">
                                      <div class="input-group-append">
                                        <button type="submit" class="btn btn-secondary">Redeem</button>
                                      </div>
                                      @error('orderpromocode')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror

                                </div>
                              </form>
                              @endif
                    </div>
                    <!-- end promo code -->

                </div>
            </div>
		<div class="row">

		<div class="col-md-12">
			<h3 class="ml-2 text-muted font-weight-bold">Billing Address</h3>
			<address class="ml-4 text-dark font-weight-normal">
			 	{{ Auth::user()->userFirstName }} &nbsp; {{ Auth::user()->userLasttName }} <br/>
				{{ Auth::user()->street }},
				{{ strtoupper(Auth::user()->post) }} <br/>
				{{ Auth::user()->city }},
				{{ Auth::user()->province }}
			</address>
			<hr/>
        <!-- ROUTE REGISTER / CHANGE TO CHECKOUT-CART -->
        <form method="post" action="/checkout">
                @csrf
            <h3 class="ml-2 text-muted font-weight-bold">Delivery Address</h3>
            <div class="row ml-2">
                <div class="col-md-6">
                    <!--First Name-->
                    <div class="form-group">
                        <label for="orderfirstname">{{ __('First Name') }}</label>
                            <input id="orderfirstname" type="text" class="form-control @error('orderfirstname') is-invalid @enderror" name="orderfirstname" value="{{ old('orderfirstname') }}" required autocomplete="orderfirstname" autofocus>

                            @error('orderfirstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <!--Last Name-->
                    <div class="form-group">
                        <label for="orderlastname">{{ __('Last Name') }}</label>
                            <input id="orderlastname" type="text" class="form-control @error('orderlastname') is-invalid @enderror" name="orderlastname" value="{{ old('orderlastname') }}" required autocomplete="orderlastname" autofocus>

                            @error('orderlastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <!--Email Address-->
                    <div class="form-group">
                        <label for="orderemail">{{ __('Email Address') }}</label>
                            <input id="orderemail" type="text" class="form-control @error('orderemail') is-invalid @enderror" name="orderemail" value="{{ old('orderemail') }}" required autocomplete="orderemail" autofocus>

                            @error('orderemail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <!--Address-->
                    <div class="form-group">
                        <label for="orderaddress">{{ __('Address') }}</label>
                            <input id="orderaddress" type="text" class="form-control @error('orderaddress') is-invalid @enderror" name="orderaddress" value="{{ old('orderaddress') }}" required autocomplete="orderaddress" autofocus>

                            @error('orderaddress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <!--Province-->
                    <div class="form-group">
                        <label for="orderprovince">{{ __('Province') }}</label>
                            <input id="orderprovince" type="orderprovince" class="form-control @error('orderprovince') is-invalid @enderror" name="orderprovince" value="{{ old('orderprovince') }}" required autocomplete="orderprovince">

                            @error('orderprovince')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <!--Postal Code-->
                    <div class="form-group">
                        <label for="orderpostalcode">{{ __('Postal Code') }}</label>
                            <input id="orderpostalcode" type="orderpostalcode" class="form-control @error('orderpostalcode') is-invalid @enderror" name="orderpostalcode" value="{{ old('orderpostalcode') }}" required autocomplete="orderpostalcode">

                            @error('orderpostalcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--Phone Number-->
                    <div class="form-group">
                        <label for="orderphonenumber">{{ __('Phone Number') }}</label>
                            <input id="orderphonenumber" type="text" class="form-control @error('orderphonenumber') is-invalid @enderror" name="orderphonenumber" value="{{ old('orderphonenumber') }}" required autocomplete="orderphonenumber" autofocus>

                            @error('orderphonenumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <!--City-->
                    <div class="form-group">
                        <label for="ordercity">{{ __('City') }}</label>
                            <input id="ordercity" type="text" class="form-control @error('ordercity') is-invalid @enderror" name="ordercity" value="{{ old('ordercity') }}" required autocomplete="ordercity" autofocus>

                            @error('ordercity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <!--Country-->
                    <div class="form-group">
                        <label for="ordercountry">{{ __('Country') }}</label>
                            <input id="ordercountry" type="text" class="form-control @error('ordercountry') is-invalid @enderror" name="ordercountry" value="{{ old('ordercountry') }}" required autocomplete="ordercountry" autofocus>

                            @error('ordercountry')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
            </div>
			<hr/>
            <h3 class="ml-2 text-muted font-weight-bold">Payment Info</h3>
            <div class='row ml-2'>
                <div class="col">
                    <!-- RADIO BUTTONS FOR CARD TYPE -->
                    <!-- VISA -->
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" id="visa" name="cardtype" value="visa">
                      <label class="form-check-label" for="visa">VISA</label>
                    </div>

                    <!-- MASTERCARD -->
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" id="mastercard" name="cardtype" value="mastercard">
                      <label class="form-check-label" for="mastercard">MASTERCARD</label>
                    </div>

                    <!-- AMEX -->
                    <div class="form-check form-check-inline">
                      <input type="radio" class="form-check-input" id="amex" name="cardtype" value="amex">
                      <label class="form-check-label" for="amex">AMEX</label>
                    </div>
                    <div class="form-group">
                        <label for="paymentname">{{ __('Cardholder Name') }}</label>
                            <input id="paymentname" type="text" class="form-control @error('paymentname') is-invalid @enderror" name="paymentname" value="{{ old('paymentname') }}" required autocomplete="paymentname" autofocus>

                            @error('paymentname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="paymentnumber">{{ __('Card Number') }}</label>
                            <input id="paymentnumber" type="text" class="form-control @error('paymentnumber') is-invalid @enderror" name="paymentnumber" value="{{ old('paymentnumber') }}" required autocomplete="paymentnumber" autofocus>

                            @error('paymentnumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
					<div class="form-group">
                        <label for="paymentcvv">{{ __('CVV') }}</label>
                            <input id="paymentcvv" type="text" class="form-control @error('paymentcvv') is-invalid @enderror" name="paymentcvv" value="{{ old('paymentcvv') }}" required autocomplete="paymentcvv" autofocus>

                            @error('paymentcvv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
					<div class="form-group">
						<label for="paymentexpire">{{ __('Expire Date') }}</label>
							<input id="paymentexpire" type="text" class="form-control @error('paymentexpire') is-invalid @enderror" name="paymentexpire" value="{{ old('paymentexpire') }}" required autocomplete="paymentexpire" autofocus>

							@error('paymentexpire')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
					</div>
                </div>
            </div>
            <div class="form-group text-center">
                    <a type="submit" href='/cart' class="btn btn-outline-dark ml-auto">
                        {{ __('Back to cart') }}
                    </a>
                    <input type="submit" value='Pay Now' class="btn btn-warning">
            </div>
        </form>
	</div>

    </div>
    <div class='top row align-items-center mx-0 mt-5 mb-5'>
    @include('/partials/sale_banner_bottom')
    </div>
</div> <!--/.container-->

@endsection
