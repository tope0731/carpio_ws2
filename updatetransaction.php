<?php
    include('config.php');
    
    $transactionId = $_POST['transaction_idss'];
    $transactionAmount = $_POST['amountss'];
    $quantity = $_POST['quantityss'];

    $sql_utr = "UPDATE transaction SET `transactionAmount`='$transactionAmount', `quantity`='$quantity' WHERE transactionId='$transactionId'";

    if ($conn->query($sql_utr) === TRUE) {
        echo "Record updated successfully";  
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>

