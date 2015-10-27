<?php
session_start();
require_once __DIR__.'/../function.php';
require_once __DIR__.'/../autoload.php';

if(empty($_POST['title_news']) || empty($_POST['text_news']))
{
    $_SESSION['error'] = 'На заполнены поля!';
    header('Location: /logon.php');
    exit;
}

$name = $_POST['title_news'];
$text = $_POST['text_news'];
$ispoln = $_POST['ispolnitel'];
$ispoln2 = $_POST['ispolnitel2'];
$ispoln3 = $_POST['ispolnitel3'];
$ispoln4 = $_POST['ispolnitel4'];
$ispoln5 = $_POST['ispolnitel5'];
$otvets = $_POST['otvets'];
$date = date("F j, Y, g:i a");
$avtor=getUser();
$img = new Login;
    $avt=getUser();
    $avtors= $img::findAll();
    foreach ($avtors as $key) {
        if($key->login == $avt)
            $img_src = $key->login;
    };



$b = new News;
$b->insert($name,$text,$avtor,$ispoln,$ispoln2,$ispoln3,$ispoln4,$ispoln5,$otvets);




header('location: /../views/logon.php');