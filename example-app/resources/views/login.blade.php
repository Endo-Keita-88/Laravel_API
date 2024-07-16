<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form method="POST" name="login_form" action="{{ route('show') }}">
            @csrf
            <div class="login_form_top">
                <h1>ログイン画面</h1>
                <p>メールアドレス、パスワードをご入力の上、「ログイン」ボタンをクリックしてください。</p>
            </div>
            <div class="login_form_btm">
                <input ttype="email" name="email" required placeholder="メールアドレスを入力してください"><br>
                <input type="password" name="password" required placeholder="パスワードを入力してください"><br>
                @error('email')
                 <span>{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">ログイン</button>
        </form>
        <div class="send">
            <a href="{{ route('send') }}">新規会員登録はこちら</a>
        </div>
        <div class="forget_pass">
            <a href="/reset">パスワードを忘れた方はこちら</a>
        </div>
    </body>
</html>
