<?php
require_once __DIR__.'/../autoload.php';

session_start();
$mail = $_POST['mail'];
$logs = new Login();
$logins = $logs::findAll();


if (empty($mail)) {
    header('Location: ../views/remember.php');
    exit;
}

foreach ($logins as $items ) {
    if ($items->mail == $mail) {
        $_SESSION['remember'] = 'Логин и пароль отправлены на почту!';
        $to      = $mail;
        $subject = 'Напоминание логина и пароля на Мой Блог';
        $message = 'Ваш логин:'.$items->login."\r\n".'Ваш пароль:'.$items->pasword;

        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To:' .$mail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        header('Location: ../views/open.php');
        exit;
    }
    elseif ($items->mail != $mail){
        $_SESSION['notremember'] = 'Такого email нет!';
        header('Location: ../views/remember.php');
    }
}





