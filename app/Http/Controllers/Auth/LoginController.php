<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Alert;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
  
        // $fieldType = filter_var($request->phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        if(auth()->attempt(['email' => $request->email, 'password'=> $request->password]))
        {
            if(Auth::user()->status == 1){
                return redirect()->route('home');
            }
            elseif(Auth::user()->status == 2){
                Auth::logout();
                Alert::info('Account Locked', 'Please contact our support desk for assistance');
                return redirect()->route('login');

            }
            else{
                $id = Auth::user()->id;
                $hash = sha1(Auth::user()->verify);

                Alert::info('Account not activated', 'Please enter Your code Email or Phone to Verify Your Account');
                return redirect()->route('user_verify',[$id,$hash]);
            }
            
        }else{
            Alert::error('Credentials Mismatch', 'Please check your details & Try Again');
            return redirect()->back()->withInput();
        }
          
    }
}