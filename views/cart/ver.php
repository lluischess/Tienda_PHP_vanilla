<h1>Carrito:</h1>
<table>
    <tr>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Unidades</th>
    </tr>
    <?php foreach ($cart as $i => $elemento):
        $producto = $elemento['producto'];
        ?>
    <tr>
        <td><img src="<?=domain?>uploads/img/<?=$producto->image?>" alt="Producto"></td>
        <td><?=$producto->name_product?></td>
        <td><?=$producto->price?></td>
        <td><?=$elemento['unidades']?></td>
    </tr>
    <?php endforeach; ?>
</table>