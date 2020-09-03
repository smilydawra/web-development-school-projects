@extends('layouts.main')

@section('content')
<div class='container bg-white mt-5' >
    <div class="col">
        <small>
            <ul class="breadcrumb bg-white mt-2">
                <li><a href="/" class="text-dark">HOME</a> </li>&nbsp;
                <li>/ <a href="/cart" class="text-dark">SHOPPING CART</a></li>&nbsp;
            </ul>
        </small>

        <h1 class="ml-2 text-muted font-weight-bold" style="font-size:2.2em;">Shopping Cart</h1>
        @if(isset(Session::get('cart')->totalQty) && Session::get('cart')->totalQty > 0)

        <table class="table table-responsive-md">
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            @foreach($furnitures as $furniture)
            <tr>
                <td><img src="{{ $furniture['item']['image']}}" alt="{{ $furniture['item']['name'] }}" width=120 height=120 class="img-fluid"></td>
                <td><a class="text-dark font-weight-bold" href="/furnitures/{{ $furniture['item']['id'] }}/detail">{{ $furniture['item']['name'] }}</a>
                    <br />

                    <form
                        onSubmit="return confirm('Do you really want to delete ' + {{ $furniture['item']['name'] }} + ' from your cart?')"
                        action="/cart/remove"
                        method="post">
                      @csrf
                      @method('DELETE') <!--telling laravel it's delete method, not post-->
                      <input type="hidden"
                             name="id"
                             value="{{ $furniture['item']['id'] }}" />
                      <button type="submit"
                              class="text-muted btn btn-link">Remove Item
                      </button>
                    </form>

                </td>
                <td class="font-weight-bold text-muted">${{ number_format($furniture['item']['cost'], 2) }}</td>
                <td class="font-weight-bold text-muted">
                    <select class="qty_chg form-control"
                            data-id="{{ $furniture['item']['id'] }}"
                            style="width: 60px" >
                        <option {{ $furniture['qty'] == 1 ? 'selected' : '' }}>1</option>
                        <option {{ $furniture['qty'] == 2 ? 'selected' : '' }}>2</option>
                        <option {{ $furniture['qty'] == 3 ? 'selected' : '' }}>3</option>
                        <option {{ $furniture['qty'] == 4 ? 'selected' : '' }}>4</option>
                        <option {{ $furniture['qty'] == 5 ? 'selected' : '' }}>5</option>
                    </select>
                </td>
                <td class="font-weight-bold text-muted">${{ number_format($furniture['price']*$furniture['qty'], 2) }}</td>
            </tr>
            @endforeach
        </table>

        <div class="row my-3">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
				<hr/>
                <table class="font-weight-bold text-muted" style="margin-left:40%;">
                    <tr>
                        <td>No. of Items: </td>
                        <td class="text-right"> {{ $totalQty }}</td>
                    </tr>
                    <tr>
                        <td>Subtotal: </td>
                        <td class="text-right">${{ number_format($totalPrice, 2) }} </td>
                    </tr>
                    <tr>

                    </tr>
                </table>
				<hr/>
            </div>
        </div>
        <div class="d-flex">
            <div class="col-md-6 mr-3 pr-0">
                <a href="/furniture" class="btn btn-outline-dark px-5">
                    Continue Shopping
                </a>
            </div>

            <div class="col-md-6 text-right pl-0">
                <a href="/checkout" class="btn btn-warning px-5">
                    Go To Checkout
                </a>
            </div>
        </div>
        @else
        <hr />
        <h3 class="ml-3 mb-4">No items in your cart</h3>
        <div class="col-md-3">
            <a href="/furniture" class="btn btn-warning px-5">
                Continue Shopping
            </a>
        </div>
        @endif
    </div> <!--/. col-->
    <div class='top row align-items-center mx-0 mt-5 mb-5'>
    @include('/partials/sale_banner_bottom')
    </div>
</div><!--/. container-->

@endsection
