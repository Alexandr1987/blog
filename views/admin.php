
    <?php require_once __DIR__.'/../autoload.php';?>
    <?php include __DIR__.'/header.php';?>

    <div class="container" >
        <div class="row">
            <div class="col-md-12">
                <table class="table table-zakaz table-condensed table-bordered text-center">
                    <caption style="text-align: center;">Таблица заказов</caption>
                    <tr>
                        <th>Номер</th>
                        <th>Имя</th>
                        <th>Телефон</th>
                        <th>Артикул</th>
                        <th>Цвет</th>
                        <th>Размер</th>
                        <th>Дата</th>
                        <th>Принят</th>
                        <th>Обработан</th>
                        <th>Удалить</th>
                        <th>Отмена</th>
                        <th>Имя</th>
                    </tr>

    <?php
    $zakaz = new Zakaz();
    $zakazes = $zakaz::findAll();?>
    <?php foreach ($zakazes as $item):?>

                    <?php if($item->status == 4):?>
                    <tr class="danger">
                        <td ><?php echo $item->id;  ?></td>
                        <td ><?php echo $item->name;  ?></td>
                        <td ><?php echo $item->phone;  ?></td>
                        <td ><?php echo $item->articul;  ?></td>
                        <td ><?php echo $item->color;  ?></td>
                        <td ><?php echo $item->razmer;  ?></td>
                        <td ><?php echo $item->date;  ?></td>
                        <td>
                            <a href="../controler/addZakaz.php?$i=1&id=<? echo $item->id;?>">
                                <button type="button" class="btn btn-primary">Принят</button>
                            </a>
                        </td>
                        <td>
                            <a href="../controler/addZakaz.php?$i=2&id=<? echo $item->id;?>">
                                <button type="button" class="btn btn btn-success">Обработан</button>
                            </a>
                        </td>
                        <td>
                            <a href="../controler/addZakaz.php?$i=3&id=<? echo $item->id;?>">
                                <button type="button" class="btn btn-danger">Удалить</button>
                            </a>
                        </td>
                        <td>
                            <a href="../controler/addZakaz.php?$i=4&id=<? echo $item->id;?>">
                                <button type="button" class="btn btn-danger">Отмена</button>
                            </a>
                        </td>
                        <td></td>
                    </tr>





        <?endif;?>
                    <?php if($item->status == 1):?>
                        <tr class="info">
                            <td ><?php echo $item->id;  ?></td>
                            <td ><?php echo $item->name;  ?></td>
                            <td ><?php echo $item->phone;  ?></td>
                            <td ><?php echo $item->articul;  ?></td>
                            <td ><?php echo $item->color;  ?></td>
                            <td ><?php echo $item->razmer;  ?></td>
                            <td ><?php echo $item->date;  ?></td>
                            <td>
                                <a href="../controler/addZakaz.php?$i=1&id=<? echo $item->id;?>">
                                    <button type="button" class="btn btn-primary">Принят</button>
                                </a>
                            </td>
                            <td>
                                <a href="../controler/addZakaz.php?$i=2&id=<? echo $item->id;?>">
                                    <button type="button" class="btn btn btn-success">Обработан</button>
                                </a>
                            </td>
                            <td>
                                <a href="../controler/addZakaz.php?$i=3&id=<? echo $item->id;?>">
                                    <button type="button" class="btn btn-danger">Удалить</button>
                                </a>
                            </td>
                            <td>
                                <a href="../controler/addZakaz.php?$i=4&id=<? echo $item->id;?>">
                                    <button type="button" class="btn btn-danger">Отмена</button>
                                </a>
                            </td>
                            <td></td>
                        </tr>
                    <?endif;?>
                    <?php if($item->status == 2):?>
                        <tr class="success">
                            <td ><?php echo $item->id;  ?></td>
                            <td ><?php echo $item->name;  ?></td>
                            <td ><?php echo $item->phone;  ?></td>
                            <td ><?php echo $item->articul;  ?></td>
                            <td ><?php echo $item->color;  ?></td>
                            <td ><?php echo $item->razmer;  ?></td>
                            <td ><?php echo $item->date;  ?></td>
                            <td>
                                <a href="../controler/addZakaz.php?$i=1&id=<? echo $item->id;?>">
                                    <button type="button" class="btn btn-primary">Принят</button>
                                </a>
                            </td>
                            <td>
                                <a href="../controler/addZakaz.php?$i=2&id=<? echo $item->id;?>">
                                    <button type="button" class="btn btn btn-success">Обработан</button>
                                </a>
                            </td>
                            <td>
                                <a href="../controler/addZakaz.php?$i=3&id=<? echo $item->id;?>">
                                    <button type="button" class="btn btn-danger">Удалить</button>
                                </a>
                            </td>
                            <td>
                                <a href="../controler/addZakaz.php?$i=4&id=<? echo $item->id;?>">
                                    <button type="button" class="btn btn-danger">Отмена</button>
                                </a>
                            </td>
                            <td></td>
                        </tr>
                    <?endif;?>

    <?endforeach;?>
                </table>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

