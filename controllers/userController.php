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
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['pass']);
        }
    }
}