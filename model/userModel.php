<?php

class connection{
    public $dbConnect;
    public function __construct()
    {
        try{
            $this->dbConnect = new PDO('mysql:host=localhost','root','welcome');
        }
        catch (exception $e){;
            die("connnection error".$e->getMessage());
        }
    }
}

class userModel extends connection{
    public function createDb($name){
        $this->dbConnect->query("CREATE DATABASE $name");
    }
    public function getDatabaseList(){
        return $this->dbConnect->query("SHOW DATABASES")->fetchAll(PDO::FETCH_OBJ);
    }
    public function createTable($dbName,$tableName,$dataType){
        $this->dbConnect->query("
        USE $dbName;
        CREATE TABLE $tableName (
        id int auto_increment,
        primary key (id)
        )
        ");
    }
}
