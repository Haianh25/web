<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản - Pour Homme - Shoes & Leather</title>
    <link rel="shortcut icon" type="image/png" href="./Image/favicon.webp">
    <link rel="stylesheet" href="./CSS/account.css">
    <link rel="stylesheet" href="./Framework/bootstrap-4.0.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./Framework/bootstrap/css.css">
    <link rel="stylesheet" href="./Framework/bootstrap/js.js">
    <link rel="stylesheet" href="./Font/fontawesome-free-6.2.0-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,500;0,600;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>

    <section id="breadcrump-wrapper">
        <div class="breadcrumb-overlay"></div>
        <div class="breadcrumb-content text-center">
            <h2>Tài Khoản</h2>
        </div>
    </section>

    <div id="pageContainer">
        <div class="main-container">
            <section class="page-wrapper">
                <div class="login-container">
                    <form action="" class="login-customer" method="post">
                        <h2 class="text-center customer-header">Đăng nhập</h2>
                        <div class="form-group">
                            <label for="email" class="form-label">Địa chỉ Email</label>
                            <input name="email" type="email" id="email" class="form-control" placeholder="abc@email.com" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Mật Khẩu</label>
                            <input name="password" type="password" id="password" class="form-control" required>
                        </div>
                        <div class="optional">
                            <p><a href="./register.php" class="customer_register_link">Đăng kí</a></p>
                            <p><a href="./forgetPassword.php" class="customer_forget_password_link">Quên mật khẩu?</a></p>
                        </div>
                        <input class="btn btn-dark w-100" type="submit" value="Đăng Nhập">

                    </form>
                </div>
            </section>
        </div>
    </div>
    <?php
    // require_once('./admin/connectPHP.php');
    include './ConnectDatabase/connectDatabase.php';

    $email = '';
    $password = '';
    $userName = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];


   

                try {
               
                    
                    $stmt = $conn->prepare("SELECT customerStatus,customerID, customerEmail, userPasswordAccount, customerName FROM CUSTOMER WHERE customerEmail= :email ");
                    $stmt->execute(array(':email' => $email));
                    $user = $stmt->fetch();
                    

                    if ($user && $password === $user['userPasswordAccount'] && isset($user['userPasswordAccount'])) {
                        // Đăng nhập thành công
                        if($user['customerStatus'] == 1){
                            echo "<script>alert('Tài khoản bạn đã bị khóa!');</script>";
                        }else{
                            session_start();
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['customerName'] = $user['customerName'];
                            $_SESSION['customerEmail'] = $user['customerEmail'];
                            $_SESSION['customerID'] = $user['customerID'];
                            var_dump($_SESSION);
                            echo "<script>alert('Đăng nhập thành công!');</script>";
                            $result = true;
                            echo "<script>window.location.href='./index.php';</script>";
                        }
                       
                        
                    } else {

                        // Sai tên đăng nhập hoặc mật khẩu
                        echo "<script>alert('Đăng nhập thất bại');</script>";
                    }
                } catch (PDOException $e) {
                    echo 'Connection failed: ' . $e->getMessage();
                    return false;
                }
            
            }
            


    ?>

    <?php include 'footer.php'; ?>

</body>

</html>