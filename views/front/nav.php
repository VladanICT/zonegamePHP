<nav>
    <ul class="menu">
        <li><a class="active" href="index.php?page=home">Pocetna</a></li>
        <?php
            include "php/menu.php";
            foreach($result as $menu):
        ?>
            <li><a href="<?= $menu->href ?>"><?= $menu->title ?></a></li>
        <?php
            endforeach;
        ?>

        <?php if(!isset($_SESSION['user']) && !isset($_SESSION['admin'])):?>
            <li><a href="index.php?page=login">Prijava</a></li>
        <?php endif; ?>

        <?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])):?>
            <li><a href="index.php?page=anketa">Anketa</a></li>
        <?php endif; ?>

        <?php if(isset($_SESSION['user']) || isset($_SESSION['admin'])):?>
            <li><a href="index.php?page=logout">Odjava</a></li>
        <?php endif; ?>

		<?php if(isset($_SESSION['admin'])):?>
			<li><a href="admin.php">Admin Panel</a></li>
		<?php endif; ?>
    </ul>
</nav>