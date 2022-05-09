<?php
session_start();

// 入力画面からのアクセスでなければ戻す
if(!isset($_SESSION['form'])){
    header('Locstion: index.php');
    exit();
}else{
    $post = $_SESSION['form'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // メールを送信する
    $to = 'taiyo20011219@gmail.com';
    $from = $post['mail'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前：{$post['name']}
メールアドレス：{$post['mail']}
電話番号：{$post['tel']}
内容：
{$post['comment']}
EOT;
    // var_dump($body);
    // exit();
    mb_send_mail($to, $subject, $body, "From:{$from}");

    // セッションを消してお礼画面へ
    unset($_SESSION['from']);
    header('Location:thanks.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAIYO PORTFOLIO Contact確認画面</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/slick.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- conform -->
    <div class="conform">
        <h1 class="conform__ttl">Contact</h1>
        <form action="" method="post" class="conform__form">
            <h2 class="conform__form-ttl">Contact 内容確認</h2>
            <p class="conform__form-txt">
                お問い合わせ内容はこちらでよろしいでしょうか<br>
                よろしければ　Send Message ボタンを押してください
            </p>
            <div class="conform__content">
                <table>
                    <tr>
                        <th><label for="">Name.</label></th>
                        <td><?php echo htmlspecialchars($post['name']); ?></td>
                    </tr>
                    <tr>
                        <th><label for="">Mail.</label></th>
                        <td><?php echo htmlspecialchars($post['mail']); ?></td>
                    </tr>
                    <tr>
                        <th><label for="">Phone.</label></th>
                        <td><?php echo htmlspecialchars($post['tel']); ?></td>
                    </tr>
                    <tr>
                        <th><label for="">Message.</label></th>
                        <!-- <td><?php if(isset($_POST['comment'])) echo htmlspecialchars($post['comment']); ?></td> -->
                        <td><?php echo htmlspecialchars($post['comment']); ?></td>

                    </tr>
                </table>
            </div>
            <div class="conform__btn-wrapper">
                <a class="conform__btn while" href="index.php#contact">修正する</a>
                <div class="form_submit-box while">
                    <div class="form_submit-box_inner">
                        <img class="button_email-img before" src="img/email-before.png" alt="">
                        <img class="button_email-img after" src="img/email-after.png" alt="">
                        <input type="submit" class="section__wrapper_content_button js-contact_button" value="Send Message">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="js/snap.svg-min.js"></script>
    <script type="text/javascript" src="js/vivus_copy.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="js/slick.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>