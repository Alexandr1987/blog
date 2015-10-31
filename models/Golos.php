<?php
require_once __DIR__.'/../autoload.php';
class Golos
    extends Models
{
    const TABLE = 'golos';


    public static function findAll(){
        $dbh = new Connection();
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public function deleteById($id){
        $this->id = $id;
        $dbh = new Connection();
        $sql = 'DELETE FROM ' . static::TABLE .' WHERE id='.$id;
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function updateById($id,$golos){
        $this->golos = $golos;
        $dbh = new Connection();
        $sql = "UPDATE golos SET golos='$golos' WHERE id='$id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function update($title,$id){
        $this->id = $id;
        $this->title = $title;
        $dbh = new Connection();
        $sql = "UPDATE golos SET title='$title' WHERE id='$id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function insert($name,$text,$avtor,$img_src=''){


    $this->name = $name;
    $this->text = $text;
    $this->avtor = $avtor;
    $this->img_src = $img_src;
    $dbh = new Connection();
    $sql = "INSERT INTO golos (title, text, avtor, img, date) VALUES ('" . $name . "','" . $text . "','" . $avtor . "','" . $img_src . "',NOW())";
    $sth = $dbh->prepare($sql);
    $sth->execute();

}



}