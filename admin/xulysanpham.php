<?php 
 require_once 'connectPHP.php';

 // Check if image file is a actual image or fake image
 if(isset($_POST["submit"])) {
    // cập nhật các thông tin khác
    $productID = $_GET['productID'];
    $productName = $_POST['productName'];
    $productVendor = $_POST['productVendor'];
    $productLine = $_POST['productLine'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
    $productMaterial = $_POST['productMaterial'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    
    $sql_3 = "SELECT productLineID FROM product_line WHERE productLineName = '$productLine'";
    $productLineID_query = mysqli_query($conn,$sql_3);
    $productLineID_query = mysqli_fetch_array($productLineID_query);
    $productLineID = $productLineID_query[0];
    function generateRandomString_1()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = str_shuffle($characters);
        $randomString = substr($randomString, 0, 3);
            return $randomString;
    }
    if($_GET['action'] == 'edit') {
        $sql = "UPDATE product 
        SET productName='$productName', 
            productVendor='$productVendor', 
            productLineID='$productLineID', 
            buyPrice='$buyPrice', 
            MSRP='$MSRP', 
            productMaterial='$productMaterial', 
            productDescription='$productDescription', 
            quantityInStock='$quantityInStock' 
        WHERE productID='$productID'";
       
    $rows = mysqli_query($conn,$sql);
  
    }
    else {
        $color = $_POST['color'];
        $size = $_POST['size'];
        $sql = "INSERT INTO product (productID, productName, productVendor, productLineID, buyPrice, MSRP, productMaterial, productDescription, quantityInStock,productStatus) 
        VALUES ('$productID', '$productName', '$productVendor', '$productLineID', '$buyPrice', '$MSRP', '$productMaterial', '$productDescription', '$quantityInStock',1);";
       $productSizeId = generateRandomString_1();
       $colorId = generateRandomString_1();
      
    $result = mysqli_query($conn,$sql);
    if ($result) {
        // Thực hiện câu lệnh INSERT vào bảng product_size
        $sql_1 = "INSERT INTO product_size (`productSizeID`, `productID`, `productSize`) VALUES ('$productSizeId','$productID','$size')";
        mysqli_query($conn, $sql_1);
        $sql_2 = "INSERT INTO `product_color`(`productColorID`, `productID`, `productColor`) VALUES ('$colorId','$productID','$color')";
        mysqli_query($conn, $sql_2);
    } 
    
    }
   
    function generateRandomString($existingIDs)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = str_shuffle($characters);
    $randomString = substr($randomString, 0, 3);

    // Kiểm tra xem chuỗi ngẫu nhiên đã tồn tại trong mảng $existingIDs chưa
    // Nếu đã tồn tại, tiếp tục tạo chuỗi ngẫu nhiên khác
    while (in_array($randomString, $existingIDs)) {
        $randomString = str_shuffle($characters);
        $randomString = substr($randomString, 0, 3);
    }

        return $randomString;
}

    
if ($_GET['action'] == 'add') {
    $i = 0;
    $productImageID = array();
    while ($i < 5) {
        $productImageID[$i] = generateRandomString($productImageID);
       
        $i++;
    }
}
    else
    {
        $sql_2 = "SELECT productImageID FROM product_image WHERE productID = '$productID' ORDER BY `isMainImage` DESC";
        $listproductImage = mysqli_query($conn, $sql_2);
        $productImageID = array();
        while ($row = mysqli_fetch_assoc($listproductImage)) {
            $productImageID[] = $row['productImageID'];
           
        }
    }
    // cập nhật hình ảnh
    $target_dir = "../Image/".$productLine;
    $productImageID_ischange = array();

    $file_names = array("main_img", "img_1", "img_2", "img_3", "img_4");
    $file_names_notempty = array();
    $target_files = array();
    foreach ($file_names as $key => $file_names) {
        // echo $key . " day";
        if (!empty($_FILES[$file_names]["name"])) {
          
            $target_files[] = $target_dir ."/" . basename($_FILES[$file_names]["name"]);
            $file_names_notempty[] = $file_names;
            $productImageID_ischange[] = $productImageID[$key];
           
        }
    }
foreach ($target_files as $key => $target_file) {
    uploadFileToVisual($target_file, $file_names_notempty[$key],$productImageID_ischange[$key],$productID,$conn);
}
 }
 function uploadFileToVisual($UrlImage, $file_name,$productImageID,$productID,$conn) {
  
    $uploadOk = 1;
    $check = getimagesize($_FILES[$file_name]["tmp_name"]);
    if($check !== false) {
      
        $uploadOk = 1;
    } else {
       
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($UrlImage)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES[$file_name]["size"] > 500000) {
       
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    // if($imageFileType !=" jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    // && $imageFileType != "gif" ) {
    //     $uploadOk = 0;
    // }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Upload ảnh không thành công";
    // if everything is ok, try to upload file
    } else {
        $filename_without_ext = substr($UrlImage, 0, strrpos($UrlImage, '.')); 
        $newUrlImage_insertVisual = $filename_without_ext . '.webp';
        
        $UrlImage = substr($UrlImage, 1, strrpos($UrlImage, '.') - 1);
        if (move_uploaded_file($_FILES[$file_name]["tmp_name"], $newUrlImage_insertVisual)) {
          
            if ($_GET['action'] == 'edit') {
                if ($file_name == 'main_img') {
                    $isMainImage = 1;
                } else {
                    $isMainImage = 0;
                }
                
                $sql = "UPDATE `product_image` SET `productImageURL` = '$UrlImage', `isMainImage` = '$isMainImage' WHERE `productID` = '$productID' AND `productImageID` = '$productImageID'";
            }
            
            if($_GET['action'] == 'add') {
                if ($file_name == 'main_img') {
                    $isMainImage = 1;
                  
                } else {
                    $isMainImage = 0;
                   
                }
                
                $sql = "INSERT INTO `product_image`(`productImageID`, `productID`, `productImageURL`, `isMainImage`) VALUES ('$productImageID','$productID','$UrlImage','$isMainImage')";
            }
            
            $row = mysqli_query($conn,$sql);
          
           
            
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
}
 header('Location: admin.php?page=2');
 exit();
