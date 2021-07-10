@extends('layouts.auth')

@section('content')

<form action="{{route('register_auth')}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="lbl">Full Name</label>
        <input class="form-control" placeholder="Enter Name" type="text" value="{{old('name')}}" name="name">
        @error('name')
        <p style="color:red; font-size:10px;">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="lbl">Phone</label>
        <input class="form-control" placeholder="0xxxxxxxxx" type="text" value="{{old('phone')}}" name="phone">
        @error('phone')
        <p style="color:red; font-size:10px;">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="lbl">Email</label>
        <input class="form-control" placeholder="someone@123.com" value="{{old('email')}}" type="text" name="email">
        @error('email')
        <p style="color:red; font-size:10px;">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="lbl">Password</label>
        <input class="form-control" type="password" name="password">
        @error('password')
        <p style="color:red; font-size:10px;">{{$message}}</p>
        @enderror
    </div>

    <div class="form-group">
        <label class="lbl">Confirm Password</label>
        <input class="form-control" type="password" name="password_confirmation">
        @error('password_confirmation')
        <p style="color:red; font-size:10px;">{{$message}}</p>
        @enderror
    </div>


    <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of
        use of our website.</div>
    <button type="submit" class="btn btn-info btn-block">Sign Up</button>
</form>
<div class="mg-t-40 tx-center">Already Registered? <a href="{{route('user_login')}}" class="tx-info">Sign In</a></div>

@endsection