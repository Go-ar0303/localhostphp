
<?
Class Database{
    private $link;

    public function __construct()
    {
     $this->connect();
    }
    private function connect()
    {
      $config = require_once 'config.php';
      $dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset='.$config['charset'];
      $this->link = new PDO($dsn, $config['username'], $config['password']);
      return $this;
    }
    public function execute($sql)
    {
     $sth = $this->link->prepare($sql);
     return $sth ->execute();
    }

    public function query($sql)
    {
        $sth = $this->link->prepare($sql);
        $sth ->execute();
       $result = $sth->fetchAll(PDO::FETCH_ASSOC);
       if($result === false){
        return [];
       }
       return $result;
    }
}

$db = new Database();

//добавляем строку

//$db ->execute("INSERT INTO `users` SET `name`= 'Sofia', `surname` = 'Sen', `city` = 'Chkago'");
//$user = $db->query("SELECT * FROM `users`");

//удаляем строку

//$db->execute("DELETE FROM `users` WHERE `user_id` = '19'");
//$user = $db->query("DELETE  FROM `users` WHERE `user_id` = '19'");

//обновляем строку

//$db->execute("UPDATE `users` SET `city`='Chikago' WHERE `city` = '[Chikago]'");
//$user = $db->query("UPDATE `users` SET `city`='Chikago' WHERE `city` = '[Chikago]'");



echo json_encode ($user);
?>


