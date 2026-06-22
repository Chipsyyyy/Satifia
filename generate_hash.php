<?php
    // TEMPORARY FILE - run this once to generate a correct password hash
    // DELETE this file after you're done using it!

    $plain_password = "admin123";
    $hashed = password_hash($plain_password, PASSWORD_DEFAULT);

    echo "Plain password: " . $plain_password . "<br>";
    echo "Hashed password: " . $hashed . "<br><br>";
    echo "Copy the hashed password above and paste it into the `password` column<br>";
    echo "of the `tbladmins` table (row with username = 'admin') in phpMyAdmin.";
?>
