<?php
require __DIR__."/function.php";
require_once __DIR__.'/autoload.php';
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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
  <!--[if lt IE 9]>
  <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <link href="css/styles_blog.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<header class="navbar  navbar-default navbar-fixed-top navbar-inverse" role="banner">
  <div class="container">
    <div class="navbar-header">

      <a href="../logon.php" class="navbar-brand">Главная</a>

    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="#"></a>
        </li>
        <li>
          <a href="#"></a>
        </li>
        <li>
          <a href="#"></a>
        </li>
        <li>
          <a href="#"></a>
        </li>

      </ul>

      <ul class="nav navbar-right navbar-nav">
        <li >

          <a href="views/cabinet.php"><?php echo getUser(); ?> <span class=" glyphicon glyphicon-user" aria-hidden="true">

                        </span></a>
        </li>
        <li> <a href="/logout.php">Выход</a></li>
      </ul>

    </nav>


  </div>
</header>


<div class="container">

  <div class="row">
    <!-- Button trigger modal -->

    <div class="col-md-12">

      <div class="text-center" style="position:fixed;left:90%;top:50px;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Добавить новость</button></div>
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
          <div class="modal-content text-center" style="padding: 30px;">
            <form class="form-horizontal" action="/controler/add.php" method="POST">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-10 col-sm-offset-1 col-sm-10">Заголовок</label>
                <div class="col-sm-10 col-sm-offset-1 col-sm-10 text-center">
                  <input type="text" name="title_news" class="form-control " >
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-10 col-sm-offset-1 col-sm-10">Текст</label>
                <div class="col-sm-offset-1 col-sm-10 text-center">
                  <textarea  class="form-control" rows="6" name="text_news"></textarea>

                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-1 col-sm-10">
                  <button type="submit" class="btn btn-default" name="submit">Добавить</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="panel">
        <div class="panel-body">
          <!--/stories-->

          <?php $newses = News::findAll();?>

          <?php foreach ($newses as $key): ?>
            <?php $news_avtor = $key->avtor; ?>
            <?php  $id = $key->id?>
            <?php $avtors = Login::findAll(); ?>

            <?php foreach ($avtors as $rey): ?>
              <?php $login_name = $rey->login; ?>

              <?php if ($news_avtor == $login_name): ?>
                <?php $img_src = $rey->img; ?>

              <?php endif; ?>
            <?php endforeach; ?>

            <div class="row">
              <br>
              <div class="col-md-2 col-sm-3 text-center" >
                <a class="story-img" href="#"><img src="img/<?php echo $img_src ?>" style="width:100px;height:100px" class="img-circle"></a>
                <?php echo $news_avtor;?>
              </div>
              <p><?php echo $id;?></p>
              <div class="col-md-10 col-sm-9" style="border:1px solid #ccc;">
                <h3><?php echo $key->title; ?></h3>
                <div class="row">
                  <div class="col-xs-9" >
                    <p style="height:100px;text-overflow: ellipsis;overflow:hidden;"><?php echo $key->text;?></p>
                    <p class="lead"><button class="btn btn-primary" ><a href="/views/news_name.php?id=<?=$id ?>" style="color:#fff;">Подробнее...</a></button></p>
                    <p class="pull-right"><span class="label label-default"></span> <span class="label label-default"></span> <span class="label label-default"></span></p>
                    <ul class="list-inline"><li><a href="#"><?php echo $key->date;?></a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i></li><li><i class="glyphicon glyphicon-share"></i></a></li></ul>
                  </div>
                  <div class="col-xs-3"></div>
                </div>
                <br><br>
              </div>

            </div>
          <?php endforeach; ?>

          <div class="row">
            <br>

            <p></p>
            <div class="col-md-12 col-sm-9" style="border:1px solid #ccc;">
              <h3></h3>

              <div class="row">

                <div class="col-xs-8" >

                </div>
                <div class="col-xs-3"></div>
              </div>
              <br><br>
            </div>

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


<br>

<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>