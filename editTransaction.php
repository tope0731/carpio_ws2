<?php
    include('config.php');

    $transaction_id = $_GET['transaction_id'];

    echo "<pre>";

    $sql_tr = "SELECT * from transaction WHERE transactionId = $transaction_id"; 
    
    $result_tr = mysqli_query($conn, $sql_tr) or die("SQL User Fetch error" . mysqli_error($conn)); 
    $rowcount_ini = mysqli_num_rows($result_tr);

    if ($rowcount_ini >= 1) {    
        while ($result_tr_prod = mysqli_fetch_assoc($result_tr)) {
            $result_tr_prod = (object) $result_tr_prod;
            
            $user_id = $result_tr_prod->userId;
            $date = $result_tr_prod->transactionDate;
            $amount = $result_tr_prod->transactionAmount;
            $product_id = $result_tr_prod->productId;
            $quantity = $result_tr_prod->quantity;
        }
    }                                            
?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="errorUpdate" style="color: red;"></div>     

        <div class="center-content">
        <h2>Update Transaction</h2>

            <label for="transaction_id1">Transaction Id</label>
            <input type="text" id="transaction_id1" value="<?=$transaction_id?>" readonly placeholder="Transaction Id">

            <label for="user_id1">User Id</label>
            <input type="text" id="user_id1" value="<?=$user_id?>" placeholder="User Id">

            <label for="amount1">Transaction Amount</label>
            <input type="text" id="amount1" value="<?=$amount?>" placeholder="Transaction Amount">

            <label for="product_id1">Product Id</label>
            <input type="text" id="product_id1" value="<?=$product_id?>" placeholder="Product Id">

            <label for="quantity1">Product Quantity</label>
            <input type="text" id="quantity1" value="<?=$quantity?>" placeholder="Product Quantity">

            <input type="button" value="Update" onclick="updateTransactionAndCloseModal()" style="margin-top: 10px; padding: 8px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
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
    function updateTransactionAndCloseModal() {
        
        updateTransaction();

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
