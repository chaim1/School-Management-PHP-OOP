<?php

final class DataAccessLayer
{

    private $host = 'localhost';
    private $db = 'SchoolManagement';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';
    private $dsn;
    private $opt = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    private static $inst;

    private function __construct()
    {
        $this->dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
    }

    public static function Instance() {
        if (DataAccessLayer::$inst === null) {
            DataAccessLayer::$inst = new DataAccessLayer();
        }
        return DataAccessLayer::$inst;
    }

    public function select($query)
    {
        $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        $stmt = $pdo->query($query);

        return $stmt;
    }
    public function selectWhere($query , $params = null)
    {
 
        $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        $stmt = $pdo->query($query);
        $stmt ->execute($params);
        return $stmt;
    }
    public function selectOne($query, $params) {
        
        $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        $statement = $pdo->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    public function insert($query, $params) {
        $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        $statement = $pdo->prepare($query);
        $statement->execute($params);
        return $pdo->lastInsertId();
    }

    public function delete($query){
        $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        $statement = $pdo->query($query);

    }
    public function update($query, $params){
        $pdo = new PDO($this->dsn, $this->user, $this->pass, $this->opt);
        $statement = $pdo->prepare($query);
		$statement->execute($params);
    }
}
