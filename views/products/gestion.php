<h1>Gestión de Productos</h1>

<?php if(!isset($_SESSION['user_login']) || !isset($_SESSION['admin_login'])): ?>
    <p>NO ESTAS LOGEADO</p>
<?php else: ?>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <p>Se ha añadido un producto nuevo correctamente</p>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed'): ?>
    <p>Error al crear el nuevo producto</p>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

    <?php if(isset($_SESSION['delete_product']) && $_SESSION['delete_product'] == 'complete'): ?>
        <p>Se ha eliminado un producto correctamente</p>
    <?php elseif (isset($_SESSION['delete_product']) && $_SESSION['delete_product'] == 'failed'): ?>
        <p>Error al borrar el producto selecciónado</p>
    <?php endif; ?>
    <?php Utils::deleteSession('delete_product'); ?>

    <a href="<?=domain?>productController/create" class="button button-s"> Crear Producto </a>

    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
        <?php while ($prod = $productos->fetch_object()){ ?>
            <tr>
                <td><?=$prod->id?></td>
                <td><?=$prod->name_product?></td>
                <td><?=$prod->price?></td>
                <td><?=$prod->stock?></td>
                <td><a href="<?=domain?>productController/editar&id=<?=$prod->id?>" class="button">Editar</a></td>
                <td><a href="<?=domain?>productController/eliminar&id=<?=$prod->id?>" class="buttonb">Borrar</a></td>
            </tr>
        <?php } ?>
    </table>

<?php endif; ?>


