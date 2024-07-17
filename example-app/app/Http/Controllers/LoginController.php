<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * ログイン画面を表示する
     * @param
     * @return view
     */
    public function login()
    {
        $member = Member::all();

        return view('login')->with(['members' => $member]);
    }

    /**
     * ログイン処理を行う
     * @param Request $request, Member $member
     * @return view
     */
    public function show(Request $request, Member $member)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // データベースからメールアドレスが一致するメンバーを取得
        $member = Member::where('email', $email)->first();

        // メンバーが存在し、パスワードが一致するか確認
        if ($member &&  Hash::check($password, $member->password)) {
            return view('login_id')->with(['member' => $member]);
        }

        // 認証に失敗した場合
        return back()->withErrors(['email' => 'メールアドレスまたはパスワードが間違っています。'])->withInput();
    }

    /**
     * パスワード再設定画面(パスワードを忘れた場合)に認証処理をする
     * @param Request $request
     * @return view
     */
    public function resetMailCheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        // データベースからメールアドレスが一致するメンバーを取得
        $member = Member::where('email', $email)->first();

        // メールアドレス認証
        if ($member) {
            return view('resetTokenCheck')->with(['member' => $member]);
        }

        // 認証に失敗した場合
        return back()->withErrors(['email' => 'メールアドレスが間違っています。'])->withInput();
    }

    /**
     * パスワード再設定画面(パスワードを忘れた場合)に認証処理をする
     * @param Request $request
     * @return view
     */
    public function resetTokenCheck(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');

        // データベースからメールアドレスが一致するメンバーを取得
        $member = Member::where('email', $email)->first();

        // 認証コードが一致するか確認
        if ($member->token === $token) {
        return view('resetPassword')->with(['member' => $member]);
        }

        // 認証に失敗した場合
        return back()->withErrors(['token' => '認証コードが正しくありません。'])->withInput();
    }

    /**
     * パスワード再設定画面(パスワードを忘れた場合)に認証処理をする
     * @param Request $request
     * @return view
     */
    public function resetPassword(Request $request)
    {
        // バリデーション
        $request->validate([
            'password' => 'required|string|confirmed',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');

        // パスワードを変更を保存
        $member = Member::where('email', $email)->first();
        $member->password = Hash::make($request->password);
        $member->save();

        return view('registerCheck')->with(['member' => $member]);
    }

    /**
     * パスワード変更画面(ログイン中)を表示する
     * @param Request $request
     * @return view
     */
    public function change(Request $member)
     {
        return view('change')->with(['member' => $member]);
     }

    /**
     * パスワード変更画面(ログイン中)を表示する
     * @param Request $request
     * @return view
     */
    public function changePassword(Request $request)
    {
        // バリデーション
        $request->validate([
            'password' => 'required|string',
        ]);
        $name = $request->input('name');
        $password = $request->input('password');

        // パスワードを変更を保存
        $member = Member::where('name', $name)->first();
        $member->password = Hash::make($request->password);
        $member->save();

        return view('registerCheck')->with(['member' => $member]);
    }

}
