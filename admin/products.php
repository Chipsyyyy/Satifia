<?php
    session_start();

    if(!isset($_SESSION['admin_id'])) {
        header('Location: login.php');
        exit();
    }

    $title = "Products";
    $admin_active = "products";
    $css_path = "../css/style.css";
    $root_path = "../";
    include('../include/header.php');

    // TODO: Replace with DB query
    $products = array(
        array("id"=>1, "name"=>"Linen Wrap Blouse",    "category"=>"Tops",        "price"=>899.00,  "stock"=>15),
        array("id"=>2, "name"=>"Floral Button Shirt",  "category"=>"Tops",        "price"=>799.00,  "stock"=>20),
        array("id"=>3, "name"=>"Ribbed Tank Top",      "category"=>"Tops",        "price"=>499.00,  "stock"=>30),
        array("id"=>4, "name"=>"High-Waist Trousers",  "category"=>"Bottoms",     "price"=>1199.00, "stock"=>10),
        array("id"=>5, "name"=>"Pleated Midi Skirt",   "category"=>"Bottoms",     "price"=>999.00,  "stock"=>12),
        array("id"=>6, "name"=>"Wide-Leg Linen Pants", "category"=>"Bottoms",     "price"=>1099.00, "stock"=>8),
        array("id"=>7, "name"=>"Midi Sundress",        "category"=>"Dresses",     "price"=>1499.00, "stock"=>7),
        array("id"=>8, "name"=>"Wrap Maxi Dress",      "category"=>"Dresses",     "price"=>1699.00, "stock"=>5),
        array("id"=>9, "name"=>"Cropped Blazer",       "category"=>"Outerwear",   "price"=>1899.00, "stock"=>6),
        array("id"=>10,"name"=>"Trench Coat",          "category"=>"Outerwear",   "price"=>2499.00, "stock"=>4),
        array("id"=>11,"name"=>"Pearl Stud Earrings",  "category"=>"Accessories", "price"=>299.00,  "stock"=>50),
        array("id"=>12,"name"=>"Canvas Tote Bag",      "category"=>"Accessories", "price"=>599.00,  "stock"=>25),
    );
?>

<div class="admin-layout">
    <?php include('include/admin_sidebar.php'); ?>
    <main class="admin-main">
        <div class="admin-topbar">
            <h1 class="admin-page-title">Products &amp; Stock</h1>
            <a href="product_form.php" class="btn-primary">+ Add Product</a>
        </div>

        <?php if(isset($_SESSION['admin_success'])): ?>
            <div class="alert alert-success"><p><?= $_SESSION['admin_success']; ?></p></div>
            <?php unset($_SESSION['admin_success']); ?>
        <?php endif; ?>

        <div class="admin-card">
            <p class="admin-card-title">All Products (<?= count($products); ?>)</p>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($products as $p): ?>
                    <tr>
                        <td><?= $p['id']; ?></td>
                        <td><?= $p['name']; ?></td>
                        <td><?= $p['category']; ?></td>
                        <td>&#8369;<?= number_format($p['price'], 2); ?></td>
                        <td><?= $p['stock']; ?></td>
                        <td>
                            <span class="badge <?= $p['stock'] > 0 ? 'badge-active' : 'badge-inactive'; ?>">
                                <?= $p['stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?>
                            </span>
                        </td>
                        <td>
                            <a href="product_form.php?id=<?= $p['id']; ?>" style="color: var(--nude); font-size: 13px; margin-right:10px;">Edit</a>
                            <form action="process/delete_product.php" method="post" style="display:inline;">
                                <input type="hidden" name="product_id" value="<?= $p['id']; ?>">
                                <button type="submit" name="submit"
                                    style="background:none; border:none; color: var(--danger); font-size:13px; cursor:pointer; font-family: var(--font-body);"
                                    onclick="return confirm('Delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<?php include('../include/footer.php'); ?>
