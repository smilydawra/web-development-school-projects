@extends('layouts.main')

@section('content')
<div class="container bg-white mt-5 mb-3 py-5">
            <div class="ml-3" >
                

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        
                            

                        <div class="row my-5 py-5">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <h1>{{ __('Reset Password') }}</h1>
                                <div class="form-group">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <div class="">
                                        <button type="submit" class="btn btn-warning">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </form>
    </div>
</div>
@endsection
