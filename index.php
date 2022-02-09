     <!-- HEADER -->
     <?php include_once("views/layout/header.php"); ?>
     <!-- NAV -->
     <?php include_once("views/layout/nav.php"); ?>

     <div id="content">
         <!-- LATERAL -->
         <?php include_once("views/layout/lateral.php"); ?>

         <?php

            include_once("autoload.php");

            if (isset($_GET['controller'])) {
                $nombre_controlador = $_GET['controller'];
            } else {
                echo "La pagina no existe 1";
                exit();
            }

            if (class_exists($nombre_controlador)) {
                $controlador = new $nombre_controlador();

                if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
                    $action = $_GET['action'];
                    $controlador->$action();
                } else {
                    echo "La pagina no existe 2";
                }
            } else {
                echo "La pagina no existe 3";
            }

            ?>

     </div>

     <!-- FOOTER -->
     <?php include_once("views/layout/footer.php"); ?>

     </body>

     </html>