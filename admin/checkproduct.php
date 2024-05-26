<?php 
require_once('connectPHP.php');
$id = $_GET["productID"];
$sql = "SELECT productStatus FROM product WHERE productID = '$id '";
$result = mysqli_query($conn,$sql);
$result = mysqli_fetch_array($result);


echo $result[0];
?>