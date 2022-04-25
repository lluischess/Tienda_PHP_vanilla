<aside id="lateral">
    
    <div id="cart" class="block_aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php $stats = Utils::statscart(); ?>
            <li><a href="<?=domain?>cartController/index">Total: <?= $stats['total'] ?>€ </a></li>
            <li><a href="<?=domain?>cartController/index">Productos: <?= $stats['count'] ?> </a></li>
            <li><a href="<?=domain?>cartController/index">Ver el carrito</a></li>
            <li><a href="<?=domain?>orderController/mis_pedidos">Ver Pedidos</a></li>
        </ul>
    </div>
    
    <div id="login" class="block_aside">
        
        <?php if(!isset($_SESSION['user_login'])): ?>
            <h3>Login</h3>
            <form action="<?=domain?>userController/login" method="POST">
                <label for="email">Email:</label>
                <input type="text" name="email">
                <label for="password">Password:</label>
                <input type="text" name="password">
                <input type="submit" value="enviar">
            </form>
        <?php else: ?>
            <h3><?= $_SESSION['user_login']->name_user. " " .$_SESSION['user_login']->lastname ?></h3>
        <?php endif; ?>
        <ul>
            <?php if (isset($_SESSION['user_login']) || isset($_SESSION['admin_login'])) { ?>
                <li><a href="<?=domain?>userController/logout">Cerrar sesión</a></li>
                <?php } else{ ?>
                    <li><a href="<?=domain?>userController/registro">Registro</a></li>
                <?php } ?>
            <li><a href="">Mis pedidos</a></li>
            <?php if (isset($_SESSION['admin_login'])) { ?>
                <li><a href="<?=domain?>orderController/index">Gestionar Pedidos</a></li>
                <li><a href="<?=domain?>categoryController/index">Gestionar Categorias</a></li>
                <li><a href="<?=domain?>productController/gestion">Gestionar Productos</a></li>
                <?php } ?>
        </ul>
        
    </div>
</aside>