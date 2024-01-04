<?php

    require_once '../classes/UserLogic.php';

    // エラーメッセージ
    $err = [];

    // バリデーション
    if(!$email = filter_input(INPUT_POST, 'email'))
    {
        $err['email'] = 'メールアドレスを記入してください。';
    }
    $password = filter_input(INPUT_POST, 'password');
    // 正規表現
    if(!preg_match("/\A[a-z\d]{8,100}+\z/i",$password))
    {
        $err['password'] = 'パスワードは英数字8文字以上100文字以下にしてください。';
    }
    $password_conf= filter_input(INPUT_POST, 'password_conf');
    if ($password !== $password_conf)
    {
        $er['password_conf']r = '確認用パスワードと異なっています。';
    }

    if(count($err) === 0)
    {
        // ユーザーを登録する処理
        $hasCreated = UserLogic::createUser($_POST);

        if(!$hasCreated)
        {
            $err['email'] = '登録に失敗しました。';
        }

    }
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
            <a href="./signup_form.php">戻る</a>
        <?php endif ?>
        </body>
</html>