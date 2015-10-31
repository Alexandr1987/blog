<?php
require_once __DIR__.'/../autoload.php';



if(!empty($_GET['$i']) && !empty($_GET['id']))
{   $i = (int)$_GET['$i'];
    $id = (int)$_GET['id'];

    $zakaz = new Zakaz();
    $zakazes = $zakaz::findAll();
    foreach($zakazes as $value){
        if($i == 3){
            $zakaz->deleteById($id);
        }elseif($i == 2){
                $zakaz->updateStatus($i,$id);
            }
        elseif($i == 1){
            $zakaz->updateStatus($i,$id);
        }
        elseif($i == 4){
            $zakaz->updateStatus($i,$id);
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
