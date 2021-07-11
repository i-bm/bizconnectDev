

<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">


    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
 
  
 
</head>
<body class="signin-signup">

<main>
<div class="container ">
    <div class="row shadow">
        <div class="col-md-6 login">
            <div class="">

                <div class="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="text-center1 mb-4">
                            <img width="150" class="mb-5" src="{{asset('assets/img/logo/logo.png')}}" alt="Biz Connect Logo"/><br/>
                            {{-- <h1>BIZ CONNECT</h1> --}}
                            <h4 class="text-center1">Log in to your account</h4>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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
                            <div class="">
                                @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                            </div>
                        </div>

                      

                        <div class="form-group  mb-0">
                            <div class="">
                                <button type="submit" class="btn btn-block rounded-0 new">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <h5 class="register">Not registered yet? <a href="#">Create an account</a></h5>

                        <div class="login-footer d-flex justify-content-between">
                            <p>@2021 Biz Connect. All rights reserved.</p>
                            {{-- <p>Terms of service</p> --}}
                            <p class="float-left">Privacy Policy</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 p-0">
            <img src="assets/img/bg.jpg" style="min-height: 500px" class="img-fluid" alt="">
            {{-- <div class="img-side"></div> --}}
        </div>
    </div>
</div>
</main>
{{-- @endsection --}}
