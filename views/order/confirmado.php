<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que realices la transferencia
        bancaria a la cuenta 7382947289239ADD con el coste del pedido, será procesado y enviado.
    </p>
    <br/>
    <?php if (isset($pedido)): ?>
        <h3>Datos del pedido:</h3>

        Número de pedido: <?= $pedido->id ?>   <br/>
        Total a pagar: <?= $pedido->total_price ?> $ <br/>
        Productos:

        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
            </tr>

            <?php while ($producto = $productos->fetch_object()): ?>
                <tr>
                    <td>
                        <?php if ($producto->image != null): ?>
                            <img src="<?= domain ?>uploads/img/<?= $producto->image ?>" class="img_carrito" />
                        <?php else: ?>
                            <img src="<?= domain ?>assets/img/logo.png" class="img_carrito" />
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= domain ?>productController/ver&id=<?= $producto->id ?>"><?= $producto->name_product ?></a>
                    </td>
                    <td>
                        <?= $producto->price ?>
                    </td>
                    <td>
                        <?= $producto->units ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

    <?php endif; ?>

<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != 'complete'): ?>
    <h1>Tu pedido NO ha podido procesarse</h1>
<?php endif; ?>
