<aside id="lateral">
    <div id="login" class="block_aside">
        <h3>Login</h3>
        <form action="<?=domain?>userController/login" method="POST">
            <label for="email">Email:</label>
            <input type="text" name="email">
            <label for="password">Password:</label>
            <input type="text" name="password">
            <input type="submit" value="enviar">
        </form>

        <ul>
            <li><a href="">Mis pedidos</a></li>
            <li><a href="">Gestionar categorias</a></li>
        </ul>
        
    </div>
</aside>