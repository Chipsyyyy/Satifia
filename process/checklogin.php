<?php
    session_start();

    if(isset($_POST['submit'])) {
        $email    = $_POST['email'];
        $password = $_POST['password'];

        // TODO: Replace with real DB query
        if($email == "test@satifia.com" && $password == "password123") {
            $_SESSION['buyer_id']      = 1;
            $_SESSION['buyer_name']    = "Test User";
            $_SESSION['buyer_email']   = $email;
            $_SESSION['buyer_address'] = "123 Test Street, Manila";
            $_SESSION['buyer_contact'] = "09171234567";
            header('Location: ../store.php');
            exit();
        } else {
            $_SESSION['error'] = "Incorrect email or password. Please try again.";
            header('Location: ../login.php');
            exit();
        }
    }
?>
