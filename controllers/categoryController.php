<?php

require_once "modelo/category.php";
require_once "modelo/producto.php";

class categoryController
{

    public function index()
    {
        Utils::isAdmin();
        $categorias = new Category();
        $all_categoris = $categorias->getAllCategoris();
        require_once 'views/category/index.php';
    }

    public function create()
    {
        Utils::isAdmin();

        require_once 'views/category/create.php';
    }

    public function save()
    {
        Utils::isAdmin();

        if (isset($_POST['categoryname'])) {

            $category = new Category();
            $category->setNombre($_POST['categoryname']);

            if ($category->save()) {
                echo "Categoria creada correctamente";
            } else {
                echo "ERROR al crear la categoria";
            }

        } else {
            echo "ERROR del campo del Nombre";
        }
        header("Location:" . domain . 'categoryController/index');
    }

    public function ver(){
        if (isset($_GET['id'])){
            // Categoria
            $categoria = new Category();
            $categoria->setId($_GET['id']);
            $category = $categoria->getOne();
            $category = $category->fetch_object();

            //Productos
            $producto = new Producto();
            $producto->setCategoria_id($_GET['id']);
            $productos = $producto->getAllFromCat();
        }
        require_once 'views/category/ver.php';
    }
}
