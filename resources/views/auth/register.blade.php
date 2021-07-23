@extends('layouts.auth.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 login shadow-tw">
            <div class="card1">
                {{-- <div class="card-header1">{{ __('Register') }}</div> --}}
                    <form method="POST" action="{{ route('register_auth') }}">
                        @csrf

                     <div class="text-center1 mb-3">
                            <img width="150" class="mb-3" src="{{asset('assets/img/logo/logo.png')}}" alt="Biz Connect Logo"/><br/>
                            <h4>Create your account</h4>
                        </div>

                        <div class="form-group">
                            <label for="name" class="">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control shadow-tw border-radius-tw @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control shadow-tw border-radius-tw @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="">{{ __('Phone') }}</label>

                            <div class="">
                                <input id="phone" type="text" class="form-control shadow-tw border-radius-tw mb-2 @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            
                           
                            <div class="col-sm-6">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control shadow-tw border-radius-tw @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                             <div class="col-sm-6">
                             <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control shadow-tw border-radius-tw"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            </div>
                        


                        
                        {{-- <div class="form-group row">
                            <label for="password-confirm"
                                class="ol-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-sm-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 ">
                                <button type="submit" class="btn btn-primary btn-block shadow-tw border-radius-tw">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                         <h5 class="register mb-3">Already registered? <a href="{{route('login')}}">Login to your account</a></h5>
                    </form>
                </div>
        </div>
        <div class="col-md-5 p-0 shadow-tw side-img">
            <img src="assets/img/login-side-bg.jpg" style="min-width:600px" class="img-fluid d-none d-md-block d-lg-block d-sm-none" alt="">
        </div>
    </div>
     <h5 class="copyright">Copyright &copy; {{date('Y')}}  <a href="{{url('/')}}">{{config('app.name')}}.</a> All Rights Reserved.</h5>

</div>
@endsection