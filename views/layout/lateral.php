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
            <li><a href="<?=domain?>userController/logout">Cerrar sesión</a></li>
            <li><a href="">Mis pedidos</a></li>
            <li><a href="">Gestionar categorias</a></li>
        </ul>
        
    </div>
</aside>