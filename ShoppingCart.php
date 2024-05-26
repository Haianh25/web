<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pour Homme - Shopping cart</title>
    <link rel="shortcut icon" type="image/png" href="./Image/favicon.webp">
    <link rel="stylesheet" href="./CSS/shoppingCart.css">
    <link rel="stylesheet" href="./Framework/bootstrap/css.css">
    <link rel="stylesheet" href="./Framework/bootstrap/bootstrap-4.0.0-dist/css/bootstrap-grid.css">
</head>

<body>

<?php include './header.php';?>
    <section class="page-wrapper">
        <div class="container-checkout-payment">
            <form action="#" method="post">
                <div class="container form-checkout">
                    <!-- <div class="address-receive">
                        <div class="address-header">
                            <i class="fa-solid fa-location-dot" style="margin-right: 9px;"></i>Địa chỉ nhận hàng
                        </div>
                        <div class="address customer">

                        </div>
                    </div> -->
                    
                    <div class="product-checkout" >
                        <div class="product-header row" style="margin-bottom: 10px;">
                            <div class="text-start col-5">Sản phẩm</div>
                            <div class="text-center col-1">Đơn giá</div>
                            <div class="text-center col-2">Số lượng</div>
                            <div class="text-center col-2">Thành tiền</div>
                            <div class="text-center col-2">Xóa sản phẩm</div>
                        </div>
                        


                        
                           <?php include './ConnectDatabase/connectDatabase.php';


                            

                                    $stmt = $conn->prepare("
                                    SELECT DISTINCT ci.cartItemID, p.productName, ci.quantity, p.buyPrice, p.productName, pi.productImageURL, pi.isMainImage
                                    FROM CART_ITEMS ci
                                    JOIN PRODUCT p ON ci.productID = p.productID
                                    JOIN PRODUCT_IMAGE pi ON p.productID = pi.productID
                                    WHERE ci.cartID IN (SELECT cartID FROM CART WHERE customerID = :customerID AND isMainImage = 1)
    
                                   ");
                                    $stmt->bindParam(':customerID', $_SESSION['customerID']);
                                    $stmt->execute();
                                  
                                    $stmt2 = $conn->prepare("SELECT * FROM CUSTOMER WHERE customerID = :customerID");
                                    $stmt2->bindParam(':customerID', $_SESSION['customerID']);
                                    $stmt2->execute();
                                    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    
                                    $customerName = $row2['customerName'];
                                    $address = $row2['addressLine1'];
                                    $phoneNumber = $row2['phoneNumber'];
    
    
                                    $countItemCard = 0;
                                    $sum = 0;
                                  
                                    $idCheck = "";
                                  
                                    $count = $stmt->rowCount();
                                    $_SESSION['cartItemCount'] = $count;
    
    
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                        $cartItemID = $row['cartItemID'];
                                        $productName = $row['productName'];
                                        $idCheck = $cartItemID;
                                       
                                        $quantity = $row['quantity'];
                                        $price = $row['buyPrice'];
                                        $total_price = $price * $quantity;
                                        $formatted_price = number_format($price, 0, ',', ',') . '₫';
                                        $formatted_price1 = number_format($total_price, 0, ',', ',') . '₫';
                                        
                                      
                                        
                                        
                                        $image = $row['productImageURL'].'.webp';
                                        $countItemCard += $quantity;
                                        $sum += $total_price;
                                       
                                       echo '
                                       <div class="product-contain row align-items-center">
                                       <div class="product-select text-start col-1">
                                           <span><input type="checkbox" data-cart-item-id1="' . $cartItemID .'"></span>
                                       </div>
                                       <div class="product-name text-center col-4">
                                           <span>
                                               <p><img src="'. $image .'" alt="Johny Classique Chelsea" style="width: 15%; margin-right: 9px">'. $productName .'</p>
                                               
                                           </span>
                                       </div>
                                       <div class="product-price text-center col-1">
                                           <span>
                                               <p>'.$formatted_price.'</p>
                                           </span>
                                       </div>
                                       <div class="product-quality text-center col-2" style="display: flex; justify-content: center;">
                                          
                                           <input type="number" pattern="\d*" min="0" step="1" value="'. $quantity .'" class="qty-input" name="quantity" disabled>
                                           
                                       </div>
           
                                       <div class="product-cost text-center col-2">
                                           <span>
                                               <p>'. $formatted_price1 .'</p>
                                           </span>
                                       </div>
                                       <div class="product-delete-icon text-center col-2" >
                                           <span>
                                               <p><i class="fa-solid fa-trash" data-cart-item-id="' . $cartItemID .'"></i></p>
                                           </span>
                                       </div>
                                   </div>
                                       ';

                                    }
                           ?> 
                         
                        
                    </div>
                    <?php 
                   
                        echo '
                        <div class="cart-information" style="display: flex; justify-content: space-between">
                        <div class="product-checkout " style="width: 45%">
                            <div class="product-header row text-bold" style="margin-bottom: 10px; font-size: 18px">Thông tin giao hàng </div>
                            <div class="product-contain row align-items-center">
                                <div class="ship-information text-start">
                                    <p>
                                        <span>Họ và tên: </span>'.$customerName.'
                                    </p>
                                    <p>
                                        <span>Địa chỉ: </span>'. $address .'
                                    </p>
                                    <p>
                                        <span>Số điện thoại: </span>'. $phoneNumber .'
                                    </p>
                                    
                                </div>  
                                <div class="ship-information text-center">
                                    <a href="./addressEdit.php" class="buy_btn">
                                        Thay đổi địa chỉ giao hàng
                                    </a>
                                </div>  
                            </div>
                        </div>
                        <div class="product-checkout " style="width: 50%">
                        <div class="product-header row text-bold" style="margin-bottom: 10px; font-size: 18px">Thông tin thanh toán </div>
                        <div class="product-contain row align-items-center">
                             <div class="payment-information text-start">
                                <p><span>Số lượng sản phẩm: </span>' . $countItemCard .'</p>
                            </div>
                            <div class="payment-information text-start">
                                <p><span>Tạm tính: </span>'.number_format($sum, 0, ',', ',') . "₫" .'</p>
                            </div>
                            <div class="payment-information text-start">
                                <p><span>Tổng tiền: </span>'.number_format($sum, 0, ',', ',') . "₫".' </p>
                            </div>
                            <div class="payment-information text-center">
                                <a href="./checkout.php" class="buy_btn">
                                    Mua hàng
                                </a>
                            </div>
                        </div>
                    </div>
                        ';
                   
                    ?>
                   
                       
                       



                    </div>
                   
                  
                    
                   
                </div>
            </form>
        </div>
    </section> 
    <?php include 'footer.php' ?>

</body>
<script>
const qtyInputs = document.querySelectorAll('.qty-input');
const qtyPlusBtns = document.querySelectorAll('.qty-plus');
const qtyMinusBtns = document.querySelectorAll('.qty-minus');

qtyPlusBtns.forEach(function(btn) {
  btn.addEventListener('click', function() {
    let qtyInput = this.parentNode.querySelector('.qty-input');
    let productCost = this.parentNode.nextElementSibling.querySelector('.product-cost');
    let cartItemID = this.dataset.cartItemId;
    
    let qty = parseInt(qtyInput.value);
    qty += 1;
    qtyInput.value = qty;
    
    let price = parseFloat(productCost.dataset.price);
    let total_price = price * qty;
    let formatted_price1 = number_format(total_price, 0, ',', ',') + '₫';
    
    productCost.querySelector('p').textContent = formatted_price1;
    
    // Gửi yêu cầu cập nhật giá trị số lượng xuống cơ sở dữ liệu
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_quantity.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        // Xử lý phản hồi từ máy chủ nếu cần thiết
      }
    };
    xhr.send('cartItemID=' + cartItemID + '&quantity=' + qty);
  });
});


qtyMinusBtns.forEach(function(btn) {
  btn.addEventListener('click', function() {
    let qtyInput = this.parentNode.querySelector('.qty-input');
    let qty = parseInt(qtyInput.value);
    qty = Math.max(qty - 1, 0);
    qtyInput.value = qty;
  });
});


</script>

<script>
    var checkboxes = document.querySelectorAll('.product-select input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            var cartItemID = this.dataset.cartItemId1;
            var selected = this.checked ? 1 : 0;

            // Gửi yêu cầu cập nhật dữ liệu qua Ajax
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_selected.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Xử lý kết quả trả về (nếu cần)
                }
            };
            xhr.send('cartItemID=' + cartItemID + '&selected=' + selected);
        });

        
    });
</script>
<script>
 function deleteCartItem(cartItemID) {
        // Gửi yêu cầu xóa dữ liệu thông qua Ajax
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete_cart_item.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Xử lý kết quả trả về nếu cần thiết
                // Ví dụ: Cập nhật giao diện sau khi xóa thành công
                // Ví dụ: Refresh lại trang để cập nhật dữ liệu mới
                location.reload(); // Refresh lại trang
            }
        };
        xhr.send("cartItemID=" + cartItemID);
    }

    // Gán sự kiện click vào các thẻ có thuộc tính "data-cart-item-id"
    var deleteIcons = document.querySelectorAll("[data-cart-item-id]");
    for (var i = 0; i < deleteIcons.length; i++) {
        deleteIcons[i].addEventListener("click", function() {
            var cartItemID = this.getAttribute("data-cart-item-id");
            deleteCartItem(cartItemID);
        });
    }

</script>

<script>
    var button = document.querySelector('.buyProductBtn');
button.addEventListener('click', function() {
    window.location.href = './checkout.php';
});

</script>



</html>