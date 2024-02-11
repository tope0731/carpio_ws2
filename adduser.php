<?php

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if(isset($_POST['fname_adds'], $_POST['lname_adds'],$_POST['address_adds'])) {
        
      
        $fname = mysqli_real_escape_string($conn, $_POST['fname_adds']);            
        $lname = mysqli_real_escape_string($conn, $_POST['lname_adds']);
        $address = mysqli_real_escape_string($conn, $_POST['address_adds']);
       
        $sql_au = "INSERT INTO `users`(`firstName`, `lastName`, `address`) VALUES ('$fname', '$lname', '$address')";


        if (mysqli_query($conn, $sql_au)) {
            echo "Record Added successfully";
        } else {
            echo "Error Adding record: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}

?>
