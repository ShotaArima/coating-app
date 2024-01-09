<?php
    session_start();

    require_once '../classes/UserLogic.php';

    // エラーメッセージ
    $err = [];

    // バリデーション
    if(!$email = filter_input(INPUT_POST, 'email'))
    {
        $err['email'] = 'メールアドレスを記入してください。';
    }
    $password = filter_input(INPUT_POST, 'password');
    if($password !== filter_input(INPUT_POST, 'password'))
    {
        $err['password'] = 'パスワードを記入してください。';
    }

    if(count($err) > 0)
    {
        // エラーがあった場合は戻す
        $_SESSION['err'] = $err;
        header('Location: login_form.php');
        return;
    }
    // ログインする処理
    $result = UserLogic::login($email, $password);
    // ログイン失敗時の処理
    if(!$result)
    {
        header('Location: login_form.php');
        return;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>ログイン完了</title>
    </head>
    <body>
        <h2>ログインが完了</h2>
        <p>ログインしました。</p>
        <a href="./mypage.php">マイページへ</a>
    </body>
</html>