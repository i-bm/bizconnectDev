@extends('layouts.auth')

@section('content')

<div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
    <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span>
        {{ config('app.name') }} <span class="tx-normal">]</span></div>
    <div class="tx-center mg-b-60">Enter Your Credentials</div>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="lbl">Email</label>
            <input class="form-control" placeholder="someone@123.com" type="email" value="{{old('email')}}"
                name="email">
            @error('email')
            <p style="color:red; font-size:10px;">{{$message}}</p>
            @enderror
        </div>
        <div id="map"></div>

        <div class="form-group">
            <label class="lbl">Password</label>
            <input class="form-control" type="password" name="password">
            @error('password')
            <p style="color:red; font-size:10px;">{{$message}}</p>
            @enderror
            <a href="#" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>

        </div>
        <button type="submit" class="btn btn-info btn-block">Sign In</button>
    </form>
    <div class="mg-t-60 tx-center">Not yet a member? <a href="{{route('user_register')}}" class="tx-info">Sign Up</a>
    </div>
</div>

@endsection