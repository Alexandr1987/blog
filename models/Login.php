<?php
require_once __DIR__.'/../autoload.php';
class Login
    extends User{

    const TABLE = 'info';


    public function Insert($log,$pas){
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

}