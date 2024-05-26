<?php
// Kết nối cơ sở dữ liệu (nếu chưa kết nối)
include './ConnectDatabase/connectDatabase.php';

// Kiểm tra xem có dữ liệu được gửi từ yêu cầu không
if (isset($_POST['cartItemID']) && isset($_POST['selected'])) {
    $cartItemID = $_POST['cartItemID'];
    $selected = $_POST['selected'];

    // Thực hiện truy vấn cập nhật dữ liệu trong cơ sở dữ liệu
    $stmt = $conn->prepare("UPDATE CART_ITEMS SET selected = :selected WHERE cartItemID = :cartItemID");
    $stmt->bindParam(':selected', $selected);
    $stmt->bindParam(':cartItemID', $cartItemID);
    $stmt->execute();

    // Trả về kết quả (nếu cần)
    echo 'success';
}
?>
