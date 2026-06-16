<?php
    session_start();

    if(!isset($_SESSION['admin_id'])) {
        header('Location: ../login.php');
        exit();
    }

    if(isset($_POST['submit'])) {
        $product_id = $_POST['product_id'];
        $name       = trim($_POST['name']);
        $category   = $_POST['category'];
        $price      = $_POST['price'];
        $stock      = $_POST['stock'];

        $errors = array();

        if(empty($name))     { $errors[] = "Product name is required."; }
        if(empty($category)) { $errors[] = "Please select a category."; }
        if(!is_numeric($price) || $price < 0) { $errors[] = "Please enter a valid price."; }
        if(!is_numeric($stock) || $stock < 0) { $errors[] = "Please enter a valid stock quantity."; }

        if(!empty($errors)) {
            $_SESSION['admin_errors'] = $errors;
            $redirect = empty($product_id) ? '../product_form.php' : '../product_form.php?id=' . $product_id;
            header('Location: ' . $redirect);
            exit();
        }

        // TODO: Insert or update in DB
        $_SESSION['admin_success'] = empty($product_id)
            ? "Product \"$name\" added successfully."
            : "Product \"$name\" updated successfully.";

        header('Location: ../products.php');
        exit();
    }
?>
