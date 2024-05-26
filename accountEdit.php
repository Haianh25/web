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

    <?php
    require_once('./ConnectDatabase/connectDatabase.php');
        $customerID = $_SESSION['customerID'];

        $customerName = "";
        $customerNickName = "";
        $customerEmail = "";
        $customerCountry = "";
        $customerPhone = "";
        $customerAddress = "";


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = $_POST['fullname'];
            $nickname = $_POST['nickname'];
            $country = $_POST['country'];

            try {
                $sql = "UPDATE CUSTOMER SET customerName = :name, userNameAccount = :nickname , country = :country WHERE customerID = '$customerID'";
                
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':nickname', $nickname);
                $stmt->bindParam(':country', $country);
                $stmt->execute();

                $rowsAffected = $stmt->rowCount();
                if ($rowsAffected > 0) {
                    echo '<script>alert("Lưu thay đổi thành công");</script>';
                } else {
                    echo '<script>alert("Cập nhật dữ liệu thất bại");</script>';
                }

            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
                return false;
            }
            
        }

        $sql = "SELECT * FROM CUSTOMER WHERE customerID = '$customerID' ";
        $stmt = $conn->query($sql);

        while ($row = $stmt->fetch()){
            $customerName = $row['customerName'];
            $customerNickName = $row['userNameAccount'];
            $customerEmail = $row['customerEmail'];
            $customerCountry = $row['country'];
            $customerPhone = $row['phoneNumber'];
            $customerAddress = $row['addressLine1'] . $row['city'] . $row['country'];
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
                    <div class="info_detail">
                        <div class="info-left col-6">
                            <h3 class="info_title text-center">Thông tin tài khoản</h3>
                            <form action="" class="info_content" method="post">
                                <div class="form-info">
                                    <div class="form-name">
                                        <div class="form-control">
                                            <label class="nameInput" for="">Họ & Tên: </label>
                                            <?php 
                                                echo '<input class="input_field" type="text" name="fullname" placeholder="Thêm họ tên" value="'.$customerName.'">';
                                            ?>
                                        </div>
                                        <div class="form-control">
                                            <label class="nicknameInput" for="">Biệt danh: </label>
                                            <?php
                                                echo '<input class="input_field" type="text" name="nickname" placeholder="Thêm biệt danh" value="'.$customerNickName.'">';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="form-control d-flex">
                                        <label class="dateInput" for="">Ngày sinh: </label>
                                        <div class="date_selection">
                                            <select name="day">
                                                <option value="">Ngày</option>
                                                <?php
                                                    $month = 4; // Tháng cần tạo danh sách
                                                    for ($i = 1; $i <= 31; $i++) {
                                                    if (($month == 4 || $month == 6 || $month == 9 || $month == 11) && $i == 31) {
                                                        // Không có 31 ngày trong các tháng 4, 6, 9 và 11
                                                    } else if ($month == 2 && $i > 29) {
                                                        // Tháng 2 có tối đa 29 ngày trong năm nhuận
                                                    } else if ($month == 2 && $i == 29 && !isLeapYear()) {
                                                        // Tháng 2 không có 29 ngày trong năm không nhuận
                                                    } else {
                                                        echo "<option value='$i'>$i</option>";
                                                    }
                                                    }

                                                    // Kiểm tra năm nhuận
                                                    function isLeapYear() {
                                                    $year = $_POST['year'];
                                                    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
                                                    }
                                                ?>
                                            </select>
                                            <select name="month">
                                                <option value="">Tháng</option>
                                                <?php
                                                    for ($i = 1; $i <= 12; $i++) {
                                                    echo "<option value='$i'>$i</option>";
                                                    }
                                                ?>
                                            </select>
                                            <select name="year">
                                                <option value="">Năm</option>
                                                <?php
                                                    $currentYear = date('Y');
                                                    for ($i = $currentYear; $i >= 1900; $i--) {
                                                    echo "<option value='$i'>$i</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-control">
                                        <label class="genderInput" for="">Giới tính: </label>
                                        <label for="">
                                            <label for="" class="radio_style">
                                                <label for="">
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span class="radio-fake"></span>
                                                    <span class="label">Nam</span>
                                                </label>
                                            </label>
                                            <label for="" class="radio_style">
                                                <label for="">
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span class="radio-fake"></span>
                                                    <span class="label">Nữ</span>
                                                </label>
                                            </label>
                                            <label for="" class="radio_style">
                                                <label for="">
                                                    <input type="radio" name="gender" value="male" checked>
                                                    <span class="radio-fake"></span>
                                                    <span class="label">Khác</span>
                                                </label>
                                            </label>
                                        </label>
                                    </div> -->
                                    <div class="form-control">
                                        <label class="countryInput" for="">Quốc gia: </label>
                                        <?php
                                            echo '<input class="input_field" type="text" name="country" placeholder="Thêm quốc gia" value="'.$customerCountry.'">'
                                        ?>
                                    </div>
                                   
                                    <div class="form-control">
                                        <label class="input-label">&nbsp;</label>
                                        <button type="submit" class="input-btn">Lưu thay đổi</button>
                                    </div>
                            </form>

                            <?php
                                
                            ?>
                            
                        </div>
                        <div class="info-vertical"></div>
                        <div class="info-right col-6">
                            <div class="info_title">Số điện thoại và Email</div>
                            <div class="Phone&Email-title">
                                <div class="list-item">
                                    <div class="info">
                                        <img class="icon" src="./Image/icon/phone.png" alt="">
                                        <div class="info-container">
                                            <span>Số điện thoại</span>
                                            <span>
                                                <?php
                                                    echo $customerPhone;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- <div class="status">
                                        <a href="./phoneChange.php"><button class="button">Cập nhật</button></a>
                                    </div> -->
                                </div>
                                <div class="list-item">
                                    <div class="info">
                                        <img class="icon" src="./Image/icon/email.png" alt="">
                                        <div class="info-container">
                                            <span>Địa chỉ Email</span>
                                            <span>
                                                <?php
                                                    echo $customerEmail;
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- <div class="status">
                                        <a href="./emailChange.php"><button class="button">Cập nhật</button></a>
                                    </div> -->
                                </div>
                            </div>
                            <div class="info_title">Bảo mật</div>
                            <div class="security-title">
                                <div class="list-item">
                                    <div class="info">
                                        <img class="icon" src="./Image/icon/lock.png" alt="">
                                        <div class="info-container">
                                            <span>Mật khẩu</span>
                                            <span>

                                            </span>
                                        </div>
                                    </div>
                                    <!-- <div class="status">
                                        <a href="./passwordChange.php"><button class="button">Cập nhật</button></a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>
</body>
</html>