<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Bootstrap Login Form</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>

<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h1 class="text-center">Введите логин и пароль:</h1>
            </div>
            <div class="modal-body">
                <?php if(!empty($_SESSION['error'])):?>
                    <?php echo '<p style="text-align: center;">'.$_SESSION['error'].'</p>'?>
                    <?php unset($_SESSION['error']); ?>
                <?php endif;?>
                <?php if(!empty($_SESSION['remember'])):?>
                    <?php echo '<p style="text-align: center;">'.$_SESSION['remember'].'</p>'?>
                    <?php unset($_SESSION['remember']); ?>
                <?php endif;?>

                <form class="form col-md-12 center-block" action="/login.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="login" class="form-control input-lg" placeholder="Логин">
                    </div>
                    <div class="form-group">
                        <input type="password"  name="pas" class="form-control input-lg" placeholder="Пароль">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block">Войти</button>
                        <span class="pull-right"> <br>
	                    <a href="/../views/regist.php">Зарегистрироваться</a></span>
                        <span class="pull-left"> <br>
	                    <a href="/../views/remember.php">Забыли логин или пароль</a></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>