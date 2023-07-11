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
    public function createTable($dbName,$tableName){
        $this->dbConnect->query("
        USE $dbName;
        CREATE TABLE $tableName (
        id int auto_increment,
        primary key (id)
        )
        ");
    }
    public function addColumn($dbNm,$table,$column,$datatype){
        echo $column;
        $this->dbConnect->query("
        USE $dbNm;
        ALTER TABLE $table ADD COLUMN $column $datatype;
        ");
    }

    public function getTables($getDb){
         return $this->dbConnect->query("
        SELECT TABLE_NAME AS tablesNameList 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = '$getDb'
        ")->fetchAll(PDO::FETCH_OBJ);
    }

    public function dbValidation($getDbName){
        return $this->dbConnect->query("
        SELECT SCHEMA_NAME
        FROM INFORMATION_SCHEMA.SCHEMATA
        WHERE SCHEMA_NAME = '$getDbName'")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tableValidate($tableNm,$dbNm){
        return $this->dbConnect->query("
        SELECT TABLE_NAME AS tablesNameList 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = '$dbNm' and TABLE_NAME = '$tableNm'
        ")->fetchAll(PDO::FETCH_OBJ);
    }
}
