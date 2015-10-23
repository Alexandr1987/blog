<?php
require __DIR__ . '/../function.php';
require_once __DIR__.'/../autoload.php';


$news = News::findAll();

$cret = new News();

foreach($news as $rey){
    if ($rey->id == get_id())

    {
        $cret->deleteById($rey->id);

    }
}

header('Location: /../views/cabinet.php');
