<h1>Gestion de Categorias</h1>

<a href="<?=domain?>categoryController/crear" class="button button-s"> Crear Categoria </a>

<br>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php while ($categoria = $all_categoris->fetch_object()){ ?>
        <tr>
            <td><?=$categoria->id?></td>
            <td><?=$categoria->name_categori?></td>
        </tr>
    <?php } ?>
</table>