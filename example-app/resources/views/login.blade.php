<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <form name="login_form">
            <div class="login_form_top">
                <h1>ログイン画面</h1>
                <p>メールアドレス、パスワードをご入力の上、「ログイン」ボタンをクリックしてください。</p>
            </div>
            <div class="login_form_btm">
                <input type="id" name="user_id" placeholder="メールアドレスを入力してください"><br>
                <input type="password" name="password"placeholder="パスワードを入力してください">
            </div>
            <button type="submit">ログイン</button>
        </form>
        <div class="send">
            <a href="/send">新規会員登録はこちら</a>
        </div>
        <div class="forget_pass">
            <a href="/forget_pass">パスワードを忘れた方はこちら</a>
        </div>
    </body>
</html>
