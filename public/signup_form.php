<?php
    session_start();
    require_once '../classes/UserLogic.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="witdh=device-width, initial-scale=1.0">
        <title>ユーザ登録</title>
    </head>
    <body>
        <h2>ユーザ登録フォーム</h2>
        <form action="register.php" method="POST">
            <p>
                <label for="email">メールアドレス：</label>
                <input type="email" name="email">
            </p>
            <p>
                <label for="password">パスワード：</label>
                <input type="password" name="password">
            </p>
            <p>
                <label for="password_conf">パスワード確認：</label>
                <input type="password" name="password_conf">
            </p>
            <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
            <p>
                <input type="submit" value="新規登録">
            </p>
        </form>
    </body>
</html>