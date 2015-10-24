<?php

require __DIR__ . '/../function.php';
require_once __DIR__.'/../autoload.php';


//$name = $_POST['title_news'];
if(empty($_POST['text_news'])){

}
$text = $_POST['text_news'];

$news = News::findAll();

$apdat = new News();

foreach($news as $rey){
    if ($rey->id == get_id())

    {
        $cret->update($text,$rey->id);

    }
}

header('Location: /../logon.php');