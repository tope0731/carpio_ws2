<?php

include('config.php');

$user_id = $_GET['user_id'];

echo "<pre>";

$sql_u = "SELECT * from users WHERE userId = $user_id"; 
$result_u = mysqli_query($conn, $sql_u) or die("SQL User Fetch error" . mysqli_error($conn)); 
$rowcount_ini = mysqli_num_rows($result_u);

if ($rowcount_ini >= 1) {    
    while ($result_u_prod = mysqli_fetch_assoc($result_u)) {
        $result_u_prod = (object) $result_u_prod;
        
        
        $fname = $result_u_prod->firstName;
        $lname = $result_u_prod->lastName;
        $address = $result_u_prod->address;
  
        
    }
}                                            
?>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div id="errorUpdate" style="color: red;"></div>     

        <div class="center-content">
        <h2>Update User Info</h2>

            <label for="transaction_id1">User Id</label>
            <input type="text" id="user_id1" value="<?=$user_id?>" readonly placeholder="User Id">

            <label for="user_id1">Firstname</label>
            <input type="text" id="fname1" value="<?=$fname?>" placeholder="Firstname">

            <label for="amount1">LastName</label>
            <input type="text" id="lname1" value="<?=$lname?>" placeholder="Lastname">

            <label for="product_id1">Adress</label>
            <input type="text" id="address1" value="<?=$address?>" placeholder="Address">

           

            <input type="button" value="Update" onclick="updateUserAndCloseModal()" style="margin-top: 10px; padding: 8px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
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
    function updateUserAndCloseModal() {

        updateUser();

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
