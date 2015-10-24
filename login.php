<?php
require_once __DIR__ . "/function.php";
$login = $_POST['login'];
$password = $_POST['pas'];
setcookie('auth', $login, time()+86400);

if (!chekLoginPassword($login, $password)){
	header('Location: /index.php');
	exit;
}

if(empty($_POST['login']) || empty($_POST['pas'])){
	header('Location: /index.php');
	exit;
}



header('Location: /views/logon.php');
exit;