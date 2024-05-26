<?php 
require_once('connectPHP.php');
    $orderId = $_GET['orderId'];
    $status = $_GET['status'];
    $sql = "UPDATE orders SET status = '$status' WHERE orderID = '$orderId' ";
    $query = mysqli_query($conn,$sql);
    
 
    
?>