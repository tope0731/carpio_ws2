<?php
    include('config.php');
    
    $user_id = $_GET['user_id'];

    $sql_du = "DELETE FROM `users` WHERE userId='$user_id'";

    if ($conn->query($sql_du) === TRUE) {
        echo "Record Deleted successfully";
        
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
?>
