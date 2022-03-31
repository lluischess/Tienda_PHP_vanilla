<h1>Crear nueva Categoria</h1>

<form action="<?=domain?>categoryController/save" method="post">

    <label for="categoryname">Nombre</label>
    <input type="text" name="categoryname" id="categoryname" require>
    <input type="submit" value="Guardar">
</form>