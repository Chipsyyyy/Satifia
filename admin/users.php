<?php
    session_start();

    if(!isset($_SESSION['admin_id'])) {
        header('Location: login.php');
        exit();
    }

    $title = "Admin Users";
    $admin_active = "users";
    $css_path = "../css/style.css";
    $root_path = "../";
    include('../include/header.php');

    // TODO: Replace with DB query
    $users = array(
        array("id"=>1, "username"=>"superadmin", "name"=>"Super Admin", "role"=>"Admin", "status"=>"Active"),
    );
?>

<div class="admin-layout">
    <?php include('include/admin_sidebar.php'); ?>
    <main class="admin-main">
        <div class="admin-topbar">
            <h1 class="admin-page-title">Admin Users</h1>
            <a href="user_form.php" class="btn-primary">+ Add User</a>
        </div>

        <?php if(isset($_SESSION['admin_success'])): ?>
            <div class="alert alert-success"><p><?= $_SESSION['admin_success']; ?></p></div>
            <?php unset($_SESSION['admin_success']); ?>
        <?php endif; ?>

        <div class="admin-card">
            <p class="admin-card-title">Admin Accounts</p>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $u): ?>
                    <tr>
                        <td><?= $u['id']; ?></td>
                        <td><?= htmlspecialchars($u['name']); ?></td>
                        <td><?= htmlspecialchars($u['username']); ?></td>
                        <td><span class="badge badge-admin"><?= $u['role']; ?></span></td>
                        <td><span class="badge badge-active"><?= $u['status']; ?></span></td>
                        <td>
                            <a href="user_form.php?id=<?= $u['id']; ?>" style="color: var(--nude); font-size:13px; margin-right:10px;">Edit</a>
                            <?php if($u['id'] != $_SESSION['admin_id']): ?>
                            <form action="process/delete_user.php" method="post" style="display:inline;">
                                <input type="hidden" name="user_id" value="<?= $u['id']; ?>">
                                <button type="submit" name="submit"
                                    style="background:none; border:none; color: var(--danger); font-size:13px; cursor:pointer; font-family: var(--font-body);"
                                    onclick="return confirm('Delete this admin user?')">Delete</button>
                            </form>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<?php include('../include/footer.php'); ?>
