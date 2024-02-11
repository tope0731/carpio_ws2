<?php 
$localhost= 'localhost';
$user ='root';
$password='';
$database='carpio_ws_act1';

$conn = mysqli_connect($localhost,$user,$password,$database) or die ('db error connecting:'. mysqli_connect_error());
$conn -> set_charset('utf8');

if(isset($_SESSION)){
    session_start();
}
?>