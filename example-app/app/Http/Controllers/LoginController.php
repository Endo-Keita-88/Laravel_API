<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // バリデーションの実行
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // 認証情報を取得
        $credentials = $request->only('email', 'password');

        // 認証を試みる
        if (Auth::attempt($credentials)) {
            // 認証成功時の処理
            $token = $request->user()->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token], 200);
        }

        // 認証失敗時の処理
        return response()->json(['message' => 'メールアドレスまたはパスワードが違います'], 401);
    }
}
