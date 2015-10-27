<?php
//session_start();
require_once __DIR__.'/../function.php';
require_once __DIR__.'/../autoload.php';

/*if(empty($_POST['title_news']) || empty($_POST['text_news']))
{
    $_SESSION['error'] = 'На заполнены поля!';
    header('Location: /logon.php');
    exit;
}
*/
$name = $_POST['title_golos'];
$text = $_POST['text_golos'];

$date = date("F j, Y, g:i a");
$avtor=getUser();




$b = new Golos;
$b->insert($name,$text,$avtor);




header('location: /../views/golos.php');
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 27.10.2015
 * Time: 20:36
 */