<?php

require_once __DIR__.'/../autoload.php';
$l = new Login();
$log = $_POST['login'];
$pas = $_POST['pas'];
$logins = $l::findAll();
session_start();
var_dump($logins);

foreach ($logins->items as $item) {
    echo $item->login;
    /*if ($item->login == $log) {
        $_SESSION['error'] = 'Такой логин уже существует!';
        header('Location: ../views/regist.php');
        exit;
    }*/

}
if (empty($log) || empty($pas)) {
    header('Location: ../views/regist.php');
    exit;
} else
    //$sq = "INSERT INTO info(login,pasword)VALUE ('" . $log . "','" . $pas . "')";
    $l->Insert($log,$pas);

header('Location: /index.php');


?>
