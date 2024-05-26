<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pour Homme - Shoes & Leather - Thanh toán đơn hàng</title>
    <link rel="shortcut icon" type="image/png" href="./Image/favicon.webp">

    <!-- ICON -->
    <link rel="stylesheet" href="./Font/fontawesome-free-6.2.0-web/css/all.css">


    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/collections.css">

    <!-- Framework -->
    <script src="./Framework/aos-master/src/js/aos.js"></script>
    <link rel="stylesheet" href="./Framework/bootstrap/css.css">
    <script src="./Framework/bootstrap/js.js"></script>
    <script src="./Framework/jquery/jquery.js"></script>
    <!-- <script src="./Framework/jquery/jquery.mask.js"></script> -->
    <script src="./Framework/jquery/jquery.maskedinput.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <section class="page-wrapper">
        <div class="container-checkout-payment">
            <form action="#" method="post">
                <div class="container form-checkout">
                    <!-- <div class="address-receive">
                        <div class="address-header">
                            <i class="fa-solid fa-location-dot" style="margin-right: 9px;"></i>Địa chỉ nhân hàng
                        </div>
                        <div class="address__customer row">
                            <div class="address__link col-8">

                            </div>
                            <div class="address-edit col-4">Thay đổi</div>
                        </div>
                    </div> -->


                    <div class="product-checkout ">
                        <div class="product-header row">
                            <div class="text-start col-5">Sản phẩm</div>
                            <div class="text-center col-2">Đơn giá</div>
                            <div class="text-center col-2">Số lượng</div>
                            <div class="text-end col-2">Thành tiền</div>
                        </div>

                        <?php
                        include './ConnectDatabase/connectDatabase.php';
                        $stmt = $conn->prepare("
                                SELECT DISTINCT ci.cartItemID, p.productName, ci.quantity, p.buyPrice, p.productName, pi.productImageURL, pi.isMainImage, p.productID
                                FROM CART_ITEMS ci
                                JOIN PRODUCT p ON ci.productID = p.productID
                                JOIN PRODUCT_IMAGE pi ON p.productID = pi.productID
                                WHERE ci.cartID IN (SELECT cartID FROM CART WHERE customerID = :customerID AND isMainImage = 1 AND selected = 1)

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


                        $newOrderID = uniqid('O');
                        $orderDate = date('Y-m-d');
                        $shippedDate = date('2023-05-23');
                        if ($shippedDate !== '') {
                            $status = "Chưa giao hàng";
                        } else {
                            $status = "Đã giao hàng";
                        }
                        $stmt_insert = $conn->prepare("INSERT INTO ORDERS VALUES (:newOrderID, :orderDate, :shippedDate, :status, '',  :customerID, '')");
                        $stmt_insert->bindParam(':newOrderID', $newOrderID);
                        $stmt_insert->bindParam(':orderDate', $orderDate);
                        $stmt_insert->bindParam(':shippedDate', $shippedDate);
                        $stmt_insert->bindParam(':status', $status);
                        $stmt_insert->bindParam(':customerID', $_SESSION['customerID']);
                        $stmt_insert->execute();







                        $countItemCard = 0;
                        $sum = 0;
                        $orderLineNumber = 0;
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            $cartItemID = $row['cartItemID'];
                            $productName = $row['productName'];
                            $quantity = $row['quantity'];
                            $price = $row['buyPrice'];
                            $total_price = $price * $quantity;
                            $formatted_price = number_format($price, 0, ',', ',') . '₫';
                            $formatted_price1 = number_format($total_price, 0, ',', ',') . '₫';




                            $image = $row['productImageURL'] . '.webp';
                            $countItemCard++;
                            $sum += $total_price;

                            $newOrderDetailID = uniqid('OD');
                            $productID = $row['productID'];
                            $orderLineNumber++;

                            $stmt_insert_OD = $conn->prepare("INSERT INTO ORDER_DETAIL VALUES (:newOrderDetailID, :newOrderID, :productID, :quantity, :price, :orderLineNumber)");
                            $stmt_insert_OD->bindParam(':newOrderDetailID', $newOrderDetailID);
                            $stmt_insert_OD->bindParam(':newOrderID', $newOrderID);
                            $stmt_insert_OD->bindParam(':productID', $productID);
                            $stmt_insert_OD->bindParam(':quantity', $quantity);
                            $stmt_insert_OD->bindParam(':price', $price);
                            $stmt_insert_OD->bindParam(':orderLineNumber', $orderLineNumber);
                            $stmt_insert_OD->execute();

                            echo '
                                   <div class="product-contain row align-items-center">
                                   
                                   <div class="product-name text-center col-5">
                                       <span>
                                           <p><img src="' . $image . '" alt="Johny Classique Chelsea" style="width: 15%; margin-right: 9px">' . $productName . '</p>
                                           
                                       </span>
                                   </div>
                                   <div class="product-price text-center col-2">
                                       <span>
                                           <p>' . $formatted_price . '</p>
                                       </span>
                                   </div>
                                   <div class="product-quality text-center col-2" style="display: flex; justify-content: center;">
                                       ' . $quantity . '
                                   </div>
       
                                   <div class="product-cost text-end col-2">
                                       <span>
                                           <p>' . $formatted_price1 . '</p>
                                       </span>
                                   </div>
                                   
                               </div>
                                   ';
                        }
                        ?>


                    </div>

                    <div class="checkout-method">
                        <div class="checkout-header">
                            <div class="checkout-setting">Phương thức thanh toán: </div>
                            <div class="checkout-setting-tab">
                                <!-- <span><button type="button" class="card-payment-btn product-variation" name="card_payment" required>Thẻ tín dụng/Ghi nợ</button></span>
                                <span><button type="button" class="COD-payment-btn product-variation" name="cod_payment" required>Thanh toán khi nhận hàng</button></span> -->
                                <span class="label cod__listener">
                                    <div class="style-label selectedCODPayement">
                                        <input type="radio" name="payment-method" value="cod" class="radioCOD">
                                        <div class="cod-method">
                                            <img class="method-icon" src="./Image/Option_Payment/COD_Payment.png" alt="" width="32" height="32">
                                            <div class="method-content">
                                                <span>Thanh toán khi nhận hàng</span>
                                            </div>
                                        </div>
                                    </div>
                                </span>

                                <span class="label card__listener">
                                    <div class="style-label selectedCardPayment">
                                        <input type="radio" name="payment-method" value="card" class="radioCard">
                                        <div class="cod-method">
                                            <img class="method-icon" src="./Image/Option_Payment/Card_Payment.png" alt="" width="32" height="32">
                                            <div class="method-content d-flex flex-column">
                                                <span>Thanh toán bằng thẻ quốc tế</span>
                                                <div class="card-img">
                                                    <img src="./Image/Option_Payment/example_card_payment.png" alt="" width="auto" height="24">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <div class="card-content">
                                <div class="card-info">
                                    <div class="title">
                                        <h2>Điền thông tin thẻ tín dụng/Ghi nợ</h2>
                                    </div>
                                    <div class="card-list">
                                        <img src="./Image/Option_Payment/example_card_payment.png" alt="" width="auto" height="32">
                                    </div>
                                    <div class="write-card-form">
                                        <div class="left">
                                            <div class="card-number">
                                                <div class="card_field">
                                                    <div class="label">Số thẻ</div>
                                                    <input type="text" class="card-number-input card-input" name="number" data-mask="9999-9999-9999-9999" placeholder="VD: 4123 4567 8901 2345">
                                                </div>
                                                <div class="card_field">
                                                    <div class="label">Tên in trên thẻ</div>
                                                    <input type="text" class="card-name-input card-input" name="name" placeholder="VD: NGUYEN VAN A" >
                                                </div>
                                                <div class="card_field">
                                                    <div class="label">Ngày hết hạn</div>
                                                    <input type="text" name="expiry" class="card-expiry_date-input card-input" pattern="(0[1-9]|1[0-2])/[0-9]{2}" data-mask="00/00" placeholder="MM/YY">
                                                </div>
                                                <div class="card_field">
                                                    <div class="label">Mã bảo mật</div>
                                                    <input type="text" name="cvc" class="card-cvc-input card-input" data-mask="000" placeholder="VD: 123">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="checkout-payment-body">
                            <div class="card__payment-selected">

                            </div>
                        </div>
                    </div>

                    <div class="checkout-payment-cost">
                        
                        <div class="cost-container">
                            <div class="cost-col1">
                                <div class="product-cost">Tổng tiền hàng: </div>
                                <div class="shipping-cost">Phí vận chuyển: </div>
                                <div class="total-cost">Tổng thanh toán: </div>
                            </div>
                            <div class="cost-col2">
                                <div class="product-cost-num"><?php echo  number_format($sum, 0, ',', ',') . '₫'; ?></div>
                                <div class="shipping-cost-num">30,000đ</div>
                                <div class="total-cost-num"><?php echo number_format($sum + 30000, 0, ',', ',') . '₫'; ?></div>
                            </div>
                        </div>

                        <div class="checkout-btn">
                            <a href="./deleteCart.php?cartItem=<?php echo $cartItemID; ?>" class="buy_btn">
                                Đặt hàng
                            </a>

                        </div>

                        <?php
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $checkNum = uniqid('PAY');
                            $paymentDate = date('Y-m-d');;
                            $amount = $sum + 30000;

                            $stmt_insert_Payment = $conn->prepare("INSERT INTO PAYMENT VALUES(:customerID, :checkNum, :paymentDate, :amount)");
                            $stmt_insert_Payment->bindParam(':customerID',  $_SESSION['customerID']);
                            $stmt_insert_Payment->bindParam(':checkNum', $checkNum);
                            $stmt_insert_Payment->bindParam(':paymentDate', $paymentDate);
                            $stmt_insert_Payment->bindParam(':amount', $amount);
                            $stmt_insert_Payment->execute();
                        }
                        ?>

                    </div>
                </div>
            </form>
        </div>
    </section>

    <div id="popup_content">
        <aside class="popup_container" data-aos="fade-up">
            <div class="address__popup">
                <div class="address__popup-container d-flex flex-collumn">
                    <div class="address__popup-content">
                        <div class="address__popup-header">
                            <p>Địa Chỉ Của Tôi</p>
                        </div>
                        <div class="address__popup-body">

                        </div>
                        <div class="address__popup-footer">
                            <button class="address_btn cancel_btn">Huỷ</button>
                            <button class="address_btn submit_btn">Xác nhận</button>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>


    <script>
        $(document).ready(function() {
            $('.card-number-input').mask('9999-9999-9999-9999');
            $('.card-expiry_date-input').mask('99/99');
            $('.card-cvc-input').mask('999');
        });
    </script>
    

    <?php include 'footer.php'; ?>
    <script>
        AOS.init();
    </script>
    <script src="./Javascript/collections.js"></script>
    <script src="./Javascript/checkout-payment.js"></script>

    

</body>

</html>