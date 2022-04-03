<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){        
        return view('users.setting', [
            'rentedbooks'=> Auth::user()->books,
            'rentedData'=>Auth::user()->rentedBooks,            
        ]);
    }

    public function process(Request $request){
        return 'Process';
    }

    public function changeName(Request $request){
        return view('users.changeName');
    }

    public function changePassword(Request $request){
        return view('users.changePassword');
    }

    public function changeNameProcess(Request $request){        
        $validate = $request->validate([
            'name'=>'required|max:255'
        ]);
        if($validate){
            $user = Auth::user();
            $user->name = $request->name;
            $user->save();
            return back()->with('success_status', 'Name changed successfully.');
        }
    }

    public function changePasswordProcess(Request $request){
        if(!Hash::check($request->old_password, Auth::user()->password)){
            return back()->withErrors(['old_password'=>'Incorrect password']);
        }
        $validate = $request->validate([
            'password'=>'required|confirmed'
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success_status', 'Password changed successfully');
    }

    public function changeToPremium(){
        return view('roles.changeToPremium');
    }
    
    public function premiumBenefit(){
        return view('roles.premiumBenefit');
    }
}