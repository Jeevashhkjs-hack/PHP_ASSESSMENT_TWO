<?php

require 'model/userModel.php';
class userController{
    public $model;
    public $tableList;
    public function __construct()
    {
        $this->model = new userModel();
    }

    // home page
    public function home(){
        require 'view/home.view.php';
    }

    // create database function
    public function createDb($dbName){
        try{
            if($dbName){
                $dbValidate = $this->model->dbValidation($dbName);
                if(!isset($dbValidate[0]['SCHEMA_NAME'])){
                    $this->model->createDb($dbName);
                    header('location: /');
                }
                else {
                    $_SESSION['alreadyExit'] = "already Exit";
                    require 'view/createDb.php';
                }
            }
            else{
                unset( $_SESSION['alreadyExit']);
                require 'view/createDb.php';
            }
        }
        catch (PDOException $e){
            die("error".$e->getMessage());
        }
    }

    // create table function
    public function createTable($dbNameList){
        try{
            if($dbNameList){
                $dbName = $dbNameList['selectedDb'];
                $tableName = $dbNameList['tableName'];

                $tableValidate = $this->model->tableValidate($tableName,$dbName);
                if($tableValidate[0]->tablesNameList){
                    $_SESSION['tableExists'] = 'Exit';
                    require 'view/createTable.php';
                }
                else{

                    $count = count($dbNameList['columnName']);

                    $this->model->createTable($dbName,$tableName);
                    for($i=0;$i<$count;$i++){
                        $this->model->addColumn($dbName,$tableName,$dbNameList['columnName'][$i],$dbNameList['dataTypes'][$i]);
                    }
                    header('location: /');
                }
            }
            else{
                unset($_SESSION['tableExists']);
                $dbList = $this->model->getDatabaseList();
                require 'view/createTable.php';
            }
        }
        catch (PDOException $e){
            die("error".$e->getMessage());
        }

    }

    // create column function
    public function createColumn($data){
        try {
            if($data['selectedDb']){
                $this->tablesList = $this->model->getTables($data['selectedDb']);
                $dbList = $this->model->getDatabaseList();
                require 'view/createColumn.php';
            }
            else{
                $tables = $this->tableList;
                $dbList = $this->model->getDatabaseList();
                require 'view/createColumn.php';
            }
        }
        catch (PDOException $e){
            die("error".$e->getMessage());
        }
    }

    // get tables from database function
    function getTablesFmDb($dbname){
        try {
            $tableName= $this->model->getTablesFDb($dbname);
            echo json_encode($tableName);
        }
        catch (PDOException $e){
            die("error".$e->getMessage());
        }
    }
    public function getcolumns($data){
        var_dump($data);
        $column =$this->model->column($data['dbname'],$data['table']);
        echo json_encode($column);

    }

}
