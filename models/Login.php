<?php
require_once __DIR__.'/../autoload.php';
class Login
    extends User{

    const TABLE = 'info';


    public function insert($log,$pas){
        $this->log = $log;
        $this->pas = $pas;
        $dbh = new Connection();
        $sql = "INSERT INTO info(login,pasword)VALUE ('" . $log . "','" . $pas . "')";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }

    public static function findAll(){
        $dbh = new Connection();
        $sql = 'SELECT * FROM ' . self::TABLE . '';
        $sth = $dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public function update($files,$cook){
        $this->files = $files;
        $this->cook = $cook;
        $dbh = new Connection();
        $sql = "UPDATE info SET img='$files' WHERE login='$cook'";
        $sth = $dbh->prepare($sql);
        $sth->execute();

    }


}