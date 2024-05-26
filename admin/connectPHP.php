<?php
    $servername = "localhost";//LAPTOP-8QF16IA0
    $username = "root";   
    $password = "";
    $dbname = "POURHOMME_MANAGEMENT";
    // Tạo kết nối
    try {
       
        $conn=new mysqli($servername,$username,$password,$dbname);
    }
    catch(PDOException $e) {
        echo "Lỗi kết nối: " . $e->getMessage();
    }
?>
