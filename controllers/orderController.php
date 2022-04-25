<?php

class orderController{

    public function index(){
        echo "Controlador order index";
    }

    public function prepare(){
        require_once 'views/order/prepare.php';
    }

    public function add(){

    }
}