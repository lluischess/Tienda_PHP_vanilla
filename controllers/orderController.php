<?php

require_once 'modelo/pedido.php';
class orderController{

    public function index(){
        echo "Controlador order index";
    }

    public function prepare(){
        require_once 'views/order/prepare.php';
    }

    public function add(){
        if(isset($_SESSION['user_login']) || isset($_SESSION['admin_login'])){
            $usuario_id = isset($_SESSION['user_login']) ? $_SESSION['user_login']->id : $_SESSION['admin_login']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utils::statscart();
            $coste = $stats['total'];

            if($provincia && $localidad && $direccion){
                // Guardar datos en bd
                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);

                $save = $pedido->save();

                // Guardar linea pedido
                $save_linea = $pedido->save_linea();

                if($save && $save_linea){
                    $_SESSION['pedido'] = "complete";
                }else{
                    $_SESSION['pedido'] = "failed";
                }

            }else{
                $_SESSION['pedido'] = "failed";
            }

            header("Location:".domain.'orderController/confirmado');
        }else{
            // Redigir al index
            header("Location:".domain);
        }
    }

    public function confirmado(){
        if(isset($_SESSION['user_login']) || isset($_SESSION['admin_login'])){
            $identity = isset($_SESSION['user_login']) ? $_SESSION['user_login'] : $_SESSION['admin_login'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);

            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($pedido->id);
        }
        require_once 'views/order/confirmado.php';
    }

    public function mis_pedidos(){
        Utils::isAdmin();
        $usuario_id = $_SESSION['user_login']->id;
        $pedido = new Pedido();

        // Sacar los pedidos del usuario
        $pedido->setUsuario_id($usuario_id);
        $pedidos = $pedido->getAllByUser();

        require_once 'views/order/mis_pedidos.php';
    }

    public function detalle(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];

            // Sacar el pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            // Sacar los poductos
            $pedido_productos = new Pedido();
            $productos = $pedido_productos->getProductosByPedido($id);

            require_once 'views/order/detalle.php';
        }else{
            header('Location:'.domain.'orderController/mis_pedidos');
        }
    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/order/mis_pedidos.php';
    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            // Recoger datos form
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];

            // Upadate del pedido
            $pedido = new Pedido();
            $pedido->setId($id);
            $pedido->setEstado($estado);
            $pedido->edit();

            header("Location:".domain.'orderController/detalle&id='.$id);
        }else{
            header("Location:".domain);
        }
    }
}