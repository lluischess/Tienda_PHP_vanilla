<div id="central">
    <h1>Productos destacados</h1>

    <?php while ($pro = $productos->fetch_object()): ?>
    <div class="product">
        <img src="<?=domain?>uploads/img/<?=$pro->image?>" alt="Producto">
        <h2><?=$pro->name_product?></h2>
        <p><?=$pro->description_product?></p>
        <p><?=$pro->price?></p>
        <a href="<?=domain?>productController/ver&id=<?=$pro->id?>" class="button">Comprar</a>
    </div>
    <?php endwhile;?>
</div>