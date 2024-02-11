<?php
    include('config.php');
    
    $transaction_id = $_GET['transaction_id'];

    $sql_dtr = "DELETE FROM `transaction` WHERE transactionId='$transaction_id'";

    if ($conn->query($sql_dtr) === TRUE) {
        echo "Record Deleted successfully";
        
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
