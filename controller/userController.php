<?php

require 'model/userModel.php';

class userController{
    public $model;
    public $tableList;
    public function __construct()
    {
        $this->model = new userModel();
    }

    public function home(){
        require 'view/home.view.php';
    }

    public function createDb($dbName){
        if($dbName){
            $this->model->createDb($dbName);
            header('location: /');
        }
        else{
            require 'view/createDb.php';
        }
    }

    public function createTable($dbNameList){
        if($dbNameList){
            $dbName = $dbNameList['selectedDb'];
            $tableName = $dbNameList['tableName'];
            $count = count($dbNameList['columnName']);
            $this->model->createTable($dbName,$tableName);
            for($i=0;$i<$count;$i++){
                $this->model->addColumn($dbName,$tableName,['columnName'][$i],$dbNameList['dataTypes'][$i]);
            }
            header('location: /');
        }
        else{
            $dbList = $this->model->getDatabaseList();
            require 'view/createTable.php';
        }

    }

    public function createColumn($data){
        print_r($data);
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

}
