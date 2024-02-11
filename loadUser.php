<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
// EDITING OF USER
    function editUser(value){
        $.get("editUser.php?user_id="+value, 
        function(data, status){   
             
             $("#viewProduct").html(data);
        });
    }

// UPDATING OF USER
    function updateUser(){

        var user_id =  $("#user_id1").val();
        var fname =  $("#fname1").val();
        var lname =  $("#lname1").val();
        var address =  $("#address1").val();

        $.post("updateUser.php",  
            {    
            
                user_ids: user_id,
                fnames : fname,
                lnames : lname,
                addresss : address,
            
            },  
            function(data, status){     
                if (data==1){
                    $("#errorUpdate").html("Product code must be unique");
                }else{
                    $("#loaduser").load("loadUser.php");     
                }
                
                
                alert("Data: " + data + "\nStatus: " + status);  
            });
    }

// DELETING OF USER
    function deleteUser(value){
        
            $.get("deleteuser.php?user_id="+value, 
            function(data, status){   
                 
                alert("Data: " + data + "\nStatus: " + status);  
                $("#viewProduct").html(data);
                $("#loaduser").load("loadUser.php");    
            });
    }

// ADDING OF USER
    function AddUser(){
        var fname_add =  $("#fname_add").val();
        var lname_add =  $("#lname_add").val();
        var address_add =  $("#address_add").val();

        $.post("adduser.php",  
            {    
                fname_adds: fname_add,
                lname_adds : lname_add,
                address_adds : address_add,
            
            },  
            function(data, status){     
                
                if (data==0){
                    $("#errorUpdate").html("Product code must be unique");
                }else{
                    $("#loaduser").load("loadUser.php");     
                }
                
                
                alert("Data: " + data + "\nStatus: " + status);  
            });
    }


// VIEWING OF USER
    function viewUser(value){
        
            $.get("viewUser.php?user_id="+value, 

            function(data, status){   
                 
                $("#viewProduct").html(data);
            
            });
    }

</script>

<?php
include('config.php');
?>
<table style="width: 100%; text-align: center;">
    <tr style="background-color: green; color:white;">
        <th style="padding:10px;">User Id</th>
        <th style="padding:10px;">First Name</th>
        <th style="padding:10px;">Last Name</th>
        <th style="padding:10px;">Address</th>
        <th style="padding:10px;" >Action</th>
    </tr>
    <tbody>
        <?php
        $username = "";
        if (isset($_GET['username'])) {
            $username = $_GET['username'];
        }

        $sql_lu = "SELECT * from users where 1=1  AND firstName like '%$username%' ";

        $result_lu = mysqli_query($conn, $sql_lu) or die("SQL User Fetch error" . mysqli_error($conn));
        $rowcount_ini = mysqli_num_rows($result_lu);

        if ($rowcount_ini >= 1) {
            while ($result_lu_prod = mysqli_fetch_assoc($result_lu)) {
        ?>
                <tr>
                    <td style='text-align: center;'><strong><?= $result_lu_prod['userId'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_lu_prod['firstName'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_lu_prod['lastName'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_lu_prod['address'] ?></strong></td>
                    <td>
                        <a href="#" class="btn btn-primary" onclick="editUser(<?=$result_lu_prod['userId']?>)">Edit<a>
                        <a href="#" class="btn btn-danger" onclick="deleteUser(<?= $result_lu_prod['userId'] ?>)">Delete<a>
                        <a href="#" class="btn btn-secondary" onclick="viewUser(<?= $result_lu_prod['userId'] ?>)">View<a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="4" align="center"><strong style="color:red">No Record List</strong></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</body>
</html>