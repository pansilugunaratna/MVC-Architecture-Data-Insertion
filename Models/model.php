<?php

class DATABASE {
    // CONNECT TO DATABASE
    public $error = "";
    private $pdo = null;
    private $stmt = null;
    function __construct () {
        try {
            $this->pdo = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
                DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }
        catch (Exception $ex) {
            die($ex->getMessage());
        }
    }

    // CLOSE CONNECTION
    function __destruct(){
        if ($this->stmt!==null) { $this->stmt = null; }
        if ($this->pdo!==null) { $this->pdo = null; }
    }

    function insert($sql, $data){
        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute($data);
            return true;
        }
        catch (Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
        }
    }
}

// DATABASE SETTINGS
const DB_HOST = 'localhost';
const DB_NAME = 'mvc';
const DB_CHARSET = 'utf8';
const DB_USER = 'root';
const DB_PASSWORD = '';
