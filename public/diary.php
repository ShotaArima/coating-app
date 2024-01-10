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

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>コーチング記録入力画面</title>
    </head>
    <body>
        <h2>記録画面</h2>

        <form action="diary_conf.php" method="POST">
            <p>
                <label for="text">記録</label>
                <input type="text" name="text">
            </p>
            <input type="submit" name="diary" value="コーチング日記作成">
        </form>
        <a href="mypage.php">mypageに戻る</a>
    </body>
</html>