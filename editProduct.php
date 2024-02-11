<?php

include('config.php');

$product_id = $_GET['product_id'];

echo "<pre>";

$sql_p = "SELECT * from products WHERE productId = $product_id"; 
$result_p = mysqli_query($conn, $sql_p) or die("SQL User Fetch error" . mysqli_error($conn)); 
$rowcount_ini = mysqli_num_rows($result_p);

if ($rowcount_ini >= 1) {    
    while ($result_p_prod = mysqli_fetch_assoc($result_p)) {
        $result_p_prod = (object) $result_p_prod;
        
        
        $product_name = $result_p_prod->productName;
        $price = $result_p_prod->productPrice;
        $stock = $result_p_prod->stocks;
        $supplier_id = $result_p_prod->supplierId;
        
    }
}                                            
?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="errorUpdate" style="color: red;"></div>     

        <div class="center-content">
        <h2>Update Product Info</h2>

            <label for="transaction_id1">Product Id</label>
            <input type="text" id="product_id1" value="<?=$product_id?>" readonly placeholder="Product Id">

            <label for="user_id1">Supplier Id</label>
            <input type="text" id="supplier_id" value="<?=$supplier_id?>" placeholder="Supplier Id">

            <label for="amount1">Product Name</label>
            <input type="text" id="product_name1" value="<?=$product_name?>" placeholder="Product Name">

            <label for="product_id1">Product Price</label>
            <input type="text" id="product_price1" value="<?=$price?>" placeholder="Product Price">

            <label for="quantity1">Stocks</label>
            <input type="text" id="stock" value="<?=$stock?>" placeholder="Stock">

            <input type="button" value="Update" onclick="updateProductAndCloseModal()" style="margin-top: 10px; padding: 8px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
        </div>
    </div>
</div>

<style>
    /* Modal Styles */
.modal {
    display: flex;
    align-items: center;
    justify-content: center;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #0b5ed7;
    padding: 20px;
    border: 1px solid rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    width: 90%; 
    max-width: 500px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    color: #ffffff; 
}

.close {
    color: #333;
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #000;
}

.center-content {
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>
<script>
    function updateProductAndCloseModal() {
        
        updateProduct();

        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }
    var modal = document.getElementById("myModal");

    var span = document.getElementsByClassName("close")[0];

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

