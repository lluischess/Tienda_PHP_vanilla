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
            $name = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $desc = isset($_POST['desc']) ? $_POST['desc'] : false;
            $price = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $idcategoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            //$img = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($name && $desc && $price && $stock && $idcategoria ){
                // Creamos el objeto de producto para añadir los valores del producto
                $producto = new Producto();
                $producto->setName($name);
                $producto->setCategoria_id($idcategoria);
                $producto->setDescription($desc);
                $producto->setPrice($price);
                $producto->setStock($stock);

                if ($producto->save()) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }

            } else {
                $_SESSION['producto'] = "norellenado";
            }
        } else {
            $_SESSION['producto'] = "norellenado";
        }
        header("Location:" . domain . 'productController/gestion');
    }
}
