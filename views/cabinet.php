
<?php
require_once __DIR__.'/../autoload.php';

require __DIR__."/../function.php";

if (!isUser()){
    header('Location: /index.php');
    exit;
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Мой Блог</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="../css/styles_blog.css" rel="stylesheet">
</head>
<body>
<?php include __DIR__.'/../views/header.php';?>
<div id="masthead">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1>Привет, <?php echo getUser(); ?>
                    <p class="lead"></p>
                </h1>
            </div>
            <div class="col-md-5">
                <div class="well well-lg">
                    <div class="row">
                        <div class="col-sm-12">
                            Ad Space
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /cont -->


</div>

<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->

    <!-- Название элемента input определяет имя в массиве $_FILES -->
    <!--Имя файла: <input type="text" name="foto_name">-->
    Отправить этот файл: <input name="image" type="file" lable="file"/>
    <input type="submit" value="Добавить файл" name="submit"/>
</form>

<br><br>
<?php
//$avatars = new User;?>
<?php $images = News::findAll(); ?>
<?php
// загрузка файла
$files = __DIR__.'/../img/';
$nazva = $_POST['foto_name'];
$cook=getUser();

upload_file_cabinet($files ,$cook);


//показ картинок
//* FROM images');


?>
<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <!--/stories

                        -->
                        <div class="row">



                        </div>

                    <hr>
                    <hr>
                    <!--/stories
                    <a href="/" class="btn btn-primary pull-right btnNext">More <i class="glyphicon glyphicon-chevron-right"></i></a>
                    -->
                </div>
            </div>
        </div><!--/col-12-->
    </div>
</div>

<?php
$avt=getUser();
$avtors= Login::findAll();
foreach ($avtors as $key) {
if($key->login==$avt)
$img_src = $key->img;
};

?>


    <p style="width:150px;text-align:center;"><?php echo $avt;?>
        <img src="../img/<?php echo $img_src;?>" width="150px">
    </p>




<br>

<br>
<a href="/logout.php">Выход</a>
</body>
</html>
