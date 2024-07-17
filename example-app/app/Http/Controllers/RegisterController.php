<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{

    /**
     * メール認証のメールアドレスが正しければトークンを送信する
     * @param Request $request
     * @return view
     */
    public function mailCheck(Request $request)
    {
        // バリデーション
        $request->validate([
            'email' => 'required|email|unique:members,email',
        ]);

        // 新しいユーザーを作成する
        $member = new Member();
        $member->email = $request->email;
        $member->name = '';
        $member->password = '';
        $member->token = '';
        // ユーザーの保存
        $saved = $member->save();

        if ($saved) {
            // 成功した場合
            $token = rand(1000, 9999);
            $member->token = $token;
            $member->save();

            return view('verify')->with(['member' => $member]);

        } else {
            // 失敗した場合
            return back()->withErrors(['email' => 'アドレスが正しくないまたはすでに使用されています。'])->withInput();
        }
    }

    /**
     * メール認証処理を行う
     * @param
     * @return view
     */
    public function tokenCheck(Request $request)
    {
        // バリデーション
        $token = $request->validate([
            'token' => 'required|string', // フォームで入力された認証コード
        ]);

        $token = $request->input('token');

        // データベースから最新のメンバーを取得
        $member = Member::latest()->first();

        // 認証コードが一致するか確認
        if ($member->token === $token) {
            return view('register')->with(['member' => $member]);
        }

        // 認証に失敗した場合
        // return back()->withErrors(['token' => '認証コードが正しくありません。'])->withInput();
        return view('verify')->with(['member' => $member]);

    }

    /**
     * 会員登録処理をする
     * @param Request $request
     * @return view
     */
    public function registerCreate(Request $request)
    {
        // バリデーション
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'password' => 'required|string|confirmed',
            ],
            [
                'password.confirmed' => 'パスワードと確認用パスワードが一致しません。',
            ]
        );

        // 新しいユーザーを作成
        $member = Member::latest()->first();
        $member->name = $request->name;
        $member->password = Hash::make($request->password);
        $member->save();

        // ユーザー登録後の処理
        return view('registerCheck')->with(['member' => $member]);
    }
}

