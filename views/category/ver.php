<?php if(isset($category)): ?>
    <h1><?=$category->name_categori?></h1>
    <?php if ($productos->num_rows == 0): ?>
        <p>No hay productos</p>
    <?php else: ?>
        <?php while ($pro = $productos->fetch_object()): ?>
            <div class="product">
                <img src="<?=domain?>uploads/img/<?=$pro->image?>" alt="Producto">
                <h2><?=$pro->name_product?></h2>
                <p><?=$pro->description_product?></p>
                <p><?=$pro->price?></p>
                <a href="<?=domain?>productController/ver&id=<?=$pro->id?>" class="button">Ver</a>
            </div>
        <?php endwhile;?>
    <?php endif; ?>
<?php else: ?>
    <h1>No existe esta Categoria</h1>
<?php endif; ?>


