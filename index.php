<?php
    session_start();
    $title = "Home";
    $active_nav = "home";
    include('include/header.php');
    include('include/navigation.php');
?>

<div class="page-wrapper">

    <!-- HERO -->
    <section class="hero">
        <p class="hero-eyebrow">New Collection — 2025</p>
        <h1 class="hero-title">Dress in your<br><em>own story.</em></h1>
        <p class="hero-subtitle">Effortless pieces for every occasion. Designed for the modern Filipino woman.</p>
        <a href="store.php" class="btn-primary">Shop the Collection</a>
    </section>

    <!-- CATEGORIES -->
    <section class="category-strip">
        <div class="section-header">
            <p class="section-eyebrow">Browse by Category</p>
            <h2 class="section-title">What are you looking for?</h2>
        </div>
        <div class="category-grid">
            <a href="store.php?category=tops" class="category-card">
                <h3>Tops</h3>
                <p>Blouses &amp; Shirts</p>
            </a>
            <a href="store.php?category=bottoms" class="category-card">
                <h3>Bottoms</h3>
                <p>Pants &amp; Skirts</p>
            </a>
            <a href="store.php?category=dresses" class="category-card">
                <h3>Dresses</h3>
                <p>Casual &amp; Formal</p>
            </a>
            <a href="store.php?category=outerwear" class="category-card">
                <h3>Outerwear</h3>
                <p>Jackets &amp; Coats</p>
            </a>
        </div>
    </section>

    <!-- FEATURED PRODUCTS (static placeholder, will connect to DB later) -->
    <section class="products-section">
        <div class="section-header">
            <p class="section-eyebrow">Featured</p>
            <h2 class="section-title">New Arrivals</h2>
        </div>
        <div class="product-grid">
            <?php
            // PLACEHOLDER products — will be replaced with DB query later
            $featured_products = array(
                array("name" => "Linen Wrap Blouse", "category" => "Tops", "price" => "899.00"),
                array("name" => "High-Waist Trousers", "category" => "Bottoms", "price" => "1,199.00"),
                array("name" => "Midi Sundress", "category" => "Dresses", "price" => "1,499.00"),
                array("name" => "Cropped Blazer", "category" => "Outerwear", "price" => "1,899.00"),
            );
            foreach($featured_products as $product):
            ?>
            <div class="product-card">
                <div class="product-image">
                    <span class="product-placeholder">Photo</span>
                </div>
                <div class="product-info">
                    <p class="product-category"><?= $product['category']; ?></p>
                    <h3 class="product-name"><?= $product['name']; ?></h3>
                    <p class="product-price">&#8369;<?= $product['price']; ?></p>
                </div>
                <form action="process/add_to_cart.php" method="post">
                    <input type="hidden" name="product_name" value="<?= $product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?= $product['price']; ?>">
                    <button type="submit" name="submit" class="product-add-btn">Add to Cart</button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
        <div style="text-align:center; margin-top: 40px;">
            <a href="store.php" class="btn-outline">View All Products</a>
        </div>
    </section>

    <!-- BRAND STRIP -->
    <section style="background-color: var(--nude); padding: 60px 40px; text-align:center;">
        <p style="font-family: var(--font-display); font-size: clamp(22px, 3vw, 34px); font-weight:300; color: white; letter-spacing: 0.05em;">
            "Style is a way to say who you are<br>without having to speak."
        </p>
        <p style="font-size: 12px; letter-spacing: 0.15em; color: rgba(255,255,255,0.75); margin-top: 16px; text-transform: uppercase;">— The Satifia Promise</p>
    </section>

</div>

<?php include('include/footer.php'); ?>
