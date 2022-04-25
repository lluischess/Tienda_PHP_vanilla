<?php

class Utils {

    public static function deleteSession($name){
        if (isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);

        }
        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin_login'])){
            header("Location:".domain);
        } else{
            return true;
        }
    }

    public static function showcategorias(){
        require_once "modelo/category.php";
        $categorias = new Category();
        $all_categoris = $categorias->getAllCategoris();

        return $all_categoris;
    }

    public static function statscart(){
        $stats = array(
            'count' => 0,
            'total' => 0,
        );

        if(isset($_SESSION['cart'])){
            $stats['count'] = count($_SESSION['cart']);

            foreach ($_SESSION['cart'] as $index => $value){
                $stats['total'] += $value['price']*$value['unidades'];
            }
        }

        return $stats;
    }

    public static function showStatus($status){
        $value = 'Pendiente';

        if($status == 'confirm'){
            $value = 'Pendiente';
        }elseif($status == 'preparation'){
            $value = 'En preparación';
        }elseif($status == 'ready'){
            $value = 'Preparado para enviar';
        }elseif($status = 'sended'){
            $value = 'Enviado';
        }

        return $value;
    }
}