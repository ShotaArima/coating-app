<?php

    session_start();

    require_once '../classes/UserLogic.php';
    require_once '../functions.php';

    // ログインしているか判定し、していなかったら新規登録画面へ返す
    $result = UserLogic::checkLogin();

    if($result)
    {
        $_SESSION['login_err'] = 'ユーザを登録してログインしてください。';
        header('Location: login_form.php');
    }

    $login_user = $_SESSION['login_user'];

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>マイページ</title>
    </head>
    <body>
        <h2>マイページ</h2>
        <p>メールアドレス：<?php echo h($login_user['email']) ?></p>
        <a href="./login.php">ログアウト</a>
        </body>
</html>