<?php

require_once __DIR__.'/../autoload.php';
abstract class Models
{
    const TABLE = 'new_news';


    public static function findAll(){
        $dbh = new Connection();
        $sql = 'SELECT * FROM ' . static::TABLE . '';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, static::class);
    }



    public function deleteById($id){
        $this->id = $id;
        $dbh = new Connection();
        $sql = 'DELETE FROM ' . static::TABLE .' WHERE id='.$id;
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function update($title,$id){
        $this->id = $id;
        $this->title = $title;
        $dbh = new Connection();
        $sql = "UPDATE new_news SET title='$title' WHERE id='$id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }




}