<?php

include('config.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if(isset($_POST['user_id_adds'], $_POST['amount_adds'], $_POST['product_id_adds'], $_POST['quantity_adds'])) {
        
      
        $user_id = mysqli_real_escape_string($conn, $_POST['user_id_adds']);
        $amount = mysqli_real_escape_string($conn, $_POST['amount_adds']);
        $product_id = mysqli_real_escape_string($conn, $_POST['product_id_adds']);
        $quantity = mysqli_real_escape_string($conn, $_POST['quantity_adds']);
        $current_date = date("Y-m-d H:i:s");

 
        $sql_atr = "INSERT INTO `transaction` (`userId`, `transactionDate`, `transactionAmount`, `productId`, `quantity`) SELECT '$user_id', '$current_date', $quantity * products.productPrice, '$product_id', '$quantity' FROM products WHERE products.productId = $product_id;";
      
        if (mysqli_query($conn, $sql_atr)) {
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
    $sql_atr1="UPDATE transaction
    INNER JOIN products ON transaction.productId = products.productId
    SET products.stocks = products.stocks-$quantity
    WHERE products.productId = $product_id";

$result=mysqli_query($conn, $sql_atr1);
// Close the database connection
mysqli_close($conn);
?>
