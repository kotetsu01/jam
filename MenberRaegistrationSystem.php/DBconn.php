<?php
class DBconn{
    private $DB_HOST = "localhost";
    private $DB_USER = "user01";
    private $DB_PASS = "user01";
    private $DB_NAME = "ECShopDB";
    private $DB_PORT = "3306";
    protected $db;

function __construct(){
    try{
        $dsn='mysql:dbname='.$this->DB_NAME.';'.'host='.$this->DB_HOST.';'.'port='.$this->DB_PORT;
        $this->db = new PDO($dsn,$this->DB_USER,$this->DB_PASS);
    }catch(PDOException $e){
        session_start();
        $_SESSION["errMessage"]="システムの不具合が発生しました。ログインし直してください。";
        header('Location: err.php');
    }
  }

  function __destruct(){
      if(isset($this->db)){
          $this->db=null;
      }
  }
}