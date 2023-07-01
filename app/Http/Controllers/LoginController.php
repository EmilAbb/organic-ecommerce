<?php

namespace App\Http\Controllers;


use App\Enums\Guards;
use App\Http\Requests\UserSignRequest;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('front.login');
    }

    public function register(UserSignRequest $signRequest)
    {
        $validateData = $signRequest->validated();
        $user = new User();
        $user->email = $validateData['email'];
        $user->password = Hash::make($validateData['password']);
        $user->save();

        return redirect()->back()->with('success','Register Successfully');
    }

    public function login()
    {
        if (auth()->attempt(['email'=>request()->email,'password'=>request()->password])){
            return redirect()->route('profile')->with('success','login Successfully');
        }
        return redirect()->back()->with('error','Login Error');
    }

    public function logout()
    {

        if (auth()->check()){
            auth()->logout();
        }
        return redirect()->back();
    }




}
