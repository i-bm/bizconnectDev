@extends('layouts.auth.main')

@section('content')
<main>
<div class="container">
    <div class="row align-items-center justify-content-center ">

<div class="col-sm-5 auth shadow-tw">

    <div class="text-center">
    <img src="{{asset('assets/img/verify.png')}}" width="200" alt="" />
    </div>
     <div class="text-center">
    <h4>Verify Your Account</h4>
    <p class="">Protecting your account is our priority. Please verify your account by entering the verification code sent to <span class="p-color">{{$user->phone}}</span> or <span class="p-color">{{$user->email}}</span></p>
        {{-- Hi {{$user->name}} --}}
       </div>

        
        <form action="{{route('verify_now',[$user->id])}}" method="post">
            @csrf
            <div class="form-group">
            <label>Verification Code</label>
                <input type="text" class="form-control shadow-tw border-radius-tw @error('verification_code') is-invalid @enderror"  name="verification_code" placeholder="Enter Verification Code">
                @error('verification_code')
                <p style="color:#DC3545; font-size:.8rem;">{{$message}}</p>
                @enderror
            </div><!-- form-group -->

<div class="row p-0">
<div class="col-sm-8" style="font-size:.9rem;line-height:1rem;">
        {{-- <p>It may take a minuite to receive your code</p> --}}
        <p>Haven't received it? <a href="">Resend Verification Code</a></p>
        </div>

        <div class="col-sm-4">
         <button type="submit" class="btn btn-primary btn-block shadow-tw border-radius-tw">Verify</button>
        </div>
        </div>
           
        </form>
        <br>

        
        <form action="{{route('resend_verification', [$user->id])}}" method="post" style="display: none;">
            @csrf
            <button type="submit" class="">Resend Verification Code</button>
        </form>

        {{-- <div class="mg-t-60 tx-center"><a href="#" class="tx-info" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Go back </a></div> --}}

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    
</div>

</div>
</div>
</main>

@endsection