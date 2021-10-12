<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function editPassword()
    {
        $categories = Category::all();
        return view('userSetting.edit', compact('categories'));
    }

    public function updatePassword(Request $request){
        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required'
        ]);

        if (!Hash::check($request->oldPassword, Auth::user()->password)) {
            return back()->withErrors([
                'oldPassword' => ["Your password doesn't match our records."]
            ]);
        }

        User::find(Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/');

    }
}
