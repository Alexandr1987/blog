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

        <div class="col-md-12">
            <div style="padding-top:50px;">
<?php $id = get_id(); ?>

<?php $newses= News::findAll();?>
<?php foreach ($newses as $key):?>
    <?php if ($id == $key->id ):?>
        <h2><?php echo $key->title;?></h2>
        <p><?php echo $key->text;?></p>
        <p><?php echo $key->date;?></p>

    <?php endif; ?>

<?php endforeach; ?>

<a href="/logon.php">назад</a>
                </div>
            </div>
    </div>
</div>
</body>
</html>





