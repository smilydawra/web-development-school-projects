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
    <form class="form" action="/user/profile" method="post" enctype="multipart/form-data">
    <div class="row pt-5">
        <div class="col-md-8" style="border-right: 2px solid #ddd">
            <h1 style="font-size:1.4em;">Edit Profile Settings</h1>
            <hr />


            <input type="hidden" name="id" value="{{ old('id', $user->id) }}" />

            @method('PUT')
            <div class="row">
            <div class=" col-md-6 form-group required">

                <label for="userFirstName">First Name:</label><br/>
                <input id="userFirstName" class="form-control" name="userFirstName" value="{{ old('userFirstName', $user->userFirstName) }}" />
                @error('userFirstName')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="col-md-6 form-group required">

                <label for="userLastName">Last Name:</label><br/>
                <input id="userLastName" class="form-control" name="userLastName" value="{{ old('userLastName', $user->userLastName) }}" />
                @error('userLastName')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>
            </div>

            <div class="form-group required">

                <label for="birthDate">Date of birth:</label><br/>
                <input id="birthDate" type="date" class="form-control" name="birthDate" value="{{ old('birthDate', $user->birthDate) }}" />
                @error('birthDate')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="email">Email:</label><br/>
                <input id="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" />
                @error('email')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="form-group required">

                <label for="phone">Phone:</label><br/>
                <input id="phone" class="form-control" name="phone" value="{{ old('phone', $user->phone) }}" />
                @error('phone')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="row">
            <div class="col-md-6 form-group required">

                <label for="street">Street:</label><br/>
                <input id="street" class="form-control" name="street" value="{{ old('street', $user->street) }}" />
                @error('street')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>

            <div class="col-md-6 form-group required">

                <label for="post">Post Address:</label><br/>
                <input id="post" class="form-control"  name="post" value="{{ old('post', $user->post) }}" />
                @error('post')
                    <span class="error"> {{ $message }}</span>
                @enderror

            </div>
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
                <label for="city">City:</label><br />
                <input id="city" name="city" class="form-control" value="{{ old('city', $user->city) }}" />
                @error('city')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>

            <div class="col-md-6 form-group">
                <label for="province">Province:</label><br />
                <input id="province" name="province" class="form-control" value="{{ old('province', $user->province) }}" />
                @error('province')
                    <span class="error"> {{ $message }}</span>
                @enderror
            </div>
            </div>

            @csrf

            <div class="row form-group">
                <div class="col-md-3"></div>
                <button type="submit" class="col-md-6 btn btn-danger">Save Changes</button>
                <div class="col-md-3"></div>
            </div>

        </div>
        <div class="col-md-4 text-center mt-5 pt-5">
            <p><img src="{{$user->image}}" width=170 height=180 style="border-radius: 50%; border: 6px solid #999"></p>
            <span id="pencil_icon" style="cursor:pointer"><i class="fa fa-pencil" aria-hidden="true"></i>Edit Profile Picture</span>
            <input id="user_image" class="d-none" type="file" name="image"/><br />
            <button type="submit" class="col-md-6 btn btn-danger">Apply Changes</button>
            <hr />
            <a class="col-md-6 btn btn-warning" href="{{ route('password.request') }}">Change Password</a>
        </div>
        </div>
        </form>


</div>
@endsection
