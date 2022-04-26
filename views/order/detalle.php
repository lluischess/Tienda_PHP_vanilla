<h1>Detalle del pedido</h1>

<?php if (isset($pedido)): ?>
		<?php if(isset($_SESSION['admin_login'])): ?>
			<h3>Cambiar estado del pedido</h3>
			<form action="<?=domain?>orderController/estado" method="POST">
				<input type="hidden" value="<?=$pedido->id?>" name="pedido_id"/>
				<select name="estado">
					<option value="confirm" <?=$pedido->status_order == "confirm" ? 'selected' : '';?>>Pendiente</option>
					<option value="preparation" <?=$pedido->status_order == "preparation" ? 'selected' : '';?>>En preparación</option>
					<option value="ready" <?=$pedido->status_order == "ready" ? 'selected' : '';?>>Preparado para enviar</option>
					<option value="sended" <?=$pedido->status_order == "sended" ? 'selected' : '';?>>Enviado</option>
				</select>
				<input type="submit" value="Cambiar estado" />
			</form>
			<br/>
		<?php endif; ?>

		<h3>Dirección de envio</h3>
		Provincia: <?= $pedido->province ?>   <br/>
		Cuidad: <?= $pedido->location_order ?> <br/>
		Direccion: <?= $pedido->direction ?>   <br/><br/>

		<h3>Datos del pedido:</h3>
		Estado: <?=Utils::showStatus($pedido->status_order)?> <br/>
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
						<a href="<?= domain ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->name_product ?></a>
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