<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login_id</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>こんにちは、{{ $member->name }}さん</h1>
            <div class="send">
                <a href="{{ route('login') }}">ログアウト</a>
            </div>
            <div class="forget_pass">
                <form method="GET" name="login_form" action="{{ route('change') }}">
                    <input type="hidden" name="name" value="{{ $member->name }}">
                    <button type="submit">パスワードを変更する</button>
                </form>
            </div>
    </div>
</body>
</html>
