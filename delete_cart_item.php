<?php
// Kết nối tới cơ sở dữ liệu
include './ConnectDatabase/connectDatabase.php';

// Kiểm tra xem cartItemID đã được gửi lên không
if (isset($_POST['cartItemID'])) {
    $cartItemID = $_POST['cartItemID'];

    // Thực hiện xóa dữ liệu trong cơ sở dữ liệu
    $stmt = $conn->prepare("DELETE FROM CART_ITEMS WHERE cartItemID = :cartItemID");
    $stmt->bindParam(':cartItemID', $cartItemID);
    $stmt->execute();
}
?>
