<?php
require_once __DIR__.'/../autoload.php';

require __DIR__."/../function.php";

if (!isUser()){
    header('Location: /index.php');
    exit;
}
session_start();
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
                <ul>
                <?php $avtnews = News::findAll();?>

                <?php foreach ($avtnews as $key):?>
                    <?php if ($key->avtor == getUser() ):?>


                        <li><p style="width:80%;"><?php echo $key->title?><?php echo $key->date?></p>
                            <a href="/controler/new_delete.php?id=<?=$key->id ?>"><button type="button" class="btn btn-primary"  >Удалить</button></a><br>

                        </li>

                    <?php endif; ?>



                <?endforeach;?>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="well well-lg well-sm well-xs" >


                            <?php
                            $avt=getUser();
                            $avtors= Login::findAll();
                            foreach ($avtors as $key) {
                                if($key->login==$avt)
                                    $img_src = $key->img;
                            };

                            ?>

                            <img src="../img/<?php echo $img_src;?>" style="max-width:405px;padding-bottom:5px;display:block;margin:0 auto;">

                            <div class="">
                                <div style="width:120px;margin:0 auto;">
                                    <!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
                                    <form class="form-inline" enctype="multipart/form-data" method="POST" action="../controler/addImg.php">
                                        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
                                        <div class="form-group">
                                            <div style=" overflow: hidden;   ">
                                                <div  class="btn btn-default" style="width:120px;">Выбрать файл</div>
                                                <input type="file" name="image" id="file" size="1" style="margin-top: -50px; margin-left:-410px; -moz-opacity: 0; filter: alpha(opacity=0); opacity: 0; font-size: 150px; height: 50px;">
                                            </div>
                                            <input  style="width:120px;margin-top: 5px;" type="submit" class="btn btn-default" value="Изменить фото" name="submit"/><br>
                                        </div>


                                    </form>

                                </div>
                                <p style="font-size:12px;text-align: center;"><?php echo $_SESSION['error'];?></p>
                                                <?php unset($_SESSION['error']); ?>

                            </div>



                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">


            </div>
        </div>




    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>
</html>
