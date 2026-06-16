<?php
    session_start();

    if(!isset($_SESSION['admin_id'])) {
        header('Location: ../login.php');
        exit();
    }

    if(isset($_POST['submit'])) {
        $user_id  = $_POST['user_id'];
        $name     = trim($_POST['name']);
        $username = trim($_POST['username']);
        $role     = $_POST['role'];
        $password = $_POST['password'];
        $confirm  = $_POST['confirmpassword'];

        $errors = array();
        $is_edit = !empty($user_id);

        if(empty($name))     { $errors[] = "Full name is required."; }
        if(empty($username)) { $errors[] = "Username is required."; }

        if(!$is_edit && empty($password)) {
            $errors[] = "Password is required for new users.";
        }
        if(!empty($password) && strlen($password) < 8) {
            $errors[] = "Password must be at least 8 characters.";
        }
        if(!empty($password) && $password !== $confirm) {
            $errors[] = "Passwords do not match.";
        }

        if(!empty($errors)) {
            $_SESSION['admin_errors'] = $errors;
            $redirect = $is_edit ? '../user_form.php?id=' . $user_id : '../user_form.php';
            header('Location: ' . $redirect);
            exit();
        }

        // TODO: Insert or update in DB (use password_hash($password, PASSWORD_DEFAULT))
        $_SESSION['admin_success'] = $is_edit
            ? "User \"$name\" updated successfully."
            : "User \"$name\" added successfully.";

        header('Location: ../users.php');
        exit();
    }
?>
