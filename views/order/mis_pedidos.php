<?php if (isset($gestion)): ?>
	<h1>Gestionar pedidos</h1>
<?php else: ?>
	<h1>Mis pedidos</h1>
<?php endif; ?>
<table>
	<tr>
		<th>Nº Pedido</th>
		<th>Coste</th>
		<th>Fecha</th>
		<th>Estado</th>
	</tr>
	<?php
	while ($ped = $pedidos->fetch_object()):
		?>

		<tr>
			<td>
				<a href="<?= domain ?>orderController/detalle&id=<?= $ped->id ?>"><?= $ped->id ?></a>
			</td>
			<td>
				<?= $ped->total_price ?> $
			</td>
			<td>
				<?= $ped->date_order ?>
			</td>
			<td>
                <?=Utils::showStatus($ped->status_order)?>
			</td>
		</tr>

	<?php endwhile; ?>
</table>