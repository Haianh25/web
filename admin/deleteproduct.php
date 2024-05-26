<?php 
require_once('connectPHP.php');
    $productID = $_GET['productID'];
    $sql = "DELETE FROM product WHERE productID ='$productID'";
    $query = mysqli_query($conn,$sql);
    
    header('Location: admin.php?page=2');
    
?>