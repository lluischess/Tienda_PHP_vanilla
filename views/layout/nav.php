<?php $all_categoris = Utils::showcategorias(); ?>

<nav id="menu">
    <ul>
        <li>
            <a href="#">Inicio</a>
        </li>
        <?php while($cat = $all_categoris->fetch_object()) {
            ?>
            
        <li>
            <a href="#"><?= $cat->name_categori ?></a>
        </li>
        <?php } ?>
    </ul>
</nav>