<?php
    include './ConnectDatabase/connectDatabase.php';

    $cartItemID = $_POST['cartItemID'];
    $quantity = $_POST['quantity'];

    try {
        $stmt = $conn->prepare("UPDATE CART_ITEMS SET quantity = :quantity WHERE cartItemID = :cartItemID");
        $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $stmt->bindParam(':cartItemID', $cartItemID, PDO::PARAM_INT);
        $stmt->execute();
    } catch (PDOException $e) {
        // Xử lý lỗi cập nhật cơ sở dữ liệu
        die("Cập nhật số lượng thất bại: " . $e->getMessage());
    }
    
    // Phản hồi về thành công cho yêu cầu Ajax
    echo "Cập nhật số lượng thành công";
    
    // Đóng kết nối đến cơ sở dữ liệu
    $conn = null;
?>