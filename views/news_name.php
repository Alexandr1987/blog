<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>new_news</title>

    <?php require_once __DIR__.'/../classes/sql.php';?>
    <?php require_once __DIR__.'/../function.php';?>

</head>
<body>
<?php $y = new Sql('localhost','root','','news');

$newses = $y->get_info('new_news');?>
<?php foreach ($newses as $key => $value):?>
    <?php if ($id == $value['id']):?>
        <h2><?php echo $value['title'];?></h2>
        <p><?php echo $value['text'];?></p>
        <p><?php echo $value['date'];?></p>

    <?php endif; ?>

<?php endforeach; ?>

<a href="/logon.php">назад</a>
</body>
</html>





