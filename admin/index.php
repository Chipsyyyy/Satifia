<?php
    session_start();

    if(!isset($_SESSION['admin_id'])) {
        header('Location: login.php');
        exit();
    }

    $title = "Dashboard";
    $css_path = "../css/style.css";
    $root_path = "../";
    include('../include/header.php');
?>

<div class="admin-layout">
    <?php include('include/admin_sidebar.php'); ?>
    <main class="admin-main">
        <div class="admin-topbar">
            <h1 class="admin-page-title">Dashboard</h1>
            <span style="font-size:13px; color: var(--charcoal);">Welcome, <?= htmlspecialchars($_SESSION['admin_name']); ?></span>
        </div>

        <div class="admin-stats-grid">
            <div class="stat-card">
                <p class="stat-card-label">Total Products</p>
                <p class="stat-card-value">12</p>
                <p class="stat-card-sub">In inventory</p>
            </div>
            <div class="stat-card">
                <p class="stat-card-label">Total Orders</p>
                <p class="stat-card-value">0</p>
                <p class="stat-card-sub">All time</p>
            </div>
            <div class="stat-card">
                <p class="stat-card-label">Registered Users</p>
                <p class="stat-card-value">0</p>
                <p class="stat-card-sub">Buyers</p>
            </div>
            <div class="stat-card">
                <p class="stat-card-label">Admin Accounts</p>
                <p class="stat-card-value">1</p>
                <p class="stat-card-sub">Active</p>
            </div>
        </div>

        <div class="admin-card">
            <p class="admin-card-title">Quick Links</p>
            <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                <a href="products.php" class="btn-primary">Manage Products</a>
                <a href="users.php" class="btn-outline">Manage Users</a>
                <a href="reports.php" class="btn-outline">View Reports</a>
            </div>
        </div>
    </main>
</div>

<?php include('../include/footer.php'); ?>
