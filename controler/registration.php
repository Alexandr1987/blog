<?php

require_once __DIR__.'/../autoload.php';

$log = $_POST['login'];
$pas = $_POST['pas'];
$mail = $_POST['mail'];
$logs = new Login();
$logins = $logs::findAll();
session_start();



foreach ($logins as $items ) {
    if ($items->login == $log) {
        $_SESSION['error'] = 'Такой логин уже существует!';
        header('Location: ../views/regist.php');
        exit;
    }

}
if (empty($log) || empty($pas) || empty($mail)) {
    header('Location: ../views/regist.php');
    exit;
} else

    $logs->insert($log,$pas,$mail);

header('Location: /index.php');


?>
