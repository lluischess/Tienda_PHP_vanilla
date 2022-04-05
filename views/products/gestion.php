<h1>Gestión de Productos</h1>

<?php if(!isset($_SESSION['user_login']) || !isset($_SESSION['admin_login'])): ?>
    <p>NO ESTAS LOGEADO</p>
<?php else: ?>
    <a href="<?=domain?>productController/create" class="button button-s"> Crear Producto </a>

    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
        </tr>
        <?php while ($prod = $productos->fetch_object()){ ?>
            <tr>
                <td><?=$prod->id?></td>
                <td><?=$prod->name_product?></td>
                <td><?=$prod->price?></td>
                <td><?=$prod->stock?></td>
            </tr>
        <?php } ?>
    </table>

<?php endif; ?>


