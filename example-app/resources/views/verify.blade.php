<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>メール認証</h1>
        <h2>{{ $member->email }}に送信されたコードを入力してください</h2>

        <form method="POST" action="{{ route('tokenCheck') }}">
            @csrf
            <div class="reg_value">
                <input type="text" id="token" name="token" required placeholder="コードを入力してください">
            </div>
            @error('token')
                <span>{{ $message }}</span>
            @enderror
            <div class="reg_value">
                    <button type="submit">認証</button>
            </div>
        </form>
    </div>
    <div class="back-link">
        &laquo; <a href="{{ route('login') }}">戻る</a>
    </div>
</body>
</html>
