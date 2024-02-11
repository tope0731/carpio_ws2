<?php
include('config.php');

$transactionId = $_GET['transaction_id'];

echo "<pre>";

$sql_rtr = "SELECT * from transaction WHERE transactionId = $transactionId"; 
$result_rtr = mysqli_query($conn, $sql_rtr) or die("SQL User Fetch error" . mysqli_error($conn)); 
$rowcount_ini = mysqli_num_rows($result_rtr);

if ($rowcount_ini >= 1) {    
    while ($result_rtr_prod = mysqli_fetch_assoc($result_rtr)) {
        $result_rtr_prod = (object) $result_rtr_prod;
        
        $user_id = $result_rtr_prod->userId;
        $date = $result_rtr_prod->transactionDate;
        $amount = $result_rtr_prod->transactionAmount;
        $product_id = $result_rtr_prod->productId;
        $quantity = $result_rtr_prod->quantity;
    }
}                                            
?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="errorUpdate" style="color: red;"></div>     

        <div class="center-content">
            <h2><?php echo "Transaction #$transactionId"; ?></h2>
            <label for="user_id1">User Id</label>
            <input type="text" value="<?= $user_id ?>" placeholder="User Id" readonly>

            <label for="amount1">Transaction Amount</label>
            <input type="text" value="<?= $amount ?>" placeholder="Transaction Amount" readonly>

            <label for="product_id1">Product Id</label>
            <input type="text" value="<?= $product_id ?>" placeholder="Product Id" readonly>

            <label for="product_id1">Transaction Date</label>
            <input type="text" value="<?= $date ?>" placeholder="Product Id" readonly>

            <label for="quantity1">Product Quantity</label>
            <input type="text" value="<?= $quantity ?>" placeholder="Product Quantity" readonly>
        </div>
    </div>
</div>

<style>
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
    background-color: #5c636a;
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
