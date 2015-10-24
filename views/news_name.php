<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>new_news</title>
    <?php require_once __DIR__.'/../autoload.php'; ?>
    <?php require_once __DIR__.'/../function.php';?>

</head>
<body>
<?php include __DIR__.'/../views/header.php';?>
<div class="container">

    <div class="row">
        <!-- Button trigger modal -->
        <div style="padding-top:150px;">
            <?php $id = get_id(); ?>
            <?php $coments = Coments::findAll();?>
            <?php $newses= News::findAll();?>
            <?php foreach ($newses as $key):?>
                <?php if ($id == $key->id || $_POST['id'] == $key->id ):?>
                    <h2><?php echo $key->title;?></h2>
                    <p><?php echo $key->text;?></p>
                    <p><?php echo $key->date;?></p>
                    <?php foreach($coments as $rey):?>
                        <?php if($key->id == $rey->id_news):?>

                            <?php echo $rey->text;?>
                        <?php endif;?>
                    <?php endforeach; ?>
                <?php endif; ?>

            <?php endforeach; ?>

            <!--<a href="/controler/new_delete.php?id=">Обновить</a>-->
        </div>
        <div class="col-md-12">
            <div class="text-center" style="position:fixed;left:90%;top:50px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Добавить коментарий</button></div>
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content text-center" style="padding: 30px;">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <form class="form-horizontal" action="../controler/addcoments.php" method="POST">
                            <div class="form-group">

                                <div class="col-sm-10 col-sm-offset-1 col-sm-10 text-center" >
                                    <input type="text" name="id" class="form-control " value="<?php echo $id;?>">
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
        </div>
        <?php
/*
        $id_news = $_POST['id'];
        $text = $_POST['text_news'];
        $avtor = getUser();
        $coment = new Coments();
        $coment->insert($text,$avtor,$id_news);?>
*/
?>
        <?php echo $id = $_POST['id']; ?>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>





