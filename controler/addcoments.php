<?php


require_once __DIR__.'/../function.php';
require_once __DIR__.'/../autoload.php';

if(empty($_POST['text_news'])) {
    echo 'Не заполнен текст!';
    exit;
}

$id_news = $_POST['id'];
$text = $_POST['text_news'];
$avtor = getUser();
$coments = new Coments();

$coments->insert($text,$avtor,$id_news);


header('location: /../views/logon.php');