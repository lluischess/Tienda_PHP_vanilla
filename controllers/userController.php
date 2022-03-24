<?php

include_once "modelo/usuario.php";

class userController
{

    public function index()
    {
        echo "Controlador user index";
    }

    public function registro()
    {
        require_once "views/user/registro.php";
    }

    public function save()
    {
        if (isset($_POST)) {
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellido($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['pass']);

            if ($usuario->save()) {
                $_SESSION['register'] = "complete";
                echo "Usuario registrado correctamente";
            } else {
                echo "Error al guardar el usuario";
                $_SESSION['register'] = "failed";
            }
        } else {
            $_SESSION['register'] = "failed";
        }
        header("Location:" . domain . 'userController/registro');
    }

    public function login()
    {
        if (isset($_POST)) {
            // Itentificar usuario
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $login = $usuario->login();
            // Crear sessión de login
            if ($login && is_object($login)) {
                $_SESSION['user_login'] = $login;

                if ($login->rol == 'admin') {
                    $_SESSION['admin_login'] = true;
                }
            } else {
                $_SESSION['error_login'] = "Error al identificarte";
            }
        }

        header("Location:" . domain);
    }

    public function logout()
    {
        if (isset($_SESSION['admin_login'])) {
            unset($_SESSION['admin_login']);
        }
        if (isset($_SESSION['user_login'])) {
            unset($_SESSION['user_login']);
        }

        header("Location:". domain);
    }
}
