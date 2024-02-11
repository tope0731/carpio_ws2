<?php

include('config.php');

$userId = $_GET['user_id'];

echo "<pre>";

$sql_ru = "SELECT * from users WHERE userId = $userId"; 
$result_ru = mysqli_query($conn, $sql_ru) or die("SQL User Fetch error" . mysqli_error($conn)); 
$rowcount_ini = mysqli_num_rows($result_ru);

if ($rowcount_ini >= 1) {    
    while ($result_ru_prod = mysqli_fetch_assoc($result_ru)) {
        $result_ru_prod = (object) $result_ru_prod;
        
        $firstName = $result_ru_prod->firstName;
        $lastName = $result_ru_prod->lastName;
        $address = $result_ru_prod->address;
      
        
    }
}                                            
?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="errorUpdate" style="color: red;"></div>     

        <div class="center-content">
        <h2> User Info</h2>

            <label for="transaction_id1">User Id</label>
            <input type="text" id="user_id1s" value="<?=$userId?>" readonly placeholder="Product Id">

            <label for="user_id1">Fisrtname </label>
            <input type="text" id="fname1s" value="<?=$firstName?>" readonly placeholder="Supplier Id">

            <label for="amount1">Lastname</label>
            <input type="text" id="lname1s" value="<?=$lastName?>" readonly placeholder="Product Name">

            <label for="product_id1">Address</label>
            <input type="text" id="adds" value="<?=$address?>" readonly placeholder="Product Price">
   
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
