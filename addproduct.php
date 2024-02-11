<?php

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if(isset($_POST['product_name_adds'], $_POST['supplier_id_adds'],$_POST['product_price_adds'],$_POST['product_stock_adds'])) 
    {
        
        $product_name = mysqli_real_escape_string($conn, $_POST['product_name_adds']);            
        $product_price = mysqli_real_escape_string($conn, $_POST['product_price_adds']);
        $stock = mysqli_real_escape_string($conn, $_POST['product_stock_adds']);
        $supplier_id = mysqli_real_escape_string($conn, $_POST['supplier_id_adds']);
      

 
        $sql_ap = "INSERT INTO `products`(`productName`, `productPrice`, `stocks`, `supplierId`) VALUES ('$product_name', '$product_price', '$stock', '$supplier_id')";
      
        if (mysqli_query($conn, $sql_ap)) {
            echo "Record Added successfully";
        } else {
            echo "Error Adding record: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}

?>
