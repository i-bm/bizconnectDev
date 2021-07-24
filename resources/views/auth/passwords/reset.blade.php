@extends('layouts.auth.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 auth shadow-tw">
            <div class="">
                <div class="text-center">
                    <img src="{{asset('assets/img/forgot.png')}}" alt="forgot sent" />
                    <h4>Change Your Password</h4>
                    <p>Password msut be at least 8 characters with 1 upper case letter (A-Z) and contains at least 1 number (0-9)</p>
                </div>

                <div class="">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control shadow-tw border-radius-tw @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('New Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control shadow-tw border-radius-tw @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control shadow-tw border-radius-tw" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                        <h5 class="register mx-3 mb-3">Not registered yet? <a href="{{route('register')}}">Create an account</a></h5>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h5 class="copyright">Copyright &copy; {{date('Y')}}  <a href="{{url('/')}}">{{config('app.name')}}.</a> All Rights Reserved.</h5>
</div>
@endsection
