<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 17.10.2015
 * Time: 20:35
 */
require_once __DIR__.'/../autoload.php';
class User
{
    const TABLE = 'new_news';


    public static function findAll(){
        $dbh = new Connection();
        $sql = 'SELECT * FROM ' . self::TABLE . '';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function DeleteById($id){
        $this->id = $id;
        $dbh = new Connection();
        $sql = 'DELETE FROM ' . self::TABLE .' WHERE id='.$id;
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function Update($title,$id){
        $this->id = $id;
        $this->title = $title;
        $dbh = new Connection();
        $sql = "UPDATE new_news SET title='$title' WHERE id='$id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function Insert($name,$text,$avtor,$img_src=''){
        $this->name = $name;
        $this->text = $text;
        $this->avtor = $avtor;
        $this->img_src = $img_src;
        $dbh = new Connection();
        $sql = "INSERT INTO new_news(title, text, avtor, img, date) VALUES ('" . $name . "','" . $text . "','" . $avtor . "','" . $img_src . "',NOW())";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }


}