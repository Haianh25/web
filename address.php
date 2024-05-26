<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>Pour Homme - Shoes & Leather | Thông tin tài khoản khách hàng</title>
    <link rel="shortcut icon" type="image/png" href="./Image/favicon.webp">


    <!-- ICON -->
    <link rel="stylesheet" href="./Font/fontawesome-free-6.2.0-web/css/all.css">


    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/historyOrder.css">

    <!-- Framework -->
    <script src="./Framework/aos-master/src/js/aos.js"></script>
    <link rel="stylesheet" href="./Framework/bootstrap/css.css">
    <script src="./Framework/bootstrap/js.js"></script>
    <script src="./Framework/jquery/jquery.js"></script>
    <!-- <script src="./Framework/jquery/jquery.mask.js"></script> -->
    <script src="./Framework/jquery/jquery.maskedinput.js"></script>
</head>

<body>
    <?php include './ConnectDatabase/connectDatabase.php' ?>
    <?php include 'header.php'; ?>

    <?php
    $customerID = $_SESSION['customerID'];

    $customerName = "";
    $customerPhone = "";
    $customerAddress1 = "";
    $customerAddress2 = "";
    ?>

    <section class="user_container">
        <div class="user_content container">
            <div class="table_user row">
                <div class="user_sidebar col-3">
                    <div class="detail_sidebar">
                        <ul class="style_sidebar">
                            <li>
                                <a href="./accountEdit.php" class="text_href">
                                    <i class="fa-solid fa-user icon"></i>
                                    <span class="text_style">Thông tin tài khoản</span>
                                </a>
                            </li>
                            <li>
                                <a href="./historyOrder.php" class="text_href">
                                    <i class="fa-solid fa-receipt icon"></i>
                                    <span class="text_style">Lịch sử đơn hàng</span>
                                </a>
                            </li>
                            <li>
                                <a href="./address.php" class="text_href">
                                    <i class="fa-solid fa-location-dot icon"></i>
                                    <span class="text_style">Số địa chỉ</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="user_detail col-9">
                    <div class="header_title">
                        <h3 class="text-center">Số địa chỉ</h3>
                    </div>
                    <div class="address-container">
                        <?php
                        $sql = "SELECT * FROM CUSTOMER WHERE customerID = '$customerID'";
                        $stmt = $conn->query($sql);

                        while ($row = $stmt->fetch()) {
                            if ($row['addressLine1'] == '') {
                                echo "<div class='address_add-new'>";
                                echo    "<a href='./addressEdit.php' class='new-btn'>";
                                echo         "<i class='fa-solid fa-plus'></i>";
                                echo         "<span>Thêm địa chỉ mới</span>";
                                echo     "</a>";
                                echo "</div>";
                            } elseif ($row['addressLine2'] == '') {
                                echo "<div class='address_add-new'>";
                                echo    "<a href='./address2.php' class='new-btn'>";
                                echo         "<i class='fa-solid fa-plus'></i>";
                                echo         "<span>Thêm địa chỉ phụ</span>";
                                echo     "</a>";
                                echo "</div>";
                            } else {
                                echo '';
                            }
                        }

                        ?>
                        <!-- <div class="address_content"> -->
                            <?php
                            $sql = "SELECT * FROM CUSTOMER WHERE customerID = '$customerID' ";
                            $stmt = $conn->query($sql);

                            while ($row = $stmt->fetch()) {
                                $customerName = $row['customerName'];
                                $customerPhone = $row['phoneNumber'];
                                $customerAddress1 = $row['addressLine1'];
                                $customerAddress2 = $row['addressLine2'];

                                if($row['addressLine1'] == ''){
                                    echo '';
                                } elseif ($row['addressLine2'] == '') {
                                    echo "<div class='content'";
                                    echo "<div class='item_addres'>";
                                    echo "<div class='item_left'>";
                                    echo    "<div class='name'>";
                                    echo        $customerName;
                                    echo    "</div>";
                                    echo    "<div class='address'>";
                                    echo        "<span>Địa chỉ: </span>" . $customerAddress1 ;
                                    echo    "</div>";
                                    echo    "<div class='phoneNumber'>";
                                    echo        "<span>Điện thoại: </span>" . $customerPhone;
                                    echo    "</div>";
                                    echo "</div>";
                                    echo "<div class='item_right'>";
                                    echo "<a class='edit' href='./address1.php'>";
                                        echo "Chỉnh sửa";
                                        echo "<i class='fa-solid fa-pen-to-square'></i>";
                                    echo "</a>";
                                echo "</div>";
                                echo "</div>";
                                
                                echo "</div>";
                                } else {
                                    echo "<div class='content'";
                                    echo "<div class='item_addres'>";
                                    echo "<div class='item_left'>";
                                    echo    "<div class='name'>";
                                    echo        $customerName;
                                    echo    "</div>";
                                    echo    "<div class='address'>";
                                    echo        "<span>Địa chỉ: </span>" . $customerAddress1 ;
                                    echo    "</div>";
                                    echo    "<div class='phoneNumber'>";
                                    echo        "<span>Điện thoại: </span>" . $customerPhone;
                                    echo    "</div>";
                                    echo "</div>";
                                    echo "<div class='item_right'>";
                                    echo "<a class='edit' href='./address1.php'>";
                                        echo "Chỉnh sửa";
                                        echo "<i class='fa-solid fa-pen-to-square'></i>";
                                    echo "</a>";
                                echo "</div>";
                                echo "</div>";
                                
                                echo "</div>";

                                    echo "<div class='content'";
                                    echo "<div class='item_addres'>";
                                    echo "<div class='item_left'>";
                                    echo    "<div class='name'>";
                                    echo        $customerName;
                                    echo    "</div>";
                                    echo    "<div class='address'>";
                                    echo        "<span>Địa chỉ: </span>" . $customerAddress2 ;
                                    echo    "</div>";
                                    echo    "<div class='phoneNumber'>";
                                    echo        "<span>Điện thoại: </span>" . $customerPhone;
                                    echo    "</div>";
                                    echo "</div>";
                                    echo "<div class='item_right'>";
                                    echo "<a class='edit' href='./address2.php'>";
                                        echo "Chỉnh sửa";
                                        echo "<i class='fa-solid fa-pen-to-square'></i>";
                                    echo "</a>";
                                echo "</div>";
                                echo "</div>";
                                }

                                
                            }
                            ?>
                        <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>