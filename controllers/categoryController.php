<?php

require_once "modelo/category.php";

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
        header("Location:" . domain . 'category/index');
    }
}
