<?php

class connection{
    public $dbConnect;
    public function __construct()
    {
        try{
            // connection into the database
            $this->dbConnect = new PDO('mysql:host=localhost','root','welcome');
        }
        catch (exception $e){;
            die("connnection error".$e->getMessage());
        }
    }
}

class userModel extends connection{
    // create dynamic database
    public function createDb($name){
        $this->dbConnect->query("CREATE DATABASE $name");
    }

    // get all databases
    public function getDatabaseList(){
        return $this->dbConnect->query("SHOW DATABASES")->fetchAll(PDO::FETCH_OBJ);
    }

    // create dynamic tables
    public function createTable($dbName,$tableName){
        $this->dbConnect->query("
        USE $dbName;
        CREATE TABLE $tableName (
        id int auto_increment,
        primary key (id)
        )
        ");
    }

    // add column on table
    public function addColumn($dbNm,$table,$column,$datatype){
        echo $column;
        $this->dbConnect->query("
        USE $dbNm;
        ALTER TABLE $table ADD COLUMN $column $datatype;
        ");
    }

    // get tabel list
    public function getTables($getDb){
         return $this->dbConnect->query("
        SELECT TABLE_NAME AS tablesNameList 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = '$getDb'
        ")->fetchAll(PDO::FETCH_OBJ);
    }

    // database validation
    public function dbValidation($getDbName){
        return $this->dbConnect->query("
        SELECT SCHEMA_NAME
        FROM INFORMATION_SCHEMA.SCHEMATA
        WHERE SCHEMA_NAME = '$getDbName'")->fetchAll(PDO::FETCH_ASSOC);
    }

    //table validation
    public function tableValidate($tableNm,$dbNm){
        return $this->dbConnect->query("
        SELECT TABLE_NAME AS tablesNameList 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = '$dbNm' and TABLE_NAME = '$tableNm'
        ")->fetchAll(PDO::FETCH_OBJ);
    }

    // get table from database
    public function getTablesFDb($dbname){
        return $this->dbConnect->query("SELECT TABLE_NAME AS tablesname,TABLE_SCHEMA 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = '$dbname'")->fetchAll(PDO::FETCH_OBJ);
    }
    public function column($dbname,$tablename){
        $column=$this->dbConnect->query("SELECT column_name 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='$dbname' 
    AND `TABLE_NAME`='$tablename'")->fetchAll(PDO::FETCH_OBJ);
        return $column;
    }
}