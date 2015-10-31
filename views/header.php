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
    <?php require_once __DIR__.'/../autoload.php';?>

    <?php require_once __DIR__."/../function.php";?>
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
</head>
<body>
<header class="navbar  navbar-default navbar-fixed-top navbar-inverse" role="banner" style="margin-bottom:100px;">
    <div class="container">
        <div class="navbar-header">
            <a href="../views/logon.php" class="navbar-brand">Главная</a>
            <a href="../views/golos.php" class="navbar-brand">Проголосовать</a>
            <a href="../views/admin.php" class="navbar-brand">Заказы</a>
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
                    <a href="cabinet.php"><?php echo getUser(); ?>
                        <?php $col = News::findAll();?>
                        <?php $i = 0;?>
                        <?php foreach($col as $val):?>

                            <?php if($val->ispoln == getUser()|| $val->ispoln2 == getUser() || $val->ispoln3 == getUser()
                            || $val->ispoln4 == getUser()|| $val->ispoln5 == getUser() || $val->otvets == getUser()): ?>
                                <?php $i++;?>
                            <?php endif;?>

                        <?endforeach;?>

                        <span class=" glyphicon glyphicon-user" aria-hidden="true"></span>
                        <span style="color:red;"><?php if ($i>0){echo $i;};?></span>
                    </a>
                </li>
                <li> <a href="/logout.php">Выход</a></li>
            </ul>
        </nav>
    </div>
</header>