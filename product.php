<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Pour Homme - Shoes & Leather</title>
        <link rel="shortcut icon" type="image/png" href="./Image/favicon.webp">

    <!-- ICON -->
    <link rel="stylesheet" href="./Font/fontawesome-free-6.2.0-web/css/all.css">
    

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/collections.css">


    <!-- BOOSTRAP -->
    <link rel="stylesheet" href="./Framework/bootstrap/css.css">

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
    
    <body>
    <?php 
    // session_start(); 
     $sortValue = isset($_GET['sortBy']) ? $_GET['sortBy'] : '';
    ?>
   
        <div id="product-list">
        <?php include 'header.php'; ?>
       
        <section id="breadcrump-wrapper">
            <div class="breadcrumb-overlay"></div>
            <div class="breadcrumb-content text-center">
                <h2>Product (Sản Phẩm)</h2>
            </div>
            
        </section>
        <div class="collections-container container">
            <div class="collections-header row text-center">
                
                <div class="collections-title col">
                    <h2>Sản phẩm</h2>
                </div>
                

            </div>
            <div class="collections-col row">
                <div class="filter-col col-2 border rounded">
                    <div class="collections-filter mb-4">
                        <span class="filter"><b>Bộ lọc</b></span>
                    </div>
                    <div class="category-filter">
                        <div class="filter-price">
                            <button type="button" class="filter-price-name"><b>Khoảng Giá</b>
                                    <i class="fa-solid fa-plus"></i>
                            </button>
                            <div class="price-level">
                                <ul class="price-list">
                                    <li>
                                        <label for="">
                                            <input class="Btn_All" type="radio" name="price-filter" id="" >
                                            <span>Tất cả</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input class="Btn_Less500" type="radio" name="price-filter" id="" value="Less500" <?php if (isset($_GET['buyPrice']) && $_GET['buyPrice'] == 'Less500') echo 'checked'; ?>>
                                            <span>Dưới 500.000đ</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input class="Btn_500kTo1Mil" type="radio" name="price-filter" id="" value="500To1M" <?php if (isset($_GET['buyPrice']) && $_GET['buyPrice'] == '500To1M') echo 'checked'; ?>>
                                            <span>500.000đ -> 1.000.000đ</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input class="Btn_1MilTo2Mil" type="radio" name="price-filter" id="" value="1MTo2M" <?php if (isset($_GET['buyPrice']) && $_GET['buyPrice'] == '1MTo2M') echo 'checked'; ?>>
                                            <span>1.000.000đ -> 2.000.000đ</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input class="Btn_2MilTo3Mil" type="radio" name="price-filter" id="" value="2MTo3M" <?php if (isset($_GET['buyPrice']) && $_GET['buyPrice'] == '2MTo3M') echo 'checked'; ?>>
                                            <span>2.000.000đ -> 3.000.000đ</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input class="Btn_3MilTo4Mil" type="radio" name="price-filter" id="" value="3MTo4M" <?php if (isset($_GET['buyPrice']) && $_GET['buyPrice'] == '3MTo4M') echo 'checked'; ?>>
                                            <span>3.000.000đ -> 4.000.000đáp</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input class="Btn_above4Mil" type="radio" name="price-filter" id="" value="above4M" <?php if (isset($_GET['buyPrice']) && $_GET['buyPrice'] == 'above4M') echo 'checked'; ?>>
                                            <span>Trên 4.000.000đ</span>
                                        </label>
                                    </li>
                                </ul>
                                <button id="clear-price-selection" type="button" class="delete-selection">Xóa lựa chọn giá</button>
                            </div>
                        </div>
                        <div class="filter-stuff">
                            <button type="button" class="filter-stuff-name"><b>Loại</b> <i style="margin-left: 55px;" class="fa-solid fa-plus"></i></button>
                            <div class="stuff-category">
                                <ul class="stuff-list">
                                    <li>
                                        <label for="">
                                            <input type="radio" name="stuff-filter" id="" value="boots" <?php if (isset($_GET['stuffType']) && $_GET['stuffType'] == 'boots') echo 'checked'; ?>>
                                            <span>Dress Boots</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input type="radio" name="stuff-filter" id="" value="Mocassins" <?php if (isset($_GET['stuffType']) && $_GET['stuffType'] == 'Mocassins') echo 'checked'; ?>>
                                            <span>Mocassins</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input type="radio" name="stuff-filter" id="" value="Flip-Flop" <?php if (isset($_GET['stuffType']) && $_GET['stuffType'] == 'Flip-Flop') echo 'checked'; ?>>
                                            <span>Flip-Flop</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input type="radio" name="stuff-filter" id="" value="Belt" <?php if (isset($_GET['stuffType']) && $_GET['stuffType'] == 'Belt') echo 'checked'; ?>>
                                            <span>Thắt lưng (Belt)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input type="radio" name="stuff-filter" id="" value="Wallet" <?php if (isset($_GET['stuffType']) && $_GET['stuffType'] == 'Wallet') echo 'checked'; ?>>
                                            <span>Ví (Wallet)</span>
                                        </label>
                                    </li>
                                </ul>
                                <button id="clear-stuff-selection" type="button" class="delete-selection">Xóa lựa chọn loại</button>
                            </div>
                        </div>
                        <div class="filter-material">
                            <button type="button" class="filter-material-name"><b>Chất liệu</b> <i style="margin-left: 55px;" class="fa-solid fa-plus"></i></button>
                            <div class="material-category">
                                <ul class="material-list">
                                    <li>
                                        <label for="">
                                            <input type="radio" name="material-filter" id="" value="Velvet" <?php if (isset($_GET['productMaterial']) && $_GET['productMaterial'] == 'Velvet') echo 'checked'; ?>>
                                            <span>Velvet (Nhung)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input type="radio" name="material-filter" id="" value="Fabric" <?php if (isset($_GET['productMaterial']) && $_GET['productMaterial'] == 'Fabric') echo 'checked'; ?>>
                                            <span>Fabric (Bố)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input type="radio" name="material-filter" id="" value="Leather" <?php if (isset($_GET['productMaterial']) && $_GET['productMaterial'] == 'Leather') echo 'checked'; ?>>
                                            <span>Leather (Da)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input type="radio" name="material-filter" id="" value="Patent" <?php if (isset($_GET['productMaterial']) && $_GET['productMaterial'] == 'Patent') echo 'checked'; ?>>
                                            <span>Patent (Da bóng)</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="">
                                            <input type="radio" name="material-filter" id="" value="Suede" <?php if (isset($_GET['productMaterial']) && $_GET['productMaterial'] == 'Suede') echo 'checked'; ?>>
                                            <span>Suede (Da lộn)</span>
                                        </label>
                                    </li>
                                </ul>
                                <button id="clear-material-selection" type="button" class="delete-selection">Xóa lựa chọn chất liệu</button>

                            </div>
                        </div>
                        
                       
                    </div>
                </div>
                <div class="sorting-col col-10">
                    <div class="collections-sort col">
                        <label for="sortBy" class="">Sắp Xếp</label>
                        <form id="sortForm" action="product.php" method="get">
                        <select name="sortBy" id="sortBy">
                            <option value="best-selling">Bán Chạy Nhất </option>
                            <option value="product-newest">Mới nhất</option>
                            <option value="product-oldest">Cũ nhất</option>
                            <option value="price-ascending" <?php if($sortValue == 'price-ascending') echo 'selected'; ?>>Giá Thấp - Cao</option>
                            <option value="price-descending" <?php if($sortValue == 'price-descending') echo 'selected'; ?>>Giá Cao - Thấp</option>
                        </select>
                        </form>
                    </div>
                    <div class="row collection-product">
                    <?php
                    include './ConnectDatabase/connectDatabase.php';
                       
                        try {
                            $productLineID = isset($_GET['productLineID']) ? $_GET['productLineID'] : '';
                            $priceRange = isset($_GET['buyPrice']) ? $_GET['buyPrice'] : '';
                            $stuffType = isset($_GET['stuffType']) ? $_GET['stuffType'] : '';
                            $productMaterial = isset($_GET['productMaterial']) ? $_GET['productMaterial'] : '';
                            $search_bar_keyWord = isset($_GET['search_bar']) ? $_GET['search_bar'] : '';
                           
                            // Định nghĩa số lượng sản phẩm muốn hiển thị trên mỗi trang
                            $limit = 12;

                            // Xác định vị trí bắt đầu của dữ liệu trong truy vấn
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $offset = ($page - 1) * $limit;

                           
                            $sql = "SELECT productName, buyPrice, PRODUCT.productID, PRODUCT_IMAGE.productImageURL
                                    FROM PRODUCT, PRODUCT_IMAGE, PRODUCT_LINE
                                    WHERE PRODUCT_IMAGE.isMainImage = 1
                                        AND  PRODUCT.productID = PRODUCT_IMAGE.productID
                                        AND PRODUCT.productLineID = PRODUCT_LINE.productLineID
                                        AND  PRODUCT.productStatus = 1
                                    ";
                             if ($productLineID != '') {
                                $sql .= " AND PRODUCT.productLineID = '$productLineID'";
                            }
                            if($search_bar_keyWord!=''){
                                $sql .= " AND PRODUCT.productName LIKE '%$search_bar_keyWord%'";
                            }
                           

    
                            switch ($priceRange) {
                                case 'Less500':
                                    $sql .= " AND buyPrice < 500000";
                                    break;
                                case '500To1M':
                                    $sql .= " AND buyPrice >= 500000 AND buyPrice <= 1000000";
                                    break;
                                case '1MTo2M':
                                    $sql .= " AND buyPrice > 1000000 AND buyPrice <= 2000000";
                                    break;
                                case '2MTo3M':
                                    $sql .= " AND buyPrice > 2000000 AND buyPrice <= 3000000";
                                    break;
                                case '3MTo4M':
                                    $sql .= " AND buyPrice > 3000000 AND buyPrice <= 4000000";
                                    break;
                                case 'above4M':
                                    $sql .= " AND buyPrice > 4000000";
                                    break;
                                default:
                                    break;
                            }

                            switch($stuffType){
                                case 'boots':
                                    $sql .= " AND PRODUCT.productLineID = 'PL1'";
                                    break;
                                case 'Mocassins':
                                    $sql .= " AND PRODUCT.productLineID = 'PL2'";
                                    break;
                                case 'Flip-Flop':
                                    $sql .= " AND  PRODUCT.productLineID = 'PL3'";
                                    break;
                                case 'Belt':
                                    $sql .= " AND  PRODUCT.productLineID = 'PL4'";
                                    break;
                                case 'Wallet':
                                    $sql .= " AND  PRODUCT.productLineID = 'PL5'";
                                    break;
                                default:
                                    break;
                            }

                            switch($productMaterial){
                                case 'Velvet':
                                    $sql .= " AND productMaterial = 'Nhung'";
                                    break;
                                case 'Fabric':
                                    $sql .= " AND productMaterial = 'Bố'";
                                    break;
                                case 'Leather':
                                    $sql .= " AND productMaterial = 'Da'";
                                    break;
                                case 'Patent':
                                    $sql .= " AND productMaterial = 'Da bóng'";
                                    break;
                                case 'Suede':
                                    $sql .= " AND productMaterial = 'Da lộn'";
                                    break;
                                default:
                                    break;
                            }

                            switch($sortValue){
                                case 'price-ascending':
                                    $sql .= " ORDER BY PRODUCT.buyPrice ASC"; 
                                    break;
                                case 'price-descending';
                                    $sql .= " ORDER BY PRODUCT.buyPrice DESC";
                                    break;
                                default:
                                    $sql .= " ORDER BY PRODUCT.productID ASC";
                           }

                            
                            // $sql .= " OFFSET $offset ROWS FETCH NEXT $limit ROWS ONLY";
                            $sql .= " LIMIT $limit OFFSET $offset";

                            $stmt = $conn->query($sql);
                        

                           
                           
                                while ($row = $stmt->fetch()) {
                                    $price = $row["buyPrice"];
                                    $formatted_price = number_format($price, 0, ',', ',') . '₫';
                                    
                                    
                                    echo '<div class="body__product col-lg-3" data-aos="fade-up" data-id="' . $row["productID"] . '" onclick="showProductDetail(this)">
                                            <div class="product__detail">
                                                <div class="body__product-img-content">
                                                    <a href="#">
                                                    <img src="' . $row["productImageURL"] . '.webp" alt="Product image" class="body__product-img">

                                                    </a>
                                                </div>
    
                                                <div class="body__product-text">
                                                    <a href="#" class="text__link">
                                                        <h2 class="body__product-name">' . $row["productName"] . '</h2>
                                                    </a>
                                                    <h3 class="body__product-price">' . $formatted_price . '</h3>
                                                </div>
                                            </div>
                                        </div>';
                                    
                                }
    
                                // Tạo các nút điều hướng trang
                                
                                    $paginationSQL = "SELECT COUNT(*) AS total FROM PRODUCT";
                                    $stmt = $conn->query($paginationSQL);
                                    $row = $stmt->fetch();
                                    $total_pages = ceil($row['total'] / $limit);
                                    $prev_page = $page - 1;
                                    $next_page = $page + 1;
                                    
                                    if ($total_pages > 1) { // Kiểm tra nếu tổng số trang > 1 thì mới hiển thị phân trang
                                        echo '<div class="pagination">';
                                        if ($prev_page > 0) {
                                            echo '<a href="?page=' . $prev_page . '" class="page-link">&laquo;</a>';
                                        }
                                    
                                        for ($i = 1; $i <= $total_pages; $i++) {
                                            if ($i == $page) {
                                                echo '<span class="page-link current">' . $i . '</span>';
                                            } else {
                                                echo '<a href="?page=' . $i . '" class="page-link">' . $i . '</a>';
                                            }
                                        }
                                    
                                        if ($next_page <= $total_pages) {
                                            echo '<a href="?page=' . $next_page . '" class="page-link">&raquo;</a>';
                                        }
                                    
                                        echo '</div>';
                                    }
                                
                               
                            $conn = null;
                        } catch (PDOException $e) {
                            echo "Connection failed: " . $e->getMessage();
                        }
                    ?>

                    </div>
                </div>
            </div>
        </div>

        <?php 
            include 'footer.php'; 
        ?>
        
        
   
    
        </div>

       

    </body>

    <!-- <script src="./Javascript/collections.js" async="false"></script> -->

<script src="./Javascript/productList.js"></script>
<script>
    AOS.init();
</script>


</html>