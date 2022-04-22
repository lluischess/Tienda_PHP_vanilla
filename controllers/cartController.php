<?php

require_once "modelo/producto.php";

class cartController{

    public function index(){
        $cart = $_SESSION['cart'];
        require_once "views/cart/ver.php";
    }

    public function add(){

        // Obtenemos el ID del producto
        if (isset($_GET['id'])){
            $product_id = $_GET['id'];
        }else{
            header('Location:'.domain);
        }

        // Revisamos si existe la sessión cart
        if(isset($_SESSION['cart'])){
            $cont = 0;
            foreach ($_SESSION['cart'] as $i => $elemento){
                if($elemento['id'] == $product_id){
                    $_SESSION['cart'][$i]['unidades']++;
                    $cont++;
                }
            }

        }

        if (!isset($cont) || $cont == 0) {
            // conseguir producto
            $producto = new Producto();
            $producto->setId($product_id);
            $productoobtenido = $producto->getOne();

            if (is_object($producto)) {
                $_SESSION['cart'][] = array(
                    "id" => $productoobtenido->id,
                    "price" => $productoobtenido->price,
                    "unidades" => 1,
                    "producto" => $productoobtenido
                );
            }
        }


        header('Location:'.domain."cartController/index");
    }

    public function clean(){

    }

    public function delete(){
        unset($_SESSION['cart']);
        header('Location:'.domain."cartController/index");
    }
}