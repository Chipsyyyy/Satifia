    <nav class="site-nav">
        <div class="nav-inner">
            <a href="<?= $root_path ?? ''; ?>index.php" class="<?= ($active_nav == 'home') ? 'active' : ''; ?>">Home</a>
            <a href="<?= $root_path ?? ''; ?>store.php" class="<?= ($active_nav == 'store') ? 'active' : ''; ?>">Shop All</a>
            <a href="<?= $root_path ?? ''; ?>store.php?category=tops" class="<?= ($active_nav == 'tops') ? 'active' : ''; ?>">Tops</a>
            <a href="<?= $root_path ?? ''; ?>store.php?category=bottoms" class="<?= ($active_nav == 'bottoms') ? 'active' : ''; ?>">Bottoms</a>
            <a href="<?= $root_path ?? ''; ?>store.php?category=dresses" class="<?= ($active_nav == 'dresses') ? 'active' : ''; ?>">Dresses</a>
            <a href="<?= $root_path ?? ''; ?>store.php?category=outerwear" class="<?= ($active_nav == 'outerwear') ? 'active' : ''; ?>">Outerwear</a>
            <a href="<?= $root_path ?? ''; ?>store.php?category=accessories" class="<?= ($active_nav == 'accessories') ? 'active' : ''; ?>">Accessories</a>
            <a href="<?= $root_path ?? ''; ?>about.php" class="<?= ($active_nav == 'about') ? 'active' : ''; ?>">About</a>
        </div>
    </nav>
