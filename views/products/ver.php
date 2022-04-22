<?php if(isset($pro)): ?>
    <h1><?=$pro->name_product?></h1>
    <div id="detail-product">
        <div class="img-product">
            <img src="<?=domain?>uploads/img/<?=$pro->image?>" alt="Producto">
        </div>
        <div class="data-product">
            <p><?=$pro->description_product?></p>
            <p class="price"><?=$pro->price?> €</p>
            <a href="<?=domain?>cartController/add&id=<?=$pro->id?>" class="button button-s">Comprar</a>
        </div>
    </div>
<?php else: ?>
    <h1>El producto no existe</h1>
<?php endif; ?>