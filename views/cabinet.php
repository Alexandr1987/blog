
<?php
require_once __DIR__."/../classes/sql.php";
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
<header class="navbar navbar-default navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/logon.php" class="navbar-brand">Home</a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Category</a>
                </li>
                <li>
                    <a href="#">Category</a>
                </li>
                <li>
                    <a href="#">Category</a>
                </li>
                <li>
                    <a href="#">Category</a>
                </li>
            </ul>
            <ul class="nav navbar-right navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
                    <ul class="dropdown-menu" style="padding:12px;">
                        <form class="form-inline">
                            <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
                        </form>
                    </ul>
                </li>
            </ul>

        </nav>
        <a href="#">Cabinet</a>
    </div>
</header>
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
    Имя файла: <input type="text" name="foto_name">
    Отправить этот файл: <input name="image" type="file" lable="file"/>
    <input type="submit" value="Добавить файл" name="submit"/>
</form>

<br><br>
<?php
$t = new Sql('localhost','root','','news');?>
<?php $images = $t->get_info('info'); ?>
<?php
// загрузка файла
$uploaddir = __DIR__.'/../img/';
$nazva = $_POST['foto_name'];
$cook=getUser();

upload_file_cabinet($uploaddir ,$cook);


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

<?php $img = new Sql('localhost','root','','news');
$avt=getUser();
$avtors= $img->get_info('info');
foreach ($avtors as $key) {
if($key['login']==$avt)
$img_src = $key['img'];
};
 $img_src;
?>


    <p style="width:150px;text-align:center;"><?php echo $avt;?>
        <img src="../img/<?php echo $img_src;?>" width="150px">
    </p>




<br>

<br>
<a href="/logout.php">Выход</a>
</body>
</html>
