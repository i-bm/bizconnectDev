<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-20 tx-bold tx-inverse"><span class="tx-normal">[</span> Hi! {{$user->name}}
            <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">Please Enter your Verification code to activate your account</div>
        <form action="{{route('verify_now',[$user->id])}}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="verification_code" placeholder="Enter Verification Code">
                @error('verification_code')
                <p style="color:red; font-size:10px;">{{$message}}</p>
                @enderror
            </div><!-- form-group -->


            <button type="submit" class="btn btn-success btn-block">Activate</button>
        </form>
        <br>

        <form action="{{route('resend_verification', [$user->id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-warning btn-block">Resend Verification Code</button>
        </form>

        <div class="mg-t-60 tx-center"><a href="#" class="tx-info" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Go back </a></div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->