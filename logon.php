<?php
require __DIR__."/function.php";

if (!isUser()){
	header('Location: /index.php');
	exit;
}

?>
<?php include __DIR__.'/views/header.php';?>
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
              <?php

              include_once __DIR__ . '/views/form.php';
              ?>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div><!-- /cont -->
  
 
</div>

<div class="container">
  <div class="row">
    
    <div class="col-md-12"> 
      <div class="panel">
        <div class="panel-body">
          <!--/stories-->
		  <?php $g = new Sql('localhost','root','','news');?>
		  <?php $newses = $g->get_info_news('new_news');?>
	    	<?php foreach ($newses as $key => $news):?>
		      <?php $id = $news["id"];?>
              <?php $news_avtor = $news["avtor"];?>
              <?php  $avtors = $g->get_info('info');?>
                <?php foreach ($avtors as $rey => $ava):?>
                  <?php $login_name = $ava['login'];?>
                  <?php if($news_avtor == $login_name){
                  $img_src = $ava['img'];}?>

                <?php endforeach;?>

		  <div class="row">    
            <br>
            <div class="col-md-2 col-sm-3 text-center" >
              <a class="story-img" href="#"><img src="img/<?php echo $img_src ?>" style="width:100px;height:100px" class="img-circle"></a>
            </div>
            <p><?php echo $news["id"];?></p>
            <div class="col-md-10 col-sm-9" style="border:1px solid #ccc;">
              <h3><?php echo $news["title"]; ?></h3>
              <div class="row">
                <div class="col-xs-9" >
                  <p style="height:100px;text-overflow: ellipsis;overflow:hidden;"><?php echo $news["text"];?></p>
                  <p class="lead"><button class="btn btn-primary" ><a href="/views/news_name.php?id=<?=$id ?>" style="color:#fff;">Подробнее...</a></button></p>
                  <p class="pull-right"><span class="label label-default">keyword</span> <span class="label label-default">tag</span> <span class="label label-default">post</span></p>
                  <ul class="list-inline"><li><a href="#"><?php echo $news["date"];?></a></li><li><a href="#"><i class="glyphicon glyphicon-comment"></i> 4 Comments</li><li><i class="glyphicon glyphicon-share"></i> 34 Shares</a></li></ul>
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
<a href="/logout.php">Выход</a>
</body>
</html>
