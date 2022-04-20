
<?php if (isset($edit) && isset($pro) && is_object($pro)): ?>
<h1>Editar producto <?= $pro->name_product?></h1>
    <?php $url_action = domain."productController/save&id=".$pro->id; ?>
<?php else: ?>
<h1>Crear nuevo producto</h1>
    <?php $url_action = domain."productController/save"; ?>
<?php endif; ?>


<form action="<?=$url_action?>" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="<?=isset($pro) && is_object($pro) ? $pro->name_product : '';?>">

    <label for="desc">Descripción</label>
    <textarea name="desc" id="desc"><?=isset($pro) && is_object($pro) ? $pro->description_product : '';?></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" id="precio" value="<?=isset($pro) && is_object($pro) ? $pro->price : '';?>">

    <label for="stock">Stock</label>
    <input type="number" name="stock" id="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : '';?>">

    <label for="categoria">Categorias</label>
    <?php $categorias = Utils::showcategorias(); ?>
    <select  name="categoria">
        <?php while ($categoria = $categorias->fetch_object()){ ?>
            <option value="<?=$categoria->id?>" <?=isset($pro) && is_object($pro) && $categoria->id == $pro->category_id ? 'selected='.$pro->category_id : '';?>>
                <?=$categoria->name_categori?>
            </option>
        <?php } ?>
    </select>

    <label for="imagen">Imagen</label>
    <?php if (isset($pro) && is_object($pro) && !empty($pro->image)): ?>
        <img src="<?=domain?>uploads/img/<?=$pro->image?>">
    <?php endif;?>
    <input type="file" name="imagen">
    <br>
    <input type="submit" value="Guardar">
</form>