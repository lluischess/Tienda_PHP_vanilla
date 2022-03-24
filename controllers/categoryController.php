<?php

require_once "modelo/category.php";

class categoryController{

    public function index(){
        $categorias = new Category();
        $all_categoris = $categorias->getAllCategoris();
        $allcategoris = $all_categoris->fetch_object();

        require_once 'views/category/index.php';
    }
}