<?php

require_once 'modelo/producto.php';

class productController
{

    public function index()
    {
        // Cargamos Destacados
        $producto = new Producto();
        $productos = $producto->getRandom(6);
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

                if (isset($_FILES['imagen'])) {
                    // Guardar imagen
                    $archivo = $_FILES['imagen'];
                    $filename = $archivo['name'];
                    $mimetype = $archivo['type'];

                    if ($mimetype == "image/jpg" || $mimetype == "image/png") {


                        if (!is_dir('uploads/img')) {
                            mkdir('uploads/img', 0777, true);
                        }

                        move_uploaded_file($archivo['tmp_name'], 'uploads/img/' . $filename);
                        $producto->setImg($filename);
                    }
                }

                if(isset($_GET['id'])){
                    $producto->setId($_GET['id']);
                    $save = $producto->edit();
                }else{
                    $save = $producto->save();
                }

                if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }

            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        header("Location:" . domain . 'productController/gestion');
    }

    public function ver(){
        if(isset($_GET['id'])) {

            $producto = new Producto();
            $producto->setId($_GET['id']);
            $pro = $producto->getOne();
        }
            require_once "views/products/ver.php";

    }

    public function editar(){
        Utils::isAdmin();
        if(isset($_GET['id'])) {
            $edit = true;

            $producto = new Producto();
            $producto->setId($_GET['id']);
            $pro = $producto->getOne();

            require_once "views/products/create.php";
        }else {
            header("Location:" . domain . 'productController/gestion');
        }
    }

    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){

            $producto = new Producto();
            $producto->setId($_GET['id']);

            if($producto->delete()){
                $_SESSION['delete_product'] = "complete";
            }else{
                $_SESSION['delete_product'] = "failed";
            }

        }

        header('Location:'. domain ."productController/gestion");
    }

}
