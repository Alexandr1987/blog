<?php
class Coments
    extends User
{
    const TABLE = 'coments';


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

    public function updateTextById($text,$id){
        $this->id = $id;
        $dbh = new Connection();
        $sql = "UPDATE coments SET text='$text' WHERE id='$id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function updateTitleById($title,$id){
        $this->id = $id;
        $this->title = $title;
        $dbh = new Connection();
        $sql = "UPDATE coments SET title='$title' WHERE id='$id'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public function insert($text,$avtor,$id_news){

        $this->text = $text;
        $this->avtor = $avtor;
        $this->id_news = $id_news;
        $dbh = new Connection();
        $sql = "INSERT INTO coments (text, avtor, id_news, date)VALUE ('" . $text . "','" . $avtor . "','" . $id_news . "',NOW())";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }


}