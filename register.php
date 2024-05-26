<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Kí - Pour Homme - Shoes & Leather</title>
    <link rel="shortcut icon" type="image/png" href="./Image/favicon.webp">
    
    <link rel="stylesheet" href="./CSS/account.css">
    <link rel="stylesheet" href="./Framework/bootstrap/css.css">
    <link rel="stylesheet" href="./Framework/bootstrap/js.js">
    <link rel="stylesheet" href="./Font/fontawesome-free-6.2.0-web/css/all.css">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,500;0,600;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
</head>
<body>
    <?php include 'header.php'; ?>
    
    <section id="breadcrump-wrapper">
        <div class="breadcrumb-overlay"></div>
        <div class="breadcrumb-content text-center">
            <h2>Tạo Tài Khoản</h2>
        </div>
    </section>

    <div id="pageContainer">
        <div class="main-container">
            <section class="page-wrapper">
                <div class="register-container">
                    <form action="" class="register-customer" method="post">
                        <h2 class="text-center customer-header">Tạo tài khoản</h2>
                        <div class="form-group register-name">
                            <div class="sur-Name">
                                <label for="SurName" class="form-label">Họ</label>
                                <input type="text" name="surName" class="form-control" placeholder="Nguyễn" required>
                            </div>
                            
                            <div class="first-Name">
                                <label for="firstName" class="form-label">Tên</label>
                                <input type="text" name="firstName" class="form-control" placeholder="A" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="text" class="form-label">Tên tài khoản</label>
                            <input type="text" id="phone" name="userName" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="form-label">Số điện thoại</label>
                            <input type="tel" id="phone" name="phoneNum" class="form-control" placeholder="0912345678" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="abc@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Mật Khẩu</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <!-- <div class="optional">
                            <p><a href="" class="customer_register_link">Đăng kí</a></p>
                            <p><a href="" class="customer_forget_password_link">Quên mật khẩu?</a></p>
                        </div> -->
                        <input class = "btn btn-dark w-100 submit__Btn" type="submit" value="Đăng kí">
                    </form>
                </div>
            </section>
        </div>
    </div>
    

    <?php include 'footer.php'; ?>

    <!-- <script>
        $(document).ready(function() {
            $("#register-customer").submit(function(e) {
                e.preventDefault();
                var firstName = $("#first-Name input").val();
                var surName = $("#surName").val();
                var email = $("#email").val();
                var phoneNum = $("#phoneNum").val();
                var userName = $("#userName").val();
                var password = $("#password").val();

                $.ajax({
                    url: "register.php",
                    type: "POST",
                    data: {
                        firstName: firstName,
                        surName: surName,
                        email: email,
                        phoneNum: phoneNum,
                        userName: userName,
                        password: password
                    },
                    success: function(response) {
                        $("#response").html(response);
                    }
                });
            });
        });
    </script> -->

    <?php
        include './ConnectDatabase/connectDatabase.php';

        try{
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $userName = $_POST['userName'];
                $email = $_POST['email'];
                $phoneNum = $_POST['phoneNum'];
                $password = $_POST['password'];
            
                $firstName = $_POST['firstName'];
                $lastName = $_POST['surName'];
                $name = $firstName .' '. $lastName;

                   // $customerInformation = "SELECT MAX(SUBSTR(customerID, 2)) as max_id FROM CUSTOMER WHERE customerID LIKE 'C1%';";
            // $stmt = $conn->query($customerInformation);
            // $max_id = $stmt->fetch(PDO::FETCH_ASSOC)['max_id'];

            // Kiểm tra tên đăng nhập đã tồn tại chưa
            $stmt = $conn->prepare("SELECT * FROM CUSTOMER WHERE userNameAccount = :userName");
            $stmt->bindParam(':userName', $userName);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $emailStmt = $conn->prepare("SELECT * FROM CUSTOMER WHERE customerEmail = :email");
            $emailStmt->bindParam(':email', $email);
            $emailStmt->execute();
            $result1 = $emailStmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($result) > 0) {
                echo "<script>alert('Tên đăng nhập đã tồn tại!');</script>";
            }else{
                if(count($result1) > 0){
                    echo "<script>alert('Email đã tồn tại!');</script>";
                }else{
                    $new_id = uniqid('C');
                    
                    $stmt = $conn->prepare("INSERT INTO CUSTOMER VALUES (:id,:name,:email,:userName,:password,:phoneNum,'','','','',0)");
                    $stmt->bindParam(':id', $new_id);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phoneNum', $phoneNum);
                    $stmt->bindParam(':password', $password);
                    $stmt->bindParam(':userName', $userName);
            
                    $stmt->execute();
                    
                    echo "<script>alert('Đăng ký thành công!');</script>";
                    echo "<script>window.location.href='login.php'; </script>";
                   
                }
                
            }

        }
            $conn = null;
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
    

            

         
    ?> 

</body>
</html>