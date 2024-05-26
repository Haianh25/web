<?php 
   require_once 'connectPHP.php';
  
   
        $productID = $_GET['productID'];
        $sql = "SELECT * FROM PRODUCT WHERE productID = '$productID' "  ;
        $products = mysqli_query($conn,$sql);
        $product = mysqli_fetch_assoc($products);
        $sql_1 = "SELECT * FROM Product_Line";
        $productLines = mysqli_query($conn,$sql_1);
        $sql_2 = "SELECT  `productImageURL`  FROM `product_image` WHERE isMainImage = 1 AND productID = '$productID'";
        $main = mysqli_query($conn,$sql_2);
        $img_main = mysqli_fetch_assoc($main);
        $sql_3 = "SELECT * FROM `product_image` WHERE isMainImage != 1 AND productID = '$productID'";
        $phu = mysqli_query($conn,$sql_3);
        $sql_4 = "SELECT Product_Line.productLineName FROM Product_Line,Product WHERE Product_Line.productLineID = Product.productLineID AND productID = '$productID'";
        $productLineOfproduct = mysqli_query($conn,$sql_4);
        $productLineOfproduct = mysqli_fetch_array($productLineOfproduct);
        $images = array();
        if(mysqli_num_rows($phu) > 0)
        {
            while($img_phu = mysqli_fetch_assoc($phu)) { 

                $images[] = $img_phu['productImageURL'];
            }
        }

  
   
?>

<div class="content_iner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header_edit">
                            <span>Sửa thông tin sản phẩm</span>
                          
                        </div>
                    </div>
                    <div class="container">
                        <div >
                        <form enctype="multipart/form-data" class="row" action="xulysanpham.php?productID=<?php  echo $productID . "&action=edit" ?>" method="post">
                                <div class="col-lg-3">
                                    <div class="content_name">
                                        <label for="name">Tên sản phẩm</label>
                                        <input type="text" id="input_type" name="productName" style="padding: 4px;" value="<?php  echo $product['productName']; ?>">
                                       
                                    </div>
                                    <div class="category">
                            <div class="category_item">
                          <label for="productLine">Danh mục</label>
                             <div class="input-group" style="justify-content:space-between;">
                              <select class="special_1" name="productLine" value="<?php  echo $productLineOfproduct[0] ?>;">
                             <?php while ($productLine = mysqli_fetch_array($productLines)) { ?>
                                <option value="<?php echo $productLine['productLineName']; ?>"  <?php  if($productLine['productLineName'] == $productLineOfproduct[0]) echo 'selected'; ?>><?php  echo $productLine['productLineName']; ?></option>
                                <?php } ?>
                             </select>  
                             <?php 
                             if($_GET['page'] == 'add')
                             {
                                echo '<button type="button" class="btn btn-primary ml-2" style="font-size:14px">Thêm danh mục</button>' ;
                             }
                             ?>
                            
                             </div>
                                </div>
                                     </div>
    
                                    <div class="category">
                                        <div class="category_item">
                                            <label for="cars">Nhà sản xuất</label>
                                           <input id="input_type" name="productVendor" type="text" value="<?php  echo $product['productVendor'] ?>">
                                        </div>
                                    </div>
                                    <div class="category">
                                        <div class="category_item">
                                            <label for="cars">Mô tả <span class="infor">
                                               </span></label>
                                            <textarea name="productDescription"  cols="6" rows="6"><?php  echo $product['productDescription'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="add_price_and_day ">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="add_price">
                                                        <label for="cars">Giá mua</label>
                                                        <input type="text" name="buyPrice" value=" <?php  echo $product['buyPrice']?>" id="input_type" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="add_day">
                                                        <label for="cars">Giá bán lẻ
                                                    </label>
                                                        <input id="input_type" name="MSRP" value=" <?php  echo $product['MSRP']?>" type="text" >  
                                                    </div>
                                                </div>
                                               
                                                <div class="col-lg-6">
                                                    <div class="add_day">
                                                    <label for="cars">Chất liệu</label>
                                                        <input id="input_type" name="productMaterial" value=" <?php  echo $product['productMaterial']?>"  type="text" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="add_day">
                                                        <label for="cars">Số lượng</label>
                                                        <input id="input_type" name="quantityInStock" value=" <?php  echo $product['quantityInStock']?>"  type="text" >
                                                       
                                                    </div>
                                                </div>
                                               
                                               
                                            </div>
                                            
                                          
                                        </div>
                                    </div>
                                <div class="col-lg-6">
                                    <div class="product-name">
                                        <p>Product Images</p>
                                    </div>
                                <div class="product_img row" >
                                    <div class="col-lg-4">
                                        <img style="width:100%;height: 44%;" class="image-preview"  onclick="openFileInput(this)" src="<?php  echo "." .$img_main['productImageURL'] . ".webp" ?>"/>
                                             <div  class="product-add-img-1 ">
                                                <p>Drop your images here, or select  <label class="label">
                                                    <input type="file" class="image_upload"  name="main_img"/>
                                                    <span>Select a file</span>
                                                  </label>
                                             </div>
                                         </div>
                                         <div class="col-lg-4">
                                       
                                            <div class="product-add-img-two">
                                               
                                             <img style="width:100%;height: 44%;" class="image-preview"  onclick="openFileInput(this)" src="<?php  echo "." .$images[0] . ".webp" ?>"/>
                                             <div  class="product-add-img-1">
                                                <p>Drop your images here, or select  <label class="label">
                                                    <input type="file" class="image_upload" name="img_1" />
                                                    <span>Select a file</span>
                                                  </label>
                                             </div>
                                             <img style="width:100%;margin-top:24px;height: 44%;" onclick="openFileInput(this)" class="image-preview " src="<?php  echo "." .$images[1] . ".webp" ?>"/>
                                                <div class="product-add-img-1 mg-t">
                                                    <p>Drop your images here, or select  <label class="label">
                                                        <input type="file" class="image_upload"  name="img_2"/>
                                                        <span>Select a file</span>
                                                      </label>
                                                </div>       
                                             </div> 
                                            </div>
                                            <div class="col-lg-4">
                                             <div class="product-add-img-two">
                                             <img style="width:100%;height: 44%;" class="image-preview"  onclick="openFileInput(this)" src="<?php  echo "." .$images[2] . ".webp" ?>"/>
                                             <div class="product-add-img-1">
                                                <p>Drop your images here, or select  <label class="label">
                                                    <input type="file" class="image_upload"  name="img_3"/>
                                                    <span>Select a file</span>
                                                  </label>
                                             </div>
                                             <img style="width:100%;margin-top:24px;height: 44%;"  onclick="openFileInput(this)" class="image-preview " src="<?php   echo "." .$images[3] . ".webp" ?>"/>
                                                <div class="product-add-img-1 mg-t">
                                                    <p>Drop your images here, or select  <label class="label">
                                                        <input type="file" class="image_upload" name="img_4"/>
                                                        <span>Select a file</span>
                                                      </label>
                                                </div>       
                                             </div> 
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="button">  
                                                    <div class="button_add">
                                                        <input type="submit" name="submit" value="Lưu thông tin">
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-lg-4">
                                                <div class="button">  
                                                    <div class="button_add">
                                                    <button type="button"  onclick="window.location.href=window.location.href">Khôi phục thông tin </button>
                                                    </div>
                                                    </div>
                                                </div>
                                        </div>
                                        
                                     </div>
                                  
                               
                                    </form>
                           
                                
                            </div>
                        </div>
                    </div>
                 </div>
        </div>
        <script>
        var isEdit=false;
        const inputElements = document.querySelectorAll(".product-add-img-1");
        for (let i = 0; i < inputElements.length; i++) {
        const inputElement = inputElements[i];
        //   const label = inputElement.querySelector("product-add-img-1");
        const imagePreview = inputElement.previousElementSibling;
        inputElement.addEventListener("change", (e) => {
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = (e) => {
        inputElement.classList.add("none");
        imagePreview.classList.remove('none')
        console.log(e.target.result)
        imagePreview.setAttribute("src", e.target.result);
        };
        console.log(file)
        reader.readAsDataURL(file);
        });
        }

        const imagePreview = document.querySelectorAll(".image-preview");
        for (let i = 0; i < imagePreview.length; i++) {
        if (imagePreview[i].getAttribute("src") !== "#") {
            this.isEdit = true;
            imagePreview[i].nextElementSibling.classList.add('none');
        } else {
            imagePreview[i].nextElementSibling.classList.remove('none');
            imagePreview[i].classList.add('none')
        }
        }
        console.log(isEdit)
        function openFileInput(img) {
        const input = img.nextElementSibling.querySelector('.image_upload');
        input.click();
}

        </script>