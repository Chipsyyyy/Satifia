<?php
    session_start();
    include('../../db.php');

    if(!isset($_SESSION['admin_id'])) {
        header('Location: ../login.php');
        exit();
    }

    if(isset($_POST['submit'])) {
        $user_id = (int) $_POST['user_id'];

        // Safety: don't allow deleting yourself
        if($user_id == $_SESSION['admin_id']) {
            $_SESSION['admin_error'] = "You cannot delete your own account.";
            mysqli_close($conn);
            header('Location: ../users.php');
            exit();
        }

        $sql = "DELETE FROM tbladmins WHERE id = '$user_id'";

        if(mysqli_query($conn, $sql)) {
            $_SESSION['admin_success'] = "User deleted successfully.";
        } else {
            $_SESSION['admin_error'] = "Could not delete user.";
        }
    }

    mysqli_close($conn);
    header('Location: ../users.php');
    exit();
?>
