<?php 
$conn = new mysqli('localhost', 'root', '', 'bnnksidoarjo');
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // echo "Connected successfully";
}
?>