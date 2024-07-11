<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>会員登録</h1>
        <h2>メールアドレスを認証します</h2>
        <form method="POST" action="{{ route('email.send') }}">
            @csrf
            <div class="reg_value">
                <input type="email" id="email" name="email" required placeholder="メールアドレスを入力してください">
            </div>
            <div class="reg_value">
                    <button type="submit">送信</button>
            </div>
        </form>
    </div>
    <div class="back-link">
        &laquo; <a href="{{ route('login') }}">戻る</a>
    </div>
</body>
</html>
