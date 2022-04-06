<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware(['guest'])->except('logoutProcess');
    }

    public function loginShow(){
        return view('auth.login');
    }

    public function loginProcess(Request $request){
        $validate = $request->validate([            
            'email'=>'email|required',
            'password'=>'required|max:32'
        ]);
        if(Auth::attempt($request->only('email', 'password'), $request->remember)){
            $request->session()->regenerate();
            return redirect()->intended('/books')->with('success_status', 'Login Success');            
        }
        return back()->with('errors_status', 'Invalid Credentials');
    }

    public function registerShow(){
        return view('auth.register');
    }

    public function registerProcess(Request $request){
        $validate = $request->validate([
            'name'=> 'required|max:255',
            'username'=> 'required|max:255|unique:users,username',
            'email'=>'email|required|unique:users,email',
            'password'=>'confirmed|required|max:32'
        ]);
        if($validate){
            // $user = User::query()->where('email', $request->email);
            // return $user;
            User::create([
                'name'=> $request->name,
                'username'=> $request->username,
                'email'=> $request->email,
                'password'=> Hash::make($request->password)
            ]);
        }
        return redirect()->route('index')->with('success_status', 'Account created successfully');
    }

    public function logoutProcess(Request $request){
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('index')->with('success_status', 'Logout successfully.');
    }

    public function forgetPassword(){
        return view('auth.forgetPassword');
    }

    public function forgetPasswordProcess(Request $request){
        
        $validate = $this->validate(            
            $request,
            ['email' => 'required|email|exists:users'],
            ['email.exists'=> 'The user with this email does not exist.']
        );
        if($validate){
            $token = Str::random(60);
            DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
            Mail::send('auth.resetLinkComponent', ['token'=> $token], function($message) use ($request){
                $message->from($request->email, 'BookRental');
                $message->to($request->email);
                $message->subject('Reset your password');
            });
            return back()->with('success_status', 'We have sent password reset link to your mail.');
        }
        return back()->with('errors_status', 'Something went wrong.');
    }

    public function passwordReset($token){        
        return view('auth.resetPassword', ['token' => $token]);
    }

    public function passwordResetProcess(Request $request){
        $validate = $request->validate([            
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|confirmed',            
        ]);
        $updatePassword = DB::table('password_resets')->where(['email'=>$request->email, 'token'=>$request->token])->first();        
        if(!$updatePassword){            
            return back()->withErrors(['email'=>'Use your correct email']);
        }
        $user = User::where('email', $request->email)->update(['password'=>Hash::make($request->password)]);        
        DB::table('password_resets')->where(['email'=>$request->email])->delete();
        return redirect()->route('login')->with('success_status', 'Password changed successfully.');
    }
}
