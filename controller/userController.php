<?php

require 'model/userModel.php';

class userController{
    public $model;
    public function __construct()
    {
        $this->model = new userModel();
    }

    public function home(){
        require 'view/home.view.php';
    }

    public function createDb($dbName){
        $this->model->createDb($dbName);
        header('location: /');
    }

    public function createTable($dbNameList){
        if($dbNameList){
            $dbName = $dbNameList['selectedDb'];
            $count = count($dbNameList['tableName']);

            for($i=0;$i<$count;$i++){
                $this->model->createTable($dbName,$dbNameList['tableName'][$i],$dbNameList['dataTypes'][$i]);
            }
        }
        else{
            $dbList = $this->model->getDatabaseList();
            require 'view/createTable.php';
        }

    }

}
