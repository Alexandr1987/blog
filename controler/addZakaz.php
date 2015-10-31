<?php
require_once __DIR__.'/../autoload.php';
require_once __DIR__.'/../function.php';


if(!empty($_GET['$i']) && !empty($_GET['id']))
{   $i = (int)$_GET['$i'];
    $id = (int)$_GET['id'];
    $name = getUser();
    $zakaz = new Zakaz();
    $zakazes = $zakaz::findAll();
    foreach($zakazes as $value){
        if($i == 3){
            $zakaz->deleteById($id);
        }elseif($i == 2){
                $zakaz->updateStatus($i,$id,$name);
            }
        elseif($i == 1){
            $zakaz->updateStatus($i,$id,$name);
        }
        elseif($i == 4){
            $zakaz->updateStatus($i,$id,$name);
        }



        /*if(get_id() == $id)
        {
            ++$golos;
            $memory = new Golos();
            $memory->updateById($id,$golos);
        }
*/
    }


}

header('location: /../views/admin.php');
