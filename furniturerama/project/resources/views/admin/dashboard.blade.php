@extends('layouts.admin')

@section('content')

 <h1>Welcome Admin!!</h1>

    <div class = "container">
        <div class= "row">
            <div class = "card col-sm-12 col-md-4 col-lg-3 bg-success text-white">
                 <div class="card-body">
                    <h3 class="card-title">Furntiure</h3>
                    <ul>
                        <li>Total Furniture: {{ $furniture }}</li>
                        <li>Maximum Price: {{ $furniture_max }}</li>
                        <li>Minimum Price: {{ $furniture_min }}</li>
                    </ul>
                  </div>
                </div>
               
                <div class="card col-sm-12 col-md-4 col-lg-3 bg-light">
                      <div class="card-body">
                        <h3 class="card-title">Users</h3>
                        <ul>
                            <li>Total: {{ $user }}</li>
                        </ul>
                      </div>
                    </div>

                    <div class="card col-sm-12 col-md-4 col-lg-3 bg-danger text-white">
                      <div class="card-body">
                        <h3 class="card-title">Categories</h3>
                        <ul>
                            <li>Total: {{ $category }}</li>
                        </ul>
                      </div>
                    </div>

                    <div class="card col-sm-12 col-md-4 col-lg-3 bg-light">
                      <div class="card-body">
                        <h3 class="card-title">Promotion</h3>
                        <ul>
                            <li>Total:  {{ $promotion }}</li>
                        </ul>
                      </div>
                    </div>

                    <div class="card col-sm-12 col-md-4 col-lg-3 bg-light">
                      <div class="card-body">
                        <h3 class="card-title">Orders</h3>
                        <ul>
                            <li>Total: {{ $order }}</li>
                            <li>Maximum price: {{ $order_max }}</li>
                            <li>Minimum price: {{ $order_min }}</li>
                        </ul>
                      </div>
                    </div>

                    <div class="card col-sm-12 col-md-4 col-lg-3 bg-primary text-white">
                      <div class="card-body">
                        <h3 class="card-title">Review</h3>
                        <ul>
                            <li>Total: {{ $review }}</li>
                        </ul>
                      </div>
                    </div>

                    <div class="card col-sm-12 col-md-4 col-lg-3 bg-light">
                      <div class="card-body">
                        <h3 class="card-title">Material</h3>
                        <ul>
                            <li>Total: {{ $material }}</li>
                        </ul>
                      </div>
                    </div>

                    <div class="card col-sm-12 col-md-4 col-lg-3 bg-info text-white">
                      <div class="card-body">
                        <h3 class="card-title">Manufacturer</h3>
                        <ul>
                            <li>Total: {{ $manufacturer }}</li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>

@stop