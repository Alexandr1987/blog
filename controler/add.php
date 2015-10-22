<?php

require_once __DIR__.'/../function.php';
require_once __DIR__.'/../autoload.php';

$name = $_POST['title_news'];
$text = $_POST['text_news'];
$img = $_POST['image'];
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
$b->insert($name,$text,$avtor);



//$b->insert("INSERT INTO new_news(img) VALUE ('" . $name . "')");
header('location: /../logon.php');