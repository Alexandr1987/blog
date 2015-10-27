<?php
require __DIR__ . "/../function.php";
require_once __DIR__ . '/../autoload.php';
session_start();
if (!isUser()){
  header('Location: ../index.php');
  exit;
}

?>


<?php require_once __DIR__ . '/header.php';?>
<div class="container" style="margin-top:100px;">

  <div class="row" >
    <!-- Button trigger modal -->

    <div class="col-md-12">

      <div class="text-center" style="position:fixed;left:90%;top:50px;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Добавить задачу</button></div>
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">
          <div class="modal-content text-center" style="padding: 30px;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <form class="form-horizontal" action="/controler/add.php" method="POST">
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-offset-1 col-sm-10">Заголовок</label>
                <div class="col-sm-10 col-sm-offset-1 col-sm-10 text-center">
                  <input type="text" name="title_news" class="form-control " >
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-offset-1 col-sm-10">Ответственный</label>
                <div class="col-sm-10 col-sm-offset-1 col-sm-10 text-center">
                  <select class="form-control" name="otvets">
                    <option ></option>
                    <?php $logins = Login::findAll();?>
                    <?php foreach($logins as $isp):?>
                      <option ><?php echo $isp->login ?></option>
                    <?endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail3" class="col-sm-10 col-sm-offset-1 col-sm-10">Исполнитель</label>
                <div class="col-sm-2 col-sm-offset-1 text-center">
                  <select class="form-control" name="ispolnitel">
                    <option ></option>
                    <?php $logins = Login::findAll();?>
                      <?php foreach($logins as $isp):?>
                    <option ><?php echo $isp->login ?></option>
                    <?endforeach;?>
                  </select>
                </div>
                <div class="col-sm-2  text-center">
                  <select class="form-control" name="ispolnitel2">
                    <option ></option>
                    <?php $logins = Login::findAll();?>
                    <?php foreach($logins as $isp):?>
                      <option ><?php echo $isp->login ?></option>
                    <?endforeach;?>
                  </select>
                </div>
                <div class="col-sm-2  text-center">
                  <select class="form-control" name="ispolnitel3">
                    <option ></option>
                    <?php $logins = Login::findAll();?>
                    <?php foreach($logins as $isp):?>
                      <option ><?php echo $isp->login ?></option>
                    <?endforeach;?>
                  </select>
                </div>
                <div class="col-sm-2 text-center">
                  <select class="form-control" name="ispolnitel4">
                    <option ></option>
                    <?php $logins = Login::findAll();?>
                    <?php foreach($logins as $isp):?>
                      <option ><?php echo $isp->login ?></option>
                    <?endforeach;?>
                  </select>
                </div>
                <div class="col-sm-2 text-center">
                  <select class="form-control" name="ispolnitel5">
                    <option ></option>
                    <?php $logins = Login::findAll();?>
                    <?php foreach($logins as $isp):?>
                      <option ><?php echo $isp->login ?></option>
                    <?endforeach;?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="inputPassword3" class="col-sm-10 col-sm-offset-1">Текст</label>
                <div class="col-sm-offset-1 col-sm-10 text-center">
                  <textarea  class="form-control" rows="6" name="text_news"></textarea>

                </div>
              </div>

              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
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
          <?php if(!empty($_SESSION['error'])):?>
            <?php echo '<p style="text-align: center;">'.$_SESSION['error'].'</p>'?>
            <?php unset($_SESSION['error']); ?>
          <?php endif;?>
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
                <a class="story-img" href="#"><img src="../img/<?php echo $img_src ?>" style="width:150px;height:150px;margin-top:40px;" class="img-circle"></a>
                <?php echo $news_avtor;?>
              </div>
              <p><?php echo $id;?></p>
              <div class="col-md-10 col-sm-9" style="border:1px solid #ccc;">
                <h3><?php echo $key->title; ?></h3>
                <div class="row">
                  <div class="col-xs-9" >
                    <p style="height:100px;text-overflow: ellipsis;overflow:hidden;"><?php echo $key->text;?></p>
                    <p class="lead"><a href="news_name.php?id=<?=$id ?>" style="color:#fff;"><button class="btn btn-primary" >Подробнее...</button></a></p>
                    <p class="pull-right"><span class="label label-default"></span> <span class="label label-default"></span> <span class="label label-default"></span></p>
                    <ul class="list-inline"><li><a href="#"><?php echo $key->date;?></a></li><li><a href="#"><?php echo $key->ispoln;?></li><li><i class="glyphicon glyphicon-share"></i></a></li></ul>
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