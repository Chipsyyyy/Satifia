<?php
    session_start();

    if(!isset($_SESSION['admin_id'])) {
        header('Location: ../login.php');
        exit();
    }

    if(isset($_POST['submit'])) {
        $product_id = (int)$_POST['product_id'];
        // TODO: Delete from DB where id = $product_id
        $_SESSION['admin_success'] = "Product deleted successfully.";
    }

    header('Location: ../products.php');
    exit();
?>
