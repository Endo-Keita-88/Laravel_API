<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register');
    }
    public function send()
    {
        return view('send');
    }
    public function verify()
    {
        return view('verify');
    }

    public function sendToken(Request $request)
    {
        $token = Str::random(4); // 4桁のトークンを生成

        $user = new User();
        $user->email = $request->email;
        $user->remember_token = $token;

        return redirect()
        ->route('verify');

    }
}

