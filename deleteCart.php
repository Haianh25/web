<?php 
require_once('./admin/connectPHP.php');
    $cartItemID = $_GET['cartItem'];
    $sql = "DELETE FROM CART_ITEMS WHERE cartItemID ='$cartItemID'";
    $query = mysqli_query($conn,$sql);
    
    header('Location: product.php');
    
?>