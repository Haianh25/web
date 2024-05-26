<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Web-index/font/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../CSS/editproduct.css">
  <link rel="stylesheet" href="../CSS/sidebar.css">
    <link rel="stylesheet" href="../CSS/base.css">
    <link rel="stylesheet" href="../Font/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../Framework/bootstrap/bootstrap-4.0.0-dist/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/png" href="../Image/favicon.webp">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <title>Admin Dashboard</title>
</head>
<body>

    <nav class="sidebar">
        <div class="logo">
            <a href="">
                <img src="../Image/logo.webp" class="img-logo" style="width: 100%;" alt="">
            </a>
        </div>
        <ul class="sidebar_list">
            <li class="sidebar_list-item active_list" onclick="clickList(0)">
                <a href="admin.php?page=0" class="item">
                  <i class="fa-solid fa-house"></i>
                    <span> Quản lý hóa đơn</span>
                </a>
            </li>
            <li class="sidebar_list-item" onclick="clickList(1)">
                <a href="admin.php?page=1" class="item">
                  <i class="fa-solid fa-users"></i>
                    <span>Quản lý khách hàng</span>
                </a>
            </li>
            <li class="sidebar_list-item " onclick="clickList(2)">
                <a href="admin.php?page=2" class="item">
                  <i class="fa-brands fa-product-hunt"></i>
                    <span>Danh sách sản phẩm</span>
                </a>
            </li>
           
        </ul>
    </nav>
    <section class="main-content">  
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header_iner">
                        
                        <div class="admin_avatar">
                            <div class="admin_user">
                                <span >
                                    <i class="fa-solid fa-bell" style="font-size: 25px;"></i>
                                </span>
                                <span >
                                    <i class="fa-solid fa-comment-medical" style="font-size: 25px;"></i>
                                 </span>
                                <div class="avatar">
                                    <img src="../Image/t-shirt.webp" alt="">
                                    <div class="menu_admin">
                                        <div class="menu_content">
                                            <p class="text-1">Welcome Admin!</p>
                                            <p class="text-2">Hải Anh</p>
                                           <div class="profile_details">
                                               <a href="./login.php" class="text-5">Log out <span></span></a>
                                           </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content_iner">

       
            <?php 
            if(isset($_GET['page'])==0)
            include 'order.php';
            else if($_GET['page'] == 0){
                
                include 'order.php';
            }else if ($_GET['page'] == 1){
                include 'customer.php';
            }else if ($_GET['page'] == 2){
                include 'product.php';
            }
            else if ($_GET['page'] == "edit"){
                $productID = $_GET['productID'];
                include 'editproduct.php' ;
            }
            else if ($_GET['page'] == "add"){
                include 'addproduct.php' ;
            }
            
            ?>
    </section>
    <script>
        
  
        var list = document.querySelectorAll('.sidebar_list-item');
        function clickList(index){
            console.log(index)
            list.forEach((e,key)=>{
            e.classList.remove('active_list');
            if(key==index)
            e.classList.add('active_list')
        })
        }
    </script>

    <?php
    if (isset($_GET['page']))
    echo '<script>clickList('.$_GET['page'].')</script>';
    else echo '<script>clickList(0)</script>';
    ?>
</body>

</html>

