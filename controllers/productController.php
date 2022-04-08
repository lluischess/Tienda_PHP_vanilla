<?php

require_once 'modelo/producto.php';

class productController
{

    public function index()
    {
        // Cargamos Destacados
        require_once "views/products/destacados.php";
    }

    public function gestion(){
        Utils::isAdmin();

        $producto = new Producto();
        $productos = $producto->getAll();

        require_once "views/products/gestion.php";
    }

    public function create(){
        Utils::isAdmin();
        require_once "views/products/create.php";
    }

    public function save(){
        Utils::isAdmin();

        if (isset($_POST)){
            var_dump($_POST);
        }
    }
}
