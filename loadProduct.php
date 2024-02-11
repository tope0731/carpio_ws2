<?php
include('config.php');
?>

<script>
    
// EDITING OF PRODUCT
    function editProduct(value){

        $.get("editProduct.php?product_id="+value, function(data, status){    

            $("#viewProduct").html(data);
        });
    }

// DELETING OF PRODUCT
    function deleteProduct(value){
       
        $.get("deleteproduct.php?product_id="+value, 
        function(data, status){   
             
             alert("Data: " + data + "\nStatus: " + status);  
             $("#viewProduct").html(data);
             $("#loadproduct").load("loadProduct.php");    
        });
    }

// VIEWING OF PRODUCT
    function viewProduct(value){
       
        $.get("viewProduct.php?product_id="+value, 
        function(data, status){   
             
             $("#viewProduct").html(data);
         
        });
    }

// UPDATING OF PRODUCT
    function updateProduct(){

        var product_id =  $("product_id1").val();
        var supplier_id=  $("supplier_id").val();
        var product_name = $("product_name1").val();
        var product_price =  $("product_price1").val();
        var product_stock =  $("stock").val();
        
       
        $.post("updateproduct.php",  
            {    
                product_ids : product_id,
                product_names : product_name,
                product_prices :product_price,
                product_stocks : product_stock,
                supplier_ids : supplier_id
            },  
            function(data, status){     
                if (data==1){
                    $("errorUpdate").html("Product code must be unique");
                }else{
                    $("#loadproduct").load("loadProduct.php");    
                }
                
                
                alert("Data: " + data + "\nStatus: " + status);  
            });
    }


// ADDING OF PRODUCT 
    function AddProduct(){

        var product_name_add =  $("#product_name_add").val();
        var supplier_id_add =  $("#product_supplier_add").val();
        var product_price_add =  $("#product_price_add").val();
        var product_stock_add =  $("#product_stock_add").val();

        $.post("addproduct.php",  
            {    
                product_name_adds: product_name_add,
                supplier_id_adds : supplier_id_add,
                product_price_adds : product_price_add,
                product_stock_adds : product_stock_add  
            },  
            function(data, status){     
                
                if (data==0){
                    $("errorUpdate").html("Product code must be unique");
                }else{
                    $("#loadproduct").load("loadProduct.php");     
                }
                alert("Data: " + data + "\nStatus: " + status);  
                
            });
    }

</script>
<table style="width: 100%; text-align: center;">
    <tr style="background-color: green; color:white;">
        <th style="padding:10px;">Product Id</th>
        <th style="padding:10px;">Supplier Id</th>
        <th style="padding:10px;">Product Name</th>
        <th style="padding:10px;">Product Price</th>
        <th style="padding:10px;">Stock</th>
        <th style="padding:10px;">Action</th>
    </tr>
    <tbody>
        <?php
            $pn = "";
        if (isset($_GET['productname'])) {
            $pn = $_GET['productname'];
        }

        $sql_lp = "SELECT * from products where 1=1  AND productName like '%$pn%' ";

        $result_lp = mysqli_query($conn, $sql_lp) or die("SQL User Fetch error" . mysqli_error($conn));
        $rowcount_ini = mysqli_num_rows($result_lp);

        if ($rowcount_ini >= 1) {
            while ($result_lp_prod = mysqli_fetch_assoc($result_lp)) {
        ?>
                <tr>
                    <td style='text-align: center;'><strong><?= $result_lp_prod['productId'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_lp_prod['supplierId'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_lp_prod['productName'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_lp_prod['productPrice'] ?></strong></td>
                    <td style='text-align: center;'><strong><?= $result_lp_prod['stocks'] ?></strong></td>
                    <td>
                        <a href="#" class="btn btn-primary" onclick="editProduct(<?=$result_lp_prod['productId']?>)">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="deleteProduct(<?= $result_lp_prod['productId'] ?>)">Delete</a>
                        <a href="#" class="btn btn-secondary" onclick="viewProduct(<?= $result_lp_prod['productId'] ?>)">View</a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="4" align="center"><strong style="color:red">No Record Found</strong></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
