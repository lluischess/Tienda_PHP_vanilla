<?php

class userController{

    public function index(){
        echo "Controlador user index";
    }

    public function registro(){
        require_once "views/user/registro.php";
    }

    public function save(){
        if(isset($_POST)){
            var_dump($_POST);
        }
    }
}