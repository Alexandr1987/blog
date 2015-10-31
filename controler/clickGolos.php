<?php
require_once __DIR__.'/../function.php';
require_once __DIR__.'/../autoload.php';


if(!empty($_GET['i']) && !empty($_GET['id']))
{
$golosa = Golos::findAll();


foreach($golosa as $value){
     $golos = $value->golos;
     $id = $value->id;


        if(get_id() == $id)
        {
            ++$golos;
            $memory = new Golos();
            $memory->updateById($id,$golos);
            }

}


}

header('location: /../views/golos.php');

