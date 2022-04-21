<?php $all_categoris = Utils::showcategorias(); ?>

<nav id="menu">
    <ul>
        <li>
            <a href="<?=domain?>index.php">Inicio</a>
        </li>
        <?php while($cat = $all_categoris->fetch_object()) {
            ?>
            
        <li>
            <a href="<?=domain?>categoryController/ver&id=<?=$cat->id?>"><?= $cat->name_categori ?></a>
        </li>
        <?php } ?>
    </ul>
</nav>