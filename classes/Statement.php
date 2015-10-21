<?php

class Statement
    extends PDOStatement
{

    public function fetchOne(){
        $data = $this->fetch(PDO::FETCH_NUM);
        return $data[0];
    }
};