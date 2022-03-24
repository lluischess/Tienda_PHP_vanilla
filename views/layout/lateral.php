<aside id="lateral">
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
                <?php } ?>
            <li><a href="">Mis pedidos</a></li>
            <?php if (isset($_SESSION['admin_login'])) { ?>
                <li><a href="">Gestionar Pedidos</a></li>
                <li><a href="">Gestionar categorias</a></li>
                <?php } ?>
        </ul>
        
    </div>
</aside>