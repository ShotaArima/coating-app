<?php

    session_start();

    require_once '../classes/diaryLogic.php';
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

    $date = filter_input(INPUT_POST, 'date');
    $text = filter_input(INPUT_POST, 'text');
    $user_id = $login_user['user_id'];

    // SQLの実行
    $result = diaryLogic::createDiary($user_id, $text, $date);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>記録完了</title>
    </head>
    <body>
        <h2>記録完了</h2>

    </body>
</html>