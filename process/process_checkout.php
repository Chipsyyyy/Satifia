<?php
    session_start();

    if(!isset($_SESSION['buyer_id'])) {
        header('Location: ../login.php');
        exit();
    }

    if(isset($_POST['submit'])) {
        $recv_name      = $_POST['recv_name'];
        $recv_address   = $_POST['recv_address'];
        $recv_contact   = $_POST['recv_contact'];
        $recv_email     = $_POST['recv_email'];
        $payment_method = $_POST['payment_method'];

        $errors = array();

        if(empty(trim($recv_name)))    { $errors[] = "Please enter the recipient name."; }
        if(empty(trim($recv_address))) { $errors[] = "Please enter a delivery address."; }
        if(empty(trim($recv_contact))) { $errors[] = "Please enter a contact number."; }
        if(empty(trim($recv_email)))   { $errors[] = "Please enter an email for confirmation."; }

        if(!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: ../checkout.php');
            exit();
        }

        $cart = $_SESSION['cart'];
        $subtotal = 0;
        foreach($cart as $item) {
            $price = (float) str_replace(',', '', $item['price']);
            $subtotal += $price * $item['qty'];
        }
        $shipping = ($subtotal >= 1500) ? 0 : 150;
        $total = $subtotal + $shipping;

        $method_labels = array(
            'cod'   => 'Cash on Delivery (COD)',
            'gcash' => 'GCash',
            'bank'  => 'Bank Transfer'
        );
        $payment_label = isset($method_labels[$payment_method]) ? $method_labels[$payment_method] : $payment_method;

        // TODO: Save order to DB here

        $_SESSION['order_summary'] = array(
            'order_number'   => strtoupper(substr(md5(time()), 0, 8)),
            'items'          => $cart,
            'total'          => $total,
            'address'        => $recv_address,
            'email'          => $recv_email,
            'payment_method' => $payment_label
        );

        header('Location: ../payment.php');
        exit();
    }
?>
