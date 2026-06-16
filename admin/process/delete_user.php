<?php
    session_start();

    if(!isset($_SESSION['admin_id'])) {
        header('Location: ../login.php');
        exit();
    }

    if(isset($_POST['submit'])) {
        $user_id = (int)$_POST['user_id'];

        // Safety: don't allow deleting yourself
        if($user_id == $_SESSION['admin_id']) {
            $_SESSION['admin_error'] = "You cannot delete your own account.";
            header('Location: ../users.php');
            exit();
        }

        // TODO: Delete from DB where id = $user_id
        $_SESSION['admin_success'] = "User deleted successfully.";
    }

    header('Location: ../users.php');
    exit();
?>
