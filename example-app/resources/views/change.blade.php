<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>パスワード変更</h1>
        <h2>{{ $member->name }}さん新しいパスワードを入力してください</h2>
        <form method="POST" action="{{ route('changePassword') }}">
            @csrf
            <div class="reg_value">
                <input type="hidden" name="name" value="{{ $member->name }}">
                <input type="password" name="password" required placeholder="新しいパスワードを入力してください">
            </div>
            <div class="reg_value">
                    <button type="submit">変更</button>
            </div>
        </form>
    </div>
    <div class="send">
        <a href="{{ route('login') }}">ログアウト</a>
    </div>
</body>
</html>
