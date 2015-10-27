<?php
require_once __DIR__.'/../autoload.php';

require __DIR__."/../function.php";

if (!isUser()){
    header('Location: /index.php');
    exit;
}
session_start();
?>


<?php include __DIR__.'/../views/header.php';?>
<div id="masthead">
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-7">
                <h1>Привет, <?php echo getUser(); ?>
                    <p class="lead"></p>
                </h1>


                <!-- Выводим кнопки на исполнении, задача и удалить -->
                <ol>

                <?php $avtnews = News::findAll();?>

                <?php $coments = Coments::findAll();?>
                <?php foreach ($avtnews as $key):?>

                    <?php if ($key->avtor == getUser() ):?>


                        <li>
                            <a href="/views/news_name.php?id=<?=$key->id ?>" style="color:#000;display:block;width:250px;"><?php echo $key->title?> &nbsp;&nbsp;<?php echo $key->date?></a>
                            <button type="button" class="btn btn-success">На исполнении</button>
                            <a href="/controler/new_delete.php?id=<?=$key->id ?>">
                                <button type="button" class="btn btn-primary"  >Удалить</button>
                            </a>
                            <?php foreach($coments as $rey):?>
                                <?php if($rey->id_news == $key->id):?>
                                    <span><?php echo $rey->text;?></span>
                                    <span><?php echo $rey->avtor;?></span>
                                <?php endif; ?>

                            <?php endforeach;?>
                        </li>
                    <?php endif; ?>

                <?endforeach;?>
                </ol>

                <ol>
                    <!-- Выводим кнопки Надо сделать и ответственный-->
                    <?php foreach ($avtnews as $key):?>

                    <?php if ($key->ispoln == getUser() || $key->ispoln2 == getUser() || $key->ispoln3 == getUser() || $key->ispoln4 == getUser() || $key->ispoln5 == getUser()|| $key->otvets == getUser()):?>
                    <li><a href="/views/news_name.php?id=<?=$key->id ?>" style="color:#000;display:block;width:150px;"><?php echo $key->title?></a><button type="button" class="btn btn-danger"  >Надо сделать!</button>
                            <?php if($key->otvets == getUser()):?>
                                <?php echo '<button type="button" class="btn btn btn-warning"  >Ответственный</button>'; ?>
                                <?php foreach($coments as $rey):?>
                                    <?php if($rey->id_news == $key->id):?>

                                        <span><?php echo $rey->text;?></span>
                                        <span><?php echo $rey->avtor;?></span>

                                    <?php endif; ?>

                                <?php endforeach;?>
                            <?php endif; ?>

                    </li>
                        <?php endif; ?>

                    <?endforeach;?>

                </ol>

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
