<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return back()->with('loginErrors', 'Invalid Credentials');
    }

    public function registerShow(){
        return view('auth.register');
    }

    public function registerProcess(Request $request){
        $validate = $request->validate([
            'name'=> 'required|max:255',
            'username'=> 'required|max:255',
            'email'=>'email|required',
            'password'=>'confirmed|required|max:32'
        ]);
        if($validate){
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
}
