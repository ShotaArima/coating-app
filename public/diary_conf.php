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
        <title>コーチング記録確認画面</title>
    </head>
    <body>
        <h2>確認画面</h2>

        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                // POSTメソッドで送信されたデータを取得
                $text = isset($_POST['text']) ? $_POST['text'] : '';

                // 取得したデータを表示
                echo "<p>記録: " . htmlspecialchars($text) . "</p>";
            }
        ?>
        <form action="diary_regist.php">
            <?php
                // 現在の日付を取得 (YYYY/MM/DD形式)
                $currentDate = date("Y/m/d");
            ?>
            <input type="hidden" name="text" value="<?php echo $text; ?>">
            <input type="hidden" name="date" valuse="<?php echo $currentDate; ?>">
            <input type="submit" name="regist" value="記録">
        </form>
        <a href="mypage.php">mypageに戻る</a>
    </body>
</html>