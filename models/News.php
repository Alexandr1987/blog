<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 22.10.2015
 * Time: 21:59
 */

require_once __DIR__.'/../autoload.php';
class News
    extends Models
{
    const TABLE = 'new_news';


    public static function findAll(){
        $dbh = new Connection();
        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public function deleteById($id){
        $this->id = $id;
        $dbh = new Connection();
        $sql = 'DELETE FROM ' . self::TABLE .' WHERE id='.$id;
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function updateById($text,$id){
        $this->id = $id;
        $dbh = new Connection();
        $sql = "UPDATE new_news SET text='$text' WHERE id='$id'";
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

    public function insert($name,$text,$avtor,$ispoln='',$ispoln2='',$ispoln3='',$ispoln4='',$ispoln5='',$otvets='',$img_src=''){
        $this->ispoln = $ispoln;
        $this->ispoln2 = $ispoln2;
        $this->ispoln3 = $ispoln3;
        $this->ispoln4 = $ispoln4;
        $this->ispoln5 = $ispoln5;
        $this->otvets = $otvets;
        $this->name = $name;
        $this->text = $text;
        $this->avtor = $avtor;
        $this->img_src = $img_src;
        $dbh = new Connection();
        $sql = "INSERT INTO new_news(title, text, avtor, img, ispoln, ispoln2, ispoln3, ispoln4, ispoln5, otvets, date) VALUES ('" . $name . "','" . $text . "','" . $avtor . "','" . $img_src . "','" . $ispoln . "','" . $ispoln2 . "','" . $ispoln3 . "','" . $ispoln4 . "','" . $ispoln5 . "','" . $otvets . "',NOW())";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }


}