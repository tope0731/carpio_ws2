<?php
include('config.php');

if(isset($_POST['user_ids'], $_POST['fnames'], $_POST['lnames'], $_POST['addresss'])) {
    $user_id = $_POST['user_ids'];
    $firstName = $_POST['fnames'];
    $lastName = $_POST['lnames'];
    $address = $_POST['addresss'];
   
    $sql_uu = "UPDATE users SET `firstName`='$firstName', `lastName`='$lastName', `address`='$address' WHERE `userId`='$user_id'";

    if ($conn->query($sql_uu) === TRUE) {
        echo "Record updated successfully";  
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    
    echo "Form fields are not set";
}

$conn->close();
?>
