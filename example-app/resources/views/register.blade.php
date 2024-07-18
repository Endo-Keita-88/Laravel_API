<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>会員登録</h1>
        <form method="POST" action="{{ route('registerCreate') }}">
            @csrf
            <div class="reg_value">
                {{ $member->email }}<br>
            </div>
            <div class="reg_value">
                <input type="text" id="name" name="name" required placeholder="名前を入力してください">
            </div>
            <div class="reg_value">
                <input type="password" id="password" name="password" required placeholder="パスワードを入力してください">
            </div>
            <div class="reg_value">
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="パスワードをもう一度入力してください">
            </div>
            <div class="reg_value">
                <button type="submit">登録</button>
            </div>
        </form>
    </div>
</body>
</html>
