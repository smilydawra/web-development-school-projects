@extends('layouts.main')

@section('content')
<div class='container bg-white mt-5' >
    <div class='mb-4'>
        <img src='images/register.jpeg' alt='Register' height="300" width="100%" class="img-fluid">
    </div>
    <div class="text ml-3" >
        <h1 class="font-weight-bold" style="font-size:2.2em;">Register Your Account</h1>
        <p>Already Registered? <a href="{{ route('login') }}">Sign In</a></p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <!--First Name-->
                    <div class="form-group mr-3">
                        <label for="userFirstName">{{ __('First Name') }}</label>
                            <input id="userFirstName" type="text" class="form-control @error('userFirstName') is-invalid @enderror" name="userFirstName" value="{{ old('userFirstName') }}" required autocomplete="userFirstName" autofocus placeholder="Anna">

                            @error('userFirstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--Last Name-->
                    <div class="form-group mr-3">
                        <label for="userLastName">{{ __('Last Name') }}</label>
                            <input id="userLastName" type="text" class="form-control @error('userLastName') is-invalid @enderror" name="userLastName" value="{{ old('userLastName') }}" required autocomplete="userLastName" autofocus placeholder="Grace">

                            @error('userLastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--Birth Date-->

                    <div class="form-group mr-3">
                        <label for="birthDate">{{ __('Date Of Birth') }}</label>
                            <input id="birthDate" type="date" class="form-control @error('birthDate') is-invalid @enderror" name="birthDate" value="{{ old('birthDate') }}" required autocomplete="birthDate" autofocus>

                            @error('birthDate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--Email-->
                    <div class="form-group mr-3">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="anna@gmail.com">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>



                    <!--Password-->
                    <div class="form-group mr-3">
                        <label for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Atleast 1 upper case letter, 1 lowercase letter, a number and a special character">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--Confirm Password-->
                    <div class="form-group mr-3">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Must match password">
                    </div>
                </div>
                <div class="col-md-6">
                    <!--Phone-->
                    <div class="form-group mr-3">
                        <label for="phone">{{ __('Phone') }}</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="eg: xxx-xxx-xxxx OR xxx.xxx.xxx OR (xxx) xxx-xxx OR  xxxxxxxxx">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--street-->
                    <div class="form-group mr-3">
                        <label for="street">{{ __('Street') }}</label>
                            <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus placeholder="34 Maple">

                            @error('street')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--postal-->
                    <div class="form-group mr-3">
                        <label for="post">{{ __('Postal Code') }}</label>
                            <input id="post" type="text" class="form-control @error('post') is-invalid @enderror" name="post" value="{{ old('post') }}" required autocomplete="post" autofocus placeholder="r3y 0n6">

                            @error('post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--city-->
                    <div class="form-group mr-3">
                        <label for="city">{{ __('City') }}</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus placeholder="Winnipeg">

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <!--province-->
                    <div class="form-group mr-3">
                        <label for="province">{{ __('Province') }}</label>
                            <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" required autocomplete="province" autofocus placeholder="Manitoba">

                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
            </div> <!--/.row-->

            <div class="form-group text-center">
                    <button type="submit" class="btn btn-warning">
                        {{ __('Register') }}
                    </button>
            </div>
        </form>
    </div>
    <div class='top row align-items-center mx-0 mt-5 mb-5'>
    @include('/partials/sale_banner_bottom')
    </div>
</div><!--/.container-->

@endsection
