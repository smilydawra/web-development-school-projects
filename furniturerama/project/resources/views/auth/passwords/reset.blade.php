@extends('layouts.main')

@section('content')
<div class="container bg-white mt-5 mb-3 py-5">
        <div class="row my-5 py-5">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                <h1>{{ __('Reset Password') }}</h1>

                <div class="">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group mb-0">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Reset Password') }}
                                </button>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
    </div>
</div>
@endsection
