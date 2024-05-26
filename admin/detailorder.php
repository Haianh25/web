<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/detailproduct.css">
</head>
<body>
    
</body>
</html>
<div class="container">
    <?php 
    require_once('connectPHP.php');
     $orderID = $_GET['code'];
    
      $sql_1 = "SELECT `quantityOrdered`, `priceEach`,PRODUCT.productName FROM ORDER_DETAIL 
      JOIN PRODUCT ON ORDER_DETAIL.productID = PRODUCT.productID  WHERE ORDER_DETAIL.productID = PRODUCT.productID AND ORDER_DETAIL.orderID = '$orderID' ";
      $products =  mysqli_query($conn,$sql_1);
    
         // Thực hiện truy vấn SQL
         $sql =  "SELECT 
         CUSTOMER.customerName, 
         ORDERS.orderDate, 
         ORDERS.subAddress,
         SUM(ORDER_DETAIL.quantityOrdered * ORDER_DETAIL.priceEach) AS total
       FROM 
         ORDERS 
         JOIN CUSTOMER ON ORDERS.customerID = CUSTOMER.customerID
         JOIN ORDER_DETAIL ON ORDERS.orderID = ORDER_DETAIL.orderID
         JOIN PRODUCT ON ORDER_DETAIL.productID = PRODUCT.productID
       WHERE 
         ORDERS.orderID = '$orderID'
       GROUP BY 
         CUSTOMER.customerName, 
         ORDERS.orderDate, 
         ORDERS.subAddress;
         ";
         $orders = mysqli_query($conn,$sql);
         $orders = mysqli_fetch_assoc($orders); 
    ?>
		<h2>Chi tiết hóa đơn</h2>
            <table>
			<tr>
				<th>Mã hóa đơn</th>
				<td><?php echo $orderID?></td>
			</tr>
            <tr>
				<th>Ngày đặt hàng</th>
				<td><?php echo $orders['orderDate'] ?></td>
			</tr>
            <tr>
				<th>Tên khách hàng</th>
				<td><?php echo $orders['customerName'] ?></td>
			</tr>
      <tr>
    <th>Tên sản phẩm</th>
    <td>
        <?php
        $resultString = '';
        $totalAmount = 0; // Biến lưu tổng số tiền
        while ($product = mysqli_fetch_array($products)) {
            $resultString .= $product['productName'] . ' x ' . $product['quantityOrdered'] . ' x ' . $product['priceEach'] . ', ';
            $subtotal = $product['quantityOrdered'] * $product['priceEach']; // Tính tổng tiền của mỗi sản phẩm
            $totalAmount += $subtotal; // Cộng vào tổng số tiền
        }
        // Loại bỏ dấu phẩy cuối cùng nếu có
        $resultString = rtrim($resultString, ', ');
        
        echo $resultString;
        ?>
    </td>
</tr>

			<tr>
				<th>Địa chỉ giao hàng</th>
				<td><?php echo $orders['subAddress'] ?></td>
			</tr>
			
			<tr>
    <th>Tổng tiền</th>
    <td>
        <?php
        echo $totalAmount. "Đ"; // In tổng số tiền
        ?>
    </td>
</tr>

		</table>
		
			
			
        <button class="btn">In hóa đơn</button>
        <button class="btn"><a href="admin.php?page=0" class="btn_goback">Trở về</a></button>
</div>
</body>
</html>