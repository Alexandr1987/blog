<?php

require_once __DIR__.'/../autoload.php';

class Zakaz
    extends Models{

    const TABLE = 'zakaz';
    public $id;
    public $name;
    public $phone;
    public $articul;
    public $color;
    public $prinyt;

    public static function findAll(){
        $dbh = new ConnectionDiva();
        $sql = 'SELECT * FROM ' . self::TABLE . '';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function update($prinyt,$id){
        $this->id = $id;
        $this->title = $prinyt;
        $dbh = new ConnectionDiva();
        $sql = "UPDATE zakaz SET prinyt='$prinyt' WHERE id='$id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }



    public function insert($name,$phone,$articul,$color,$prinyt,$razmer){
        $this->name = $name;
        $this->phone = $phone;
        $this->articul = $articul;
        $this->color = $color;
        $this->razmer = $razmer;
        $this->prinyt = $prinyt;
        $dbh = new ConnectionDiva();
        $sql = "INSERT INTO zakaz(name,phone,articul,color,prinyt,razmer,date)VALUE ('" . $name . "','" . $phone . "','" . $articul . "','" . $color . "','" . $prinyt . "','" . $razmer . "',NOW())";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function deleteById($id){
        $this->id = $id;
        $dbh = new ConnectionDiva();
        $sql = 'DELETE FROM ' . static::TABLE .' WHERE id='.$id;
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function updateStatus($status,$id){
        $this->id = $id;
        $this->status = $status;
        $dbh = new ConnectionDiva();
        $sql = "UPDATE zakaz SET status='$status' WHERE id='$id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }



}