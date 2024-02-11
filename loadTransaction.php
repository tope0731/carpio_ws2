<?php
include('config.php');

?>

<script>
// EDITING OF TRANSACTION
     function editTransaction(value){
       
        $.get("editTransaction.php?transaction_id="+value, 
        function(data, status){   
             
             $("#viewProduct").html(data);
             
        });
    }

// DELETING OF TRANSACTION
    function DeleteTransaction(value){
       
        $.get("deletetransaction.php?transaction_id="+value, 
        function(data, status){   
             
             alert("Data: " + data + "\nStatus: " + status);  
             $("#viewProduct").html(data);
             $("#loadtransaction").load("loadTransaction.php");    
        });
    }

// VIEWING OF TRANSACTION
    function viewTransaction(value){
       
        $.get("viewTransaction.php?transaction_id="+value, 
        function(data, status){   
             
             $("#viewProduct").html(data);
         
        });
    }

// UPDATING OF TRANSACTION
    function updateTransaction(){
        var transaction_ids =  $("#transaction_id1").val();
        var amounts =  $("#amount1").val();
        var quantitys =  $("#quantity1").val();

        console.log(transaction_ids);
        $.post("updatetransaction.php",  
            {    
                transaction_idss: transaction_ids,
                amountss : amounts,
                quantityss : quantitys
                
                
            },  
            function(data, status){     
                
                if (data==0){
                    $("#errorUpdate").html("Product code must be unique");
                }else{
                    $("#loadtransaction").load("loadTransaction.php");     
                }
                
                
                alert("Data: " + data + "\nStatus: " + status);  
            });
    }

// ADDING OF TRANSACTION
    function AddTransaction(){
        var user_id_add =  $("#user_id_add").val();
        var amount_add =  $("#amount_add").val();
        var product_id_add =  $("#product_id_add").val();
        var quantity_add =  $("#quantity_add").val();


        $.post("addtransaction.php",  
            {    
                user_id_adds: user_id_add,
                amount_adds : amount_add,
                product_id_adds : product_id_add,
                quantity_adds : quantity_add  
            },  
            function(data, status){     
                
                if (data==0){
                    $("#errorUpdate").html("Product code must be unique");
                }else{
                    $("#loadtransaction").load("loadTransaction.php"); 
                    $("#loadproduct").load("loadProduct.php");    
                }
                
                
                alert("Data: " + data + "\nStatus: " + status);  
            });
    }


</script>

<p id="viewProduct"> </p>
<table style="width: 100%; text-align: center; ">
    <thead>
        <tr style="background-color: green; color: white;">
            <th style="padding:10px;">Transaction Id</a></th>
            <th style="padding:10px;">User Id</a></th>
            <th style="padding:10px;">Date</a></th>
            <th style="padding:10px;">Amount</a></th>
            <th style="padding:10px;">Product Id</a></th>
            <th style="padding:10px;">Quantity</a></th>
            <th  >Action</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $filter = "";
        if (isset($_GET['firstname'])) {
            $pc = $_GET['firstname'];
            $filter .= " AND transactionId LIKE '%" . mysqli_real_escape_string($conn, $pc) . "%'";
        }
        
        if (isset($_GET['start_transaction']) && isset($_GET['end_transaction'])) {
            $start = $_GET['start_transaction'];
            $end = $_GET['end_transaction'];
            $filter .= " AND transactionDate BETWEEN '" . mysqli_real_escape_string($conn, $start) . "' AND '" . mysqli_real_escape_string($conn, $end) . "'";
        }
        
        $sql_ltr = "SELECT * FROM transaction WHERE 1=1 $filter";

        $result_ltr = mysqli_query($conn, $sql_ltr) or die("SQL User Fetch error" . mysqli_error($conn));
        $rowcount_ini = mysqli_num_rows($result_ltr);

        if ($rowcount_ini >= 1) {
            while ($result_ltr_prod = mysqli_fetch_assoc($result_ltr)) {
        ?>
                <tr>
                    <td id="tID" style='text-align: center;'><strong><?= $result_ltr_prod['transactionId'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_ltr_prod['userId'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_ltr_prod['transactionDate'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_ltr_prod['transactionAmount'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_ltr_prod['productId'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_ltr_prod['quantity'] ?></strong></td>                   
                    <td>
                        <a href="#" class="btn btn-primary" onclick="editTransaction(<?= $result_ltr_prod['transactionId'] ?>)">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="DeleteTransaction(<?= $result_ltr_prod['transactionId'] ?>)">Delete</a>
                        <a href="#" class="btn btn-secondary" onclick="viewTransaction(<?= $result_ltr_prod['transactionId'] ?>)">View</a>
                    </td>

                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="6" align="center"><strong style="color:red">No Record List</strong></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
