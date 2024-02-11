<?php
include('config.php');


if(isset($_POST['product_ids'], $_POST['product_names'], $_POST['product_prices'], $_POST['product_stocks'], $_POST['supplier_ids'])) {

    $productId = $_POST['product_ids'];
    $productName = $_POST['product_names'];
    $productPrice = $_POST['product_prices'];
    $stocks = $_POST['product_stocks'];
    $supplierId = $_POST['supplier_ids'];

    $sql_up = "UPDATE products SET `productName`='$productName', `productPrice`='$productPrice', `stock`='$stocks', `supplieId`='$supplierId' WHERE `productId`='$productId'";

    if ($conn->query($sql_up) === TRUE) {
        echo "Record updated successfully";  
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    
    echo "Form fields are not set";
}


$conn->close();
?>
