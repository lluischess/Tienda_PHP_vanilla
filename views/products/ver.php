<?php if(isset($pro)): ?>
    <h1><?=$pro->name_product?></h1>
    <img src="<?=domain?>uploads/img/<?=$pro->image?>" alt="Producto">
    <p><?=$pro->description_product?></p>
    <p><?=$pro->price?></p>
    <a href="" class="button">Comprar</a>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>