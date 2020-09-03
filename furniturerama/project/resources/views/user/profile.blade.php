@extends('layouts.main')

@section('content')
<div class="container bg-white mt-5 mb-3 p-4 ">

    <div class="">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <h1 class='text-center'><span style="color: #fcba03;"></span> {{ Auth::user()->userFirstName .' '.Auth::user()->userLastName }}</h1>
    
    <div class="row">
        <div class="col-md-3"></div>
        <div class="text-center col-md-6">
        <h2>Your Profile</h2>
        <p><img src="{{Auth::user()->image}}" width=170 height=180 style="border-radius: 50%; border: 6px solid #999"></p>
        <table class="table">
            <tr>
                <th>Email</th>
                <td>{{Auth::user()->email}}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{Auth::user()->phone}}</td>
            </tr>
            <tr>
                <th>Street</th>
                <td>{{Auth::user()->street}}</td>
            </tr>
            <tr>
                <th>Postal Code</th>
                <td>{{Auth::user()->post}}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{Auth::user()->city}}</td>
            </tr>
            <tr>
                <th>Province</th>
                <td>{{Auth::user()->province}}</td>
            </tr>
        </table>
        <a href="/user/profile/{{Auth::user()->id}}/edit" class="btn btn-danger px-5 btn-sm p-2">
            Edit Profile
        </a>
        </div>
        <div class="col-md-3"></div>
    </div>  
</div>
@endsection
