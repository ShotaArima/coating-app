<?php

    session_start();

    require_once '../classes/UserLogic.php';
    require_once '../functions.php';
    require_once '../classes/diaryLogic.php';

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
        <form action="logout.php" method="POST">
            <input type="submit" name="logout" value="ログアウト">
        </form>

        <h2>コーチング記録</h2>
        <form action="diary.php" method="POST">
            <input type="submit" name="diary" value="コーチング記録作成">
        </form>
        <!-- ここからコーチング日記の表示 -->
        <?php
            $result = diaryLogic::getDiary($login_user['user_id']);
            if (!$result)
            {
                echo "<p>コーチング日記はまだありません。</p>";
                return;
            }
            else
            {
                foreach($result as $diary)
                {
                    echo "<p>日付: " . htmlspecialchars($diary['date']) . "</p>";
                    echo "<p>記録: " . htmlspecialchars($diary['text']) . "</p>";
                }
            }
        ?>

    </body>
</html>