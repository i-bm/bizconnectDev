

<!Doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    <link href="{{asset('assets/fonts/publica/stylesheet.css')}}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        body {
    font-family: 'publica_sanslight', sans-serif;
    font-weight: normal;
    font-style: normal;
}

.form-control:focus{
    outline: 0;
    border-color:transparent !important;
    box-shadow: none !important
}
.form-control{
    height: 50px !important;
    background-color: #fff !important;
    border-radius: 0 !important;
}

button.new{
    height: 50px;
    font-size: 1.2rem !important;
    background: #FF9E20 ;
    border:#FF9E20;
    color:#fff;
}

button.new: hover{
    background:#ce7b10 !important;
}
    </style>
  
 
</head>
<body>

<main>
<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-5" style="margin-top:10vh" >
            <div class="card1">

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="text-center mb-4">
                            {{-- <img width="150" class="mb-4" src="{{asset('assets/img/logo/logo1.png')}}" alt="TechMarket Logo"/><br/> --}}
                            <h1>BIZ CONNECT</h1>
                            <h4 class="text-center">Login to the dashboard</h4>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
{{-- @endsection --}}
