<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function goChangePassword()
    {
        $categories = CategoryController::getAllCategories();
        return view('change_password',compact('categories'));
    }

    public function changePassword(Request $request){

//          Your Password	    Must be filled and same with the current password
//          New Password	    Must be filled with minimum 8 characters
//          Confirm Password	Must be filled and same with new password

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if(!Hash::check($request->current_password, Auth::user()->password)){
            return back()->withErrors(['current_password'=>'Wrong Password']);
        }
        else {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect('/');
    }
}
