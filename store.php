<?php
    session_start();
    $title = "Shop";
    $active_nav = "store";

    // Get category filter from URL (will be used in DB query later)
    $category = isset($_GET['category']) ? $_GET['category'] : 'all';

    include('include/header.php');
    include('include/navigation.php');
?>

<div class="page-wrapper">

    <div class="page-title-strip">
        <h1>Shop All</h1>
        <p>Discover the latest pieces from Satifia</p>
    </div>

    <div class="store-layout">

        <!-- FILTER BUTTONS -->
        <div class="store-filter-bar">
            <button class="filter-btn <?= ($category == 'all') ? 'active' : ''; ?>"
                onclick="window.location='store.php'">All</button>
            <button class="filter-btn <?= ($category == 'tops') ? 'active' : ''; ?>"
                onclick="window.location='store.php?category=tops'">Tops</button>
            <button class="filter-btn <?= ($category == 'bottoms') ? 'active' : ''; ?>"
                onclick="window.location='store.php?category=bottoms'">Bottoms</button>
            <button class="filter-btn <?= ($category == 'dresses') ? 'active' : ''; ?>"
                onclick="window.location='store.php?category=dresses'">Dresses</button>
            <button class="filter-btn <?= ($category == 'outerwear') ? 'active' : ''; ?>"
                onclick="window.location='store.php?category=outerwear'">Outerwear</button>
            <button class="filter-btn <?= ($category == 'accessories') ? 'active' : ''; ?>"
                onclick="window.location='store.php?category=accessories'">Accessories</button>
        </div>

        <!-- PRODUCT GRID -->
        <!-- TODO: Replace this static array with a DB query once database is set up -->
        <?php
        $all_products = array(
            array("id" => 1, "name" => "Linen Wrap Blouse",       "category" => "tops",        "category_label" => "Tops",        "price" => "899.00",  "stock" => 15),
            array("id" => 2, "name" => "Floral Button Shirt",     "category" => "tops",        "category_label" => "Tops",        "price" => "799.00",  "stock" => 20),
            array("id" => 3, "name" => "Ribbed Tank Top",         "category" => "tops",        "category_label" => "Tops",        "price" => "499.00",  "stock" => 30),
            array("id" => 4, "name" => "High-Waist Trousers",     "category" => "bottoms",     "category_label" => "Bottoms",     "price" => "1,199.00","stock" => 10),
            array("id" => 5, "name" => "Pleated Midi Skirt",      "category" => "bottoms",     "category_label" => "Bottoms",     "price" => "999.00",  "stock" => 12),
            array("id" => 6, "name" => "Wide-Leg Linen Pants",    "category" => "bottoms",     "category_label" => "Bottoms",     "price" => "1,099.00","stock" => 8),
            array("id" => 7, "name" => "Midi Sundress",           "category" => "dresses",     "category_label" => "Dresses",     "price" => "1,499.00","stock" => 7),
            array("id" => 8, "name" => "Wrap Maxi Dress",         "category" => "dresses",     "category_label" => "Dresses",     "price" => "1,699.00","stock" => 5),
            array("id" => 9, "name" => "Cropped Blazer",          "category" => "outerwear",   "category_label" => "Outerwear",   "price" => "1,899.00","stock" => 6),
            array("id" => 10,"name" => "Trench Coat",             "category" => "outerwear",   "category_label" => "Outerwear",   "price" => "2,499.00","stock" => 4),
            array("id" => 11,"name" => "Pearl Stud Earrings",     "category" => "accessories", "category_label" => "Accessories", "price" => "299.00",  "stock" => 50),
            array("id" => 12,"name" => "Canvas Tote Bag",         "category" => "accessories", "category_label" => "Accessories", "price" => "599.00",  "stock" => 25),
        );

        // Filter by category
        $products = array();
        foreach($all_products as $p) {
            if($category == 'all' || $p['category'] == $category) {
                $products[] = $p;
            }
        }
        ?>

        <div class="product-grid">
            <?php foreach($products as $product): ?>
            <div class="product-card">
                <div class="product-image">
                    <span class="product-placeholder">Photo</span>
                </div>
                <div class="product-info">
                    <p class="product-category"><?= $product['category_label']; ?></p>
                    <h3 class="product-name"><?= $product['name']; ?></h3>
                    <p class="product-price">&#8369;<?= $product['price']; ?></p>
                </div>
                <?php if($product['stock'] > 0): ?>
                <form action="process/add_to_cart.php" method="post">
                    <input type="hidden" name="product_id"    value="<?= $product['id']; ?>">
                    <input type="hidden" name="product_name"  value="<?= $product['name']; ?>">
                    <input type="hidden" name="product_price" value="<?= $product['price']; ?>">
                    <input type="hidden" name="redirect"      value="store.php?category=<?= $category; ?>">
                    <button type="submit" name="submit" class="product-add-btn">Add to Cart</button>
                </form>
                <?php else: ?>
                <button class="product-add-btn" disabled style="opacity:0.4; cursor:not-allowed;">Out of Stock</button>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if(count($products) == 0): ?>
        <div style="text-align:center; padding: 60px 0; color: var(--charcoal);">
            <p style="font-family: var(--font-display); font-size: 24px; font-weight:300;">No products found.</p>
            <p style="font-size: 13px; margin-top:8px;">Try a different category.</p>
        </div>
        <?php endif; ?>

    </div>
</div>

<?php include('include/footer.php'); ?>
