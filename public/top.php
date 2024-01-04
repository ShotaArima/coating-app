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
        header('Location: login.php');
        return;
    }
    // ログインする処理
    $result = UserLogic::login($email, $password);
    // ログイン失敗時の処理
    if(!$result)
    {
        header('Location: login.php');
        return;
    }
    echo 'ログイン成功です。';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>ユーザ登録完了画面</title>
    </head>
    <body>
        <?php if(count($err) > 0): ?>
            <?php foreach($err as $e): ?>
                <p><?php echo $e ?></p>
            <?php endforeach ?>
        <?php else: ?>
            <p>ユーザ登録が完了しました。</p>
            <a href="login.php">戻る</a>
        <?php endif ?>
        </body>
</html>