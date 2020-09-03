@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row mt-5 bg-white mx-0 pb-5">

        <div class="col-md-6">
            <small>
                <ul class="breadcrumb bg-white mt-2">
                    <li><a href="/" class="text-dark">HOME</a> </li>&nbsp;
                    <li>/ <a href="/login" class="text-dark">LOGIN</a></li>&nbsp;
                </ul>
            </small>
            <img src="images/login.jpeg" alt="" width="550" height="500" class="img-fluid">
        </div>
        <div class="col-md-6 mt-5">
            <h1 class="font-weight-bold my-4" style="font-size:2.2em;">Sign in to your Furniture Account</h1>
            <p>Don't have an account?<a href="{{ route('register') }}" class="text-primary font-weight-bold"> Register Here.</a></p>
    		<div class="row">
        		<div class="col-md-11 mr-4">
                    <form method="POST" action="{{ route('login') }}">
                                    @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <small><a class="btn btn-link text-primary font-weight-bold" href="{{ route('password.request') }}" class="">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    </small>
                                @endif
                        </div>
                    </form>
        	   </div>
            </div>
        </div> <!--/.col 6-->
    </div><!--/.row -->
    <div class='top row align-items-center mx-0 mt-3 mb-5'>
    @include('/partials/sale_banner_bottom')
    </div>
</div><!--/.container-->

@endsection
