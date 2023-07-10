<?php

require 'model/userModel.php';

class userController{
    public $model;
    public function __construct()
    {
        $this->model = new userModel();
    }

    public function home($getValue){
        if($getValue){
            $this->model->createDb($getValue['dbName']);
        }
        else{
            require 'view/home.view.php';
        }
    }

}
