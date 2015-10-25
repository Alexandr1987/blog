<?php session_start();?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Bootstrap Login Form</title>
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>

<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>


                <h1 class="text-center">Регистрация</h1>
            </div>
            <div class="modal-body">
                <?php if(!empty($_SESSION['notremember'])):?>
                    <?php echo '<p style="text-align: center;">'.$_SESSION['notremember'].'</p>'?>
                    <?php unset($_SESSION['notremember']); ?>
                <?php endif;?>
                <form class="form col-md-12 center-block" action="/controler/remember.php" method="POST"">

                <div class="form-group">
                    <input type="email"  name="mail" class="form-control input-lg" placeholder="Email">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-lg btn-block">Напомнить</button>

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
<script src="../js/bootstrap.min.js"></script>
</body>
</html>