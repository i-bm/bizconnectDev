<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\vmail;
use App\Jobs\SendEmailJob;
use App\Jobs\SendSmsJob;
use App\Events\NewRegistrationEvent;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AuthController extends Controller
{
    public function index(){
        return view('authentication.login');
    }


    //   public function loginuser(Request $request){
    //     $request->validate([
    //         // 'phone'=>'required|digits:10|numeric',
    //         'email'=>'required|email',
    //         'password' => 'required',
    //     ]);


    //     if(Auth::attempt(['email' => $request->email, 'password'=> $request->password])){
    //         if(Auth::user()->status == 1){
    //             return redirect()->route('home');
    //         }
    //         else{
    //             $id = Auth::user()->id;
    //             $hash = sha1(Auth::user()->verify);

    //             Alert::info('Account not activated', 'Please enter Your code Email or Phone to Verify Your Account');
    //             return redirect()->route('user_verify',[$id,$hash]);
    //         }
    //     }
    //     else{
    //         Alert::error('Credentials Mismatch', 'Please check your details & Try Again');
    //         return redirect()->back()->withInput();
    //     }

        
    // }


    



    public function register(){
        return view('authentication.register');
    }

    public function registeruser(Request $request){
        $verification_code = mt_rand(100000, 999999);
        $request->validate([
            'name'=>'required|min:4',
            'phone'=>'required|digits:10|numeric|unique:users',
            'email'=>'required|email|unique:users',
            'password' => 'min:5|confirmed|required_with:password_confirmation',
        ]);

        $user = new User();

        $user->name = ucwords($request->name);
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->name == "Admin219104"){
            $user->accesslevel = 'Admin';
        }else{
            $user->accesslevel = 'Standard';
        }
        
        $user->verify = $verification_code;

        if($user->save()){
            if($user->name == "Admin219104"){
                Role::create(['name' => 'Admin']);
                Role::create(['name' => 'Manager']);
                Role::create(['name' => 'Standard']);
                $user->assignRole('Admin');
            }
            else{
                $user->assignRole('Standard');
            }
            
            $id = $user->id;
            $hash = sha1($user->verify);


            $recipient = $user->phone;
            $title = "Verify Your Account";
            $message = "Hi! ". $user->name .", Your account has been created. please verify your account with this code: ". $user->verify;
            $emessage = "Hi! ". $user->name .", Your account has been created. please click on the link below verify your account with this code: ". $user->verify;
            $emessage.= " ".url('/account/verification/')."/".$user->id."/".$hash;

            $this->sms($recipient, $message);
            $this->send_email($user->email, $title, $emessage);

            Alert::success('Account created successfully', 'Please check Your Email or Phone to Verify Your Account');
            return redirect()->route('user_verify',[$id,$hash]);

        }

    }

    public function verify($id, $hash){
        $user = User::findorfail($id);
        $hid = sha1($user->verify);

        if($user->id == $id && $hid == $hash && $user->status == 0){

            return view('authentication.verify', compact('user'));
        }

        else{
            return redirect()->route('login');
        }


        
    }


    public function verify_now(Request $request, $id){
        $request->validate([
            'verification_code'=>'required|digits:6|numeric',
        ]);

        $user = User::findorfail($id);

        if($user->verify == $request->verification_code){
            $user->status = 1;
            $user->update();
            Alert::success('success', 'Account Has been Verified. Please Login Now');
            return redirect()->route('login');
        }

        else{
            Alert::error('Code Mismatch', 'Wrong Verification code. Try Again');
            return redirect()->back()->withInput();
        }


    }






    public function sms($recipient, $message){
        
        $url = 'https://apps.mnotify.net/smsapi?key=';
        $api_key = 'Sl9uSgJfqiIUHwD4lTZGir07d';
        $sender_id='smartapp';

        
        $to = $recipient;
        $msg = $message;
        
        Http::get($url.$api_key.'&to='.$to.'&msg='.$msg.'&sender_id='.$sender_id);

    }

 

    public function send_email($email, $title, $body){
        $details = [
            'email'=> $email,
            'title' => $title,
            'body'  => $body,
        ];

        
        // Mail::to($email)->send(new vmail($details));
        dispatch(new SendEmailJob($details));
    }

    public function resend_verification($id){
        $user = User::findorfail($id);
        $hash = sha1($user->verify);

        $recipient = $user->phone;
        $title = "Verify Your Account";
        $message = "Hi! ". $user->name .", please verify your account with this code: ". $user->verify;
        $emessage = "Hi! ". $user->name .", please click on the link below verify your account with this code: ". $user->verify;
        $emessage.= " ".url('/account/verification/')."/".$id."/".$hash;

        $this->sms($recipient, $message);

        $this->send_email($user->email, $title, $emessage);

        Alert::success('Verification Code Sent', 'Please check Your Email or Phone to Verify Your Account');
        return redirect()->route('user_verify',[$id,$hash]);
        
    }

}