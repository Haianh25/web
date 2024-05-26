<?php
require_once 'connectPHP.php';





function generateRandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = str_shuffle($characters);
    $randomString = substr($randomString, 0, 3);
    return $randomString;
}
$ID_new = generateRandomString();
$sql_add_2 = "SELECT productID FROM product WHERE productID = '$ID_new'";
$result = mysqli_query($conn, $sql_add_2);
while (mysqli_num_rows($result) > 0) {
    $ID_new = generateRandomString();
    $sql_add_ = "SELECT productID FROM product WHERE productID = '$ID_new'";
    $result = mysqli_query($conn, $sql__add2);
}
echo $ID_new;

// sử dụng hàm
// echo ;

$sql_1_add = "SELECT * FROM Product_Line";
$productLines = mysqli_query($conn, $sql_1_add);

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
                <div>
                    <form enctype="multipart/form-data" class="row" action="xulysanpham.php?productID=<?php echo $ID_new . "&action=add"; ?>" method="post">
                        <div class="col-lg-3">
                            <div class="content_name">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" id="input_type" name="productName" style="padding: 4px;" value="">

                            </div>
                            <div class="category">
                                <div class="category_item">
                                    <label for="productLine">Danh mục</label>
                                    <div class="input-group" style="justify-content:space-between;">
                                        <select class="special_1" name="productLine" value="">
                                            <?php while ($productLine = mysqli_fetch_array($productLines)) { ?>
                                                <option value="<?php echo $productLine['productLineName']; ?>"><?php echo $productLine['productLineName']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php
                                        if ($_GET['page'] == 'add') {
                                            echo '<button type="button" class="btn btn-primary ml-2" style="font-size:14px">Thêm danh mục</button>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                            <div class="category">
                                <div class="category_item">
                                    <label >Nhà sản xuất</label>
                                    <input id="input_type" name="productVendor" type="text" value="">
                                </div>
                            </div>
                            <div class="category">
                                <div class="category_item">
                                    <label >Mô tả <span class="infor">
                                        </span></label>
                                    <textarea name="productDescription" cols="6" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="add_price_and_day ">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="add_price">
                                            <label >Giá mua</label>
                                            <input type="text" name="buyPrice" value="" id="input_type">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="add_day">
                                            <label >Giá bán lẻ
                                            </label>
                                            <input id="input_type" name="MSRP" value="" type="text">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="add_day">
                                            <label >Chất liệu</label>
                                            <input id="input_type" name="productMaterial" value="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="add_day">
                                            <label >Số lượng</label>
                                            <input id="input_type" name="quantityInStock" value="" type="text">

                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="add_day">
                                            <label >Màu sắc</label>
                                            <input id="input_type" name="color" value="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="add_day">
                                            <label >Kích thước</label>
                                            <input id="input_type" name="size" value="" type="text">

                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-name">
                                <p>Product Images</p>
                            </div>
                            <div class="product_img row">
                                <div class="col-lg-4">
                                    <img style="width:100%;height: 44%;" class="image-preview" onclick="openFileInput(this)" src="#" />
                                    <div class="product-add-img-1 ">
                                        <p>Drop your images here, or select <label class="label">
                                                <input type="file" class="image_upload" name="main_img" />
                                                <span>Select a file</span>
                                            </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <div class="product-add-img-two">

                                        <img style="width:100%;height: 44%;" class="image-preview" onclick="openFileInput(this)" src="#" />
                                        <div class="product-add-img-1">
                                            <p>Drop your images here, or select <label class="label">
                                                    <input type="file" class="image_upload" name="img_1" />
                                                    <span>Select a file</span>
                                                </label>
                                        </div>
                                        <img style="width:100%;margin-top:24px;height: 44%;" onclick="openFileInput(this)" class="image-preview " src="#" />
                                        <div class="product-add-img-1 mg-t">
                                            <p>Drop your images here, or select <label class="label">
                                                    <input type="file" class="image_upload" name="img_2" />
                                                    <span>Select a file</span>
                                                </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product-add-img-two">
                                        <img style="width:100%;height: 44%;" class="image-preview" onclick="openFileInput(this)" src="#" />
                                        <div class="product-add-img-1">
                                            <p>Drop your images here, or select <label class="label">
                                                    <input type="file" class="image_upload" name="img_3" />
                                                    <span>Select a file</span>
                                                </label>
                                        </div>
                                        <img style="width:100%;margin-top:24px;height: 44%;" onclick="openFileInput(this)" class="image-preview " src="#" />
                                        <div class="product-add-img-1 mg-t">
                                            <p>Drop your images here, or select <label class="label">
                                                    <input type="file" class="image_upload" name="img_4" />
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
                                            <button type="button" onclick="window.location.href=window.location.href">Khôi phục thông tin </button>
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
    var isEdit = false;
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