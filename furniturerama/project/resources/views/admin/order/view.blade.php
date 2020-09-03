@extends('layouts.admin')

@section('content')

  <div class="card-my-4">

    <div class="card-header">

            <h1 class="card-title">{{ $title }}</h1>

        </div>  

        <div class="card-body">

          <div class="mb-3">
            Filter by Shipping Status:
            <a href="/admin/order/filterShipping/?shippingStatus=delivered">Delivered</a> |
            <a href="/admin/order/filterShipping/?shippingStatus=pending">Pending</a> |
            <a href="/admin/order/view">Reset</a>
          </div>

          <div class="mb-3">
            Filter by Transaction Status:
            <a href="/admin/order/filterTransactions/?transactionStatus=complete">Complete</a> |
            <a href="/admin/order/filterTransactions/?transactionStatus=incomplete">Incomplete</a> |
            <a href="/admin/order/view">Reset</a>
          </div>

          <table class="table table-striped">

            <tr>
              <th>ID</th>
              <th>Shipping Province</th>
              <th>Shipping City</th>
              <th>Shipping Post</th>
              <th>Shipping Status</th>
              <th>Transaction Status</th>
              <th>Update</th>
              <th>Delete</th>
             
            </tr>

            @foreach($orders as $order)
            
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->shippingProvince }}</td>
                <td>{{ $order->shippingCity }}</td>
                <td>{{ $order->shippingPost }}</td>
                <td>{{ $order->shippingStatus }}</td>
                <td>{{ $order->transactionStatus }}</td>
              
                <td><a href="/admin/order/{{$order->id}}/edit" class="btn btn-warning btn-sm p-2"><strong>Update<strong></a></td>
                <td><form class="delete" 
                            onSubmit="return confirm('Do you really want to delete this order?')"
                             action="/admin/order/view" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $order->id }}"/>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form></td>
            </tr>

            </tr>
 
            @endforeach

          </table>

            <div class="row justify-content-center">

              
            </div>

          </div>

         
        </div>

          @stop