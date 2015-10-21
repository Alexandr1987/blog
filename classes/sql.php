<?
class Sql{
    public $sq;
    public $host;
    public $login;
    public $parol;
    public $name_baz ;
    
    public function __construct($host,$login,$parol,$name_baz){
        $this->name_baz = $name_baz;
        $this->host = $host;
        $this->login = $login;
        $this->parol = $parol;
        if(!mysql_connect($host,$login,$parol)){
            printf("not correct: host or login or password %s\n", mysqli_connect_error());
            exit();
        }

        if(!mysql_select_db($name_baz)){
            printf("Connect failed: not correct baz name %s\n", mysqli_connect_error());
            exit();
        }

        $dbh = new PDO('mysql:dbname=news;host=localhost','root','');
    }
    public function insert($sq){
        $this->sq = $sq;
        if (!mysql_query($sq)){
            printf("Connect failed: not correct insert %s\n", mysqli_connect_error());
            exit();
        }
    }

    public function get_info($table_name){
        $this->table_name = $table_name;
        if (mysql_query('SELECT * FROM '. $table_name) == true){
            $results = mysql_query('SELECT * FROM '. $table_name);

            $newses = [];
            while(false != $row = mysql_fetch_assoc($results)){
                $newses[] = $row;
            }
            return $newses;

        }//else echo 'net';
    }

    public function get_info_news($table_name){
        $this->table_name = $table_name;
        if (mysql_query('SELECT * FROM '. $table_name.' ORDER BY id DESC') == true){
            $results = mysql_query('SELECT * FROM '. $table_name.' ORDER BY id DESC');

            $newses = [];
            while(false != $row = mysql_fetch_assoc($results)){
                $newses[] = $row;
            }
            return $newses;

        }//else echo 'net';
    }


}

$a = new Sql('localhost','root','','news');
?>