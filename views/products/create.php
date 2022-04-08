<h1>Creat nuevos productos</h1>

<form action="<?=domain?>productController/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">

    <label for="desc">Descripción</label>
    <textarea name="desc" id="desc"></textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" id="precio">

    <label for="stock">Stock</label>
    <input type="number" name="stock" id="stock">

    <label for="categoria">Categorias</label>
    <?php $categorias = Utils::showcategorias(); ?>
    <select  name="categoria">
        <?php while ($categoria = $categorias->fetch_object()){ ?>
            <option value="<?=$categoria->id?>">
                <?=$categoria->name_categori?>
            </option>
        <?php } ?>
    </select>

    <label for="imagen">Imagen</label>
    <input type="file" name="imagen">
    <br>
    <input type="submit" value="Guardar">
</form>