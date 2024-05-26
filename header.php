<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS/header.css">
    <link rel="stylesheet" href="./Font/fontawesome-free-6.2.0-web/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,500;0,600;0,700;0,800;1,400;1,500&display=swap" rel="stylesheet">

</head>
<body>
    <?php session_start();?>
    <div id="header" style="z-index: 99;">
        <div class="header-top container-fluid px-0">
            <!-- <div class="row"> -->
                <div class="header-top-navbar">
                    <div class="header-top-navbar-img">
                        <a href="./index.php">
                            <img src="./Image/logo.webp" alt="Logo" class="small-image">
                        </a>
                    </div>
                    <div class="header-top-navbar-ul">
                        <ul class="header-top-navbar-right-list">
                            <li class="header-top-navbar-item" id="search-modal">
                                <div class="input-group">
                                    <form action="./product.php" method="GET" class="search-bar">
                                        <input name="search_bar" type="text" value="" placeholder="Tìm kiếm" id="search-input-form" class="input-group-field" required>
                                        <input type="hidden" name="contact[tags]" value="newsletter" required>
                                        <span class="input-group-btn">
                                            <button class="btn-more-white" type="submit">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </button>
                                        </span>
                                    </form>
                                </div>
                            </li>
                            <li onclick="openCloseSearch()" class="header-top-navbar-item">
                                <a href="#" class="header-top-navbar-link  hover-underline-text" id="search-btn">Tìm kiếm
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </a>
                                
                                
                            </li>
                            <li class="header-top-navbar-item">
                                <a href="" class="header-top-navbar-link hover-underline-text">Liên hệ</a>
                            </li>
                            <?php
                                
                                $userName = '';

                                if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true){
                                    $userName = htmlspecialchars($_SESSION['customerName']);
                                    // var_dump($_SESSION);
                                    echo "<li class='header-top-navbar-item'>
                                            <a href='' class='header-top-navbar-link'>
                                                <i class='fa-solid fa-user' style='padding-right: 8px;'></i>" .$userName. "</a>
                                                <ul class='subnav-dropdown-menu'>
                                                    <li class='subnav-item'>
                                                        <a href='./accountEdit.php' class='subnav-item-link'>Hồ sơ người dùng</a>
                                                    </li>
                                                    <li class='subnav-item'>
                                                        <a href='./logOut.php' class='subnav-item-link'>Đăng xuất</a>
                                                    </li>
                                                </ul>
                                            </li>";
                                    
                                }else{
                                    echo "<li class='header-top-navbar-item'>
                                            <a href='./login.php' class='header-top-navbar-link'>
                                                <i class='fa-solid fa-user'></i>
                                            </a>
                                         </li>";
                                }
                            ?>
                            
                            <li class="header-top-navbar-item">
                                <a href="./ShoppingCart.php" class="header-top-navbar-link">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    (
                                        <?php
                                        if (isset($_SESSION['cartItemCount'])) {
                                            echo $_SESSION['cartItemCount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    )
                                </a>
                            </li>
                        </ul>
                    </div>
                   
                </div>
                
            <!-- </div> -->
        
        </div>
        <div class="header-under-navbar">
            <ul class="header-under-navbar-list">
                <li class="header-under-navbar-item">
                    <a href="./index.php" class="header-under-navbar-link hover-underline-text">Trang chủ</a>
                </li>
                <li class="header-under-navbar-item" style="z-index: 99">
                    <a href="./product.php" class="header-under-navbar-link hover-underline-text">Sản phẩm 
                        <i class="fa-solid fa-angle-down"></i>
                    </a>
                    <ul class="subnav-dropdown-menu">
                        <li class="subnav-item">
                            <a href="product.php?productLineID=PL1" class="subnav-item-link">Dress boots
                               
                            </a>
                            
                        </li>
                        <li class="subnav-item">
                            <a href="./product.php?productLineID=PL2" class="subnav-item-link">Mosscasins</a>
                        </li>
                        <li class="subnav-item">
                            <a href="./product.php?productLineID=PL3" class="subnav-item-link">Flip-flop</a>
                        </li>
                        <li class="subnav-item">
                            <a href="./product.php?productLineID=PL4" class="subnav-item-link">Belt</a>
                        </li>
                        <li class="subnav-item">
                            <a href="./product.php?productLineID=PL5" class="subnav-item-link">Wallet</a>
                        </li>
                    </ul>
                </li>
                
                <li class="header-under-navbar-item">
                    <a href="./FAQs.php" class="header-under-navbar-link hover-underline-text">FAQS (Hỏi đáp)</a>
                </li>
                <li class="header-under-navbar-item">
                    <a href="./aboutUs.php" class="header-under-navbar-link hover-underline-text">Giới thiệu</a>
                </li>
            </ul>
        </div>
    </div>
    
</body>
<script src="./Javascript/indexJS.js"></script>

</html>
