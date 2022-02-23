     <!-- HEADER -->
     <?php include_once("config/parameters.php"); 
     session_start();
     ?>
     <?php include_once("config/db.php"); ?>
     <?php include_once("views/layout/header.php"); ?>

     <!-- NAV -->
     <?php include_once("views/layout/nav.php"); ?>
    

     <div id="content">
         <!-- LATERAL -->
         <?php include_once("views/layout/lateral.php"); ?>
         <div id="central">
             <?php

                include_once("autoload.php");

                function show_error(){
                    $error = new errorController();
                    $error->index();
                }

                if (isset($_GET['controller'])) {
                    $nombre_controlador = $_GET['controller'];
                } 
                elseif(!isset($_GET['controller']) && !isset($_GET['action']) ) {
                    $nombre_controlador = d_controller;
                }
                else{
                    show_error();
                    exit();
                }

                if (class_exists($nombre_controlador)) {
                    $controlador = new $nombre_controlador();

                    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                        $action = $_GET['action'];
                        $controlador->$action();
                    } elseif(!isset($_GET['controller']) && !isset($_GET['action']) ) {
                        $defaction = d_action;
                        $controlador->$defaction();
                    }
                    else {
                        show_error();
                    }
                } else {
                    show_error();
                }

                ?>
         </div>
     </div>

     <!-- FOOTER -->
     <?php include_once("views/layout/footer.php"); ?>

     </body>

     </html>