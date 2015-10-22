

<form class="form-horizontal" action="../controler/add.php" method="POST">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Заголовок</label>
        <div class="col-sm-6">
            <input type="text" name="title_news" class="form-control" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-6 control-label">Текст</label>
        <div class="col-sm-6">
            <textarea  class="form-control" rows="3" name="text_news"></textarea>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
            <button type="submit" class="btn btn-default" name="submit">Добавить</button>
        </div>
    </div>
</form>