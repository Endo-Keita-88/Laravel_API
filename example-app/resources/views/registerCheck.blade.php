<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegisterCheck</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>会員登録が完了しました。</h1>
        <form method="GET" action="{{ url('/') }}">
            @csrf
            <div class="reg_value">
                会員番号： {{ $member->id }}<br>
            </div>
            <div class="reg_value">
               名前： {{ $member->name }}<br>
            </div>
            <div class="reg_value">
               メールアドレス： {{ $member->email }}<br>
            </div>

            <div class="reg_value">
               パスワード： {{ $member->password }}<br>
            </div>
            <div class="reg_value">
                <button type="submit">確認</button>
            </div>
        </form>
    </div>
</body>
</html>
