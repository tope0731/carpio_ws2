<?php
    include('config.php');
    
    $product_id = $_GET['product_id'];

    $sql_dp = "DELETE FROM `products` WHERE productId='$product_id'";

    if ($conn->query($sql_dp) === TRUE) {
        echo "Record Deleted successfully";
        
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
