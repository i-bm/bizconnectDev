@extends('layouts.auth.main')

@section('content')


<main>
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-5 login shadow-tw">

              
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="text-center1 mb-3">
                            <img width="150" class="mb-3" src="{{asset('assets/img/logo/logo.png')}}" alt="Biz Connect Logo"/><br/>
                            <h4>Log in to your account</h4>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control shadow-tw @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control shadow-tw @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                      
                        <div class="form-group">
                                @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                        </div>

                      

                        <div class="form-group  mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-block new shadow-tw border-radius-tw">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <h5 class="register mx-3">Not registered yet? <a href="{{route('register')}}">Create an account</a></h5>

                        {{-- <div class="login-footer d-flex justify-content-between">
                            <p>@2021 Biz Connect. All rights reserved.</p>
                            <p>Terms of service</p>
                            <p class="float-left">Privacy Policy</p>
                        </div> --}}
                    </form>
                
            
        </div>

        <div class="col-md-5 p-0 shadow-tw side-img">
            <img src="assets/img/login-side-bg.jpg" style="min-height: 500px" class="img-fluid d-none d-md-block d-lg-block d-sm-none " alt="">
        
        </div>
    </div>
</div>
</main>

@endsection