<?php

require 'conection.php';  

if (isset($_POST['submit-checkout'])) {
    // Ambil data dari form
    $full_name = $_POST['full-name'];
    $user_email = $_POST['user-email'];
    $delivery_address = $_POST['delivery-address'];
    $phone_number = $_POST['phone-number'];
    $payment_method = $_POST['payment-method'];

    

    // Query untuk memasukkan data ke database
    $stmt = $con->prepare("INSERT INTO checkout (full_name, email, delivery_address, phone_number, payment_method) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $full_name, $user_email, $delivery_address, $phone_number, $payment_method);

    // Eksekusi query dan cek apakah berhasil
    if ($stmt->execute()) {
        header("location: success.php");
    } else {
        echo "Error: " . $stmt->error;
    }


    $stmt->close();
    $con->close();
}
?>
