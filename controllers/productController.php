<?php

class productController
{

    public function index()
    {
        // Cargamos Destacados
        require_once "views/products/destacados.php";
    }

    public function gestion(){

        require_once "views/products/gestion.php";
    }
}
