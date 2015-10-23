<?php

session_start();
require __DIR__.'/../function.php';
require_once __DIR__.'/../autoload.php';
$images = News::findAll();

                $files = __DIR__.'/../img/';
                $nazva = $_POST['foto_name'];
                $cook=getUser();
if(upload_file_cabinet($files ,$cook) == true){
    $_SESSION['error'] = 'Файл загружен!';
}else $_SESSION['error'] = 'Файл не загружен, попробуйте переименовать!';
                //upload_file_cabinet($files ,$cook);

header('location: /../views/cabinet.php');