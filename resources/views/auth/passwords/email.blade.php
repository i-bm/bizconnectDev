@extends('layouts.auth.main')

@section('content')
<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-5 auth shadow-tw">
            <div class="">
                    @if (session('status'))

                      <div class="text-center">
                        <img src="{{asset('assets/img/sent.png')}}" alt="email sent" />
                        <h4>Password Reset Email Sent</h4>
                        <p>An email has been sent to your email address. Follow the instructions in the email to reset your password.</p>
                    </div>

                        {{-- <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div> --}}
                        
                        <div class="form-group row">
                            <div class="col-md-12">
                                <a href="{{route('login')}}" class="btn btn-primary btn-block shadow-tw border-radius-tw ">
                                    {{ 'Done'}}
                                </a>
                            </div>
                            
                        </div>
                    <h5 class="register mx-3 mb-3">Not registered yet? <a href="{{route('register')}}">Create an account</a></h5>
                    @else

                    <div class="text-center">
                        <img src="{{asset('assets/img/forgot.png')}}" alt="forgot password" />
                        <p>Enter the email address associated with your account and we'll send you a link to reset your password</p>
                    </div>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control shadow-tw border-radius-tw @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block shadow-tw border-radius-tw ">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>

                        <h5 class="register mx-3 mb-3">Not registered yet? <a href="{{route('register')}}">Create an account</a></h5>
                    </form>
               @endif
            </div>
        </div>
    </div>
    <h5 class="copyright">Copyright &copy; {{date('Y')}}  <a href="{{url('/')}}">{{config('app.name')}}.</a> All Rights Reserved.</h5>
</div>
@endsection
