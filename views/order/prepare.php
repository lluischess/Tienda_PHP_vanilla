<h1>Pedido: </h1>

<?php if (isset($_SESSION['user_login']) || isset($_SESSION['admin_login'])): ?>
    <h3>Hacer Pedido:</h3>
    <a href="<?= domain?>cartController/index"> Ver carrito de productos</a>

    <h3>Dirección para el envio:</h3>
    <form action="<?=domain.'orderController/add'?>" method="POST">
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" required />

        <label for="ciudad">Ciudad</label>
        <input type="text" name="localidad" required />

        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" required />

        <input type="submit" value="Confirmar pedido" />
    </form>

<?php else: ?>
    <h3>No estas Registrado</h3>
<?php endif; ?>

