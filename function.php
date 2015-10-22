<?php
require_once __DIR__.'/autoload.php';

 
function logout()
{
    setcookie('auth', '$login', time() - 86400);
}

function isUser()
{
    return isset($_COOKIE['auth']);
}


function getUser()
{
    return $_COOKIE['auth'];
}


//проверка на правильность пароля

function chekLoginPassword($login, $password){
	

	$users = Login::findAll();
	foreach ($users as $value){
		if($value->login == $login && $value->pasword == $password){
			return true;
		}
		
	}
	
	
}


//Загрузка файла
/*function upload_file($uploaddir,$nazva)
{

    $newName = $uploaddir . basename($_FILES['image']['name']);
    $img_name = basename($_FILES['image']['name']);
    $array = scandir($uploaddir);

    if (is_uploaded_file($_FILES['image']['tmp_name']) && empty($nazva) !== true) {
        $res = move_uploaded_file($_FILES['image']['tmp_name'], $newName);
        $files = basename($_FILES['image']['name']);

        if (in_array($img_name, $array) !== true) {
            $result = mysql_query("INSERT INTO images(name,adres)VALUE('" . $nazva . "','" . $files . "')");
            //var_dump($result);
        } else {
            return false;
        }
    } else {
        return false;
    }
}
*/
function upload_file_cabinet($uploaddir,$cook)
{

    $newName = $uploaddir . basename($_FILES['image']['name']);
    $img_name = basename($_FILES['image']['name']);
    $array = scandir($uploaddir);

    if (is_uploaded_file($_FILES['image']['tmp_name']) == true) {
        $res = move_uploaded_file($_FILES['image']['tmp_name'], $newName);
        $files = basename($_FILES['image']['name']);

        if (in_array($img_name, $array) !== true) {
            $loginses = new Login();
            $result = $loginses->update($files,$cook);//mysql_query("UPDATE info SET img='$files' WHERE login='$cook'");
            //var_dump($result);
        } else {
            echo 'Файл не загружен, попробуйте переименовать файл';
        }
    } else {
        return false;
    }
}



$name =$_POST['title_news'];
$text = $_POST['text_news'];

function get_id()
{
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
    }
    return $id;
}




?>