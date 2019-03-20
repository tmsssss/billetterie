<?php


class DB{
    private $host = 'db107024.sql-pro.online.net';
    private $username = "db107024";
    private $password = 'E7axhchd!';
    private $database = 'db344278_portfo';
    private $db;

    public function __construct($host = null,$username = null,$password = null,$database = null){
        if($host != null){
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }
        try {
            $this->db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));
        }  catch(Exception $e){
            print_r($e);
        }
    }
    public function query($req, $data = array()){
        $req = $this->db->prepare($req);
        $req->execute($data);
        return $req ->fetchAll(PDO::FETCH_OBJ);
    }
    public function lastInsertId(){
        return $this->db->lastInsertId();
    }
    public function errorInfo(){
        return $this->db->errorCode();
    }
}
