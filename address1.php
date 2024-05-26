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
    <link rel="stylesheet" href="./CSS/accountEdit.css">

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
    <?php include './ConnectDatabase/connectDatabase.php' ?>

    <?php
    $customerID = $_SESSION['customerID'];

    $address = "";
    $district = "";
    $city = "";
    $addressLine = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $address = $_POST['address'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $addressLine = $address . $district ;

        try {
            $sql = "UPDATE CUSTOMER SET city = :city, addressLine1 = :address WHERE customerID = '$customerID'";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':city',  $city);
            $stmt->bindParam(':address', $addressLine);
            $stmt->execute();

            $rowsAffected = $stmt->rowCount();
            if ($rowsAffected > 0) {
                echo '<script>alert("Lưu thay đổi thành công");</script>';
            } else {
                echo '<script>alert("Lưu thay đổi thất bại");</script>';
            }
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }
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
                    <div class="address_content">
                        <div class="header_title">
                            <h3 class="text-center">Tạo địa chỉ mới</h3>
                        </div>
                        <div class="address-container">
                        <form class="" method="post">
                                <!-- <div class="form-control flex_field">
                                <label for="">Họ và tên: </label>
                                <div class="text_field">
                                    <input type="text" class="name_field" name="" id="" placeholder="Nhập họ và tên">
                                </div>
                            </div>
                            <div class="form-control flex_field">
                                <label for="">Số điện thoại: </label>
                                <div class="text_field">
                                    <input type="text" class="name_field" name="" id="" placeholder="Nhâp số điện thoại">
                                </div>
                            </div> -->
                                <div class="form-control flex_field">
                                    <label for="">Tỉnh/Thành phố: </label>
                                    <div class="text_field">
                                        <input type="text" class="city_field" name="city" id="" placeholder="Nhập tỉnh/thành phố">
                                    </div>
                                </div>
                                <div class="form-control flex_field">
                                    <label for="">Quận/Huyện: </label>
                                    <div class="text_field">
                                        <input type="text" class="district_field" name="district" id="" placeholder="Nhập quận/huyện">
                                    </div>
                                </div>
                                <div class="form-control flex_field">
                                    <label for="">Địa chỉ: </label>
                                    <div class="text_field">
                                        <input type="text" class="address_field" name="address" id="" placeholder="Nhập địa chỉ">
                                    </div>
                                </div>
                                <div class="form-control flex_field justify-content-center">
                                    <button type="submit">Lưu thay đổi</button>
                                </div>
                            </form>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>

</html>