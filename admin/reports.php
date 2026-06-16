<?php
    session_start();

    if(!isset($_SESSION['admin_id'])) {
        header('Location: login.php');
        exit();
    }

    $title = "Reports";
    $admin_active = "reports";
    $css_path = "../css/style.css";
    $root_path = "../";
    include('../include/header.php');

    // TODO: Replace with real DB queries
    $inventory = array(
        array("id"=>1,  "name"=>"Linen Wrap Blouse",    "category"=>"Tops",        "price"=>899.00,  "stock"=>15),
        array("id"=>2,  "name"=>"Floral Button Shirt",  "category"=>"Tops",        "price"=>799.00,  "stock"=>20),
        array("id"=>3,  "name"=>"Ribbed Tank Top",      "category"=>"Tops",        "price"=>499.00,  "stock"=>30),
        array("id"=>4,  "name"=>"High-Waist Trousers",  "category"=>"Bottoms",     "price"=>1199.00, "stock"=>10),
        array("id"=>5,  "name"=>"Pleated Midi Skirt",   "category"=>"Bottoms",     "price"=>999.00,  "stock"=>12),
        array("id"=>6,  "name"=>"Wide-Leg Linen Pants", "category"=>"Bottoms",     "price"=>1099.00, "stock"=>8),
        array("id"=>7,  "name"=>"Midi Sundress",        "category"=>"Dresses",     "price"=>1499.00, "stock"=>7),
        array("id"=>8,  "name"=>"Wrap Maxi Dress",      "category"=>"Dresses",     "price"=>1699.00, "stock"=>5),
        array("id"=>9,  "name"=>"Cropped Blazer",       "category"=>"Outerwear",   "price"=>1899.00, "stock"=>6),
        array("id"=>10, "name"=>"Trench Coat",          "category"=>"Outerwear",   "price"=>2499.00, "stock"=>4),
        array("id"=>11, "name"=>"Pearl Stud Earrings",  "category"=>"Accessories", "price"=>299.00,  "stock"=>50),
        array("id"=>12, "name"=>"Canvas Tote Bag",      "category"=>"Accessories", "price"=>599.00,  "stock"=>25),
    );

    // Placeholder audit log
    $audit_log = array(
        array("time"=>"2025-06-01 09:00:00", "user"=>$_SESSION['admin_name'], "action"=>"Logged in"),
        array("time"=>"2025-06-01 09:02:00", "user"=>$_SESSION['admin_name'], "action"=>"Viewed Products page"),
        array("time"=>"2025-06-01 09:05:00", "user"=>$_SESSION['admin_name'], "action"=>"Viewed Reports page"),
    );
?>

<div class="admin-layout">
    <?php include('include/admin_sidebar.php'); ?>
    <main class="admin-main">
        <div class="admin-topbar">
            <h1 class="admin-page-title">Reports</h1>
        </div>

        <!-- INVENTORY REPORT -->
        <div class="admin-card">
            <p class="admin-card-title">Inventory Report</p>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Remaining Stock</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($inventory as $item): ?>
                    <tr>
                        <td><?= $item['id']; ?></td>
                        <td><?= $item['name']; ?></td>
                        <td><?= $item['category']; ?></td>
                        <td>&#8369;<?= number_format($item['price'], 2); ?></td>
                        <td><?= $item['stock']; ?></td>
                        <td>
                            <span class="badge <?= $item['stock'] > 0 ? 'badge-active' : 'badge-inactive'; ?>">
                                <?= $item['stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- AUDIT LOG -->
        <div class="admin-card">
            <p class="admin-card-title">Audit Log &mdash; Current Session (<?= htmlspecialchars($_SESSION['admin_name']); ?>)</p>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Date &amp; Time</th>
                        <th>User</th>
                        <th>Activity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($audit_log as $log): ?>
                    <tr>
                        <td><?= $log['time']; ?></td>
                        <td><?= htmlspecialchars($log['user']); ?></td>
                        <td><?= htmlspecialchars($log['action']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p style="font-size:12px; color: var(--charcoal); margin-top:14px; font-style:italic;">
                Note: Full audit logging will be implemented once the database is connected.
            </p>
        </div>

    </main>
</div>

<?php include('../include/footer.php'); ?>
