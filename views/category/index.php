<h1>Gestion de Categorias</h1>
<?php if(!isset($_SESSION['user_login']) || !isset($_SESSION['admin_login'])): ?>
    <p>NO ESTAS LOGEADO</p>
    <?php else: ?>
<a href="<?=domain?>categoryController/create" class="button button-s"> Crear Categoria </a>

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

<?php endif; ?>