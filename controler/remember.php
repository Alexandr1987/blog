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
        $_SESSION['remember'] = 'Проверьте почту!';
        $to      = $mail;
        $subject = 'Напоминание логина и пароля на Мой Блог';
        $message = 'Ваш логин:'.$items->login.'Ваш пароль:'.$items->pasword;

        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);

        header('Location: ../views/open.php');
    }
    else header('Location: ../views/remember.php');
}





