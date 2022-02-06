    <?php 
    
    include_once("autoload_lluis.php");
    
    if(isset($_GET['controller'])){
        $nombre_controlador = $_GET['controller'].'Controller';
    } else {
        echo "La pagina no existe";
        exit();
    }

    if(class_exists($nombre_controlador)){
        $controlador = new $nombre_controlador();

        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
            $action = $_GET['action'];
            $controlador->$action();
        } else {
            echo "La pagina no existe";
        }

    } else {
        echo "La pagina no existe";
    }
    
    
    
    ?>
    <!-- HEADER -->
    
    <?php include_once("header.php"); ?>

    <!-- NAV -->
    <?php include_once("nav.php"); ?>

    <div id="content">
        <!-- LATERAL -->
        <?php include_once("lateral.php"); ?>

        <!-- CONTENT CENTRAL -->
        <?php include_once("content.php"); ?>

    </div>

    <!-- FOOTER -->
    <?php include_once("footer.php"); ?>

</body>
</html>