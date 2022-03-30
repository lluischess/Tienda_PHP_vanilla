<?php

require_once "modelo/category.php";

class categoryController{

    public function index(){
        $categorias = new Category();
        $all_categoris = $categorias->getAllCategoris();
        require_once 'views/category/index.php';
    }
}