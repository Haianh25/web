<?php
require_once('connectPHP.php');
$sql = "SELECT * FROM PRODUCT";
$products =  mysqli_query($conn, $sql);
?>
<div class="header_form" style="justify-content:end">
  <div class="btn_add">
    <button class="btn btn-primary" style="font-size:16px;margin-bottom:5px"> <a href="admin.php?page=add" style="color:#fff;text-decoration:none">Thêm sản phẩm </a></button>
  </div>
</div>
<table>
  <tr>
    <th>Mã sản phẩm</th>
    <th>Tên sản phẩm</th>
    <th>Product Line ID</th>
    <th>NSX</th>
    <th>Mô tả</th>
    <th>Số lượng tồn</th>
    <th>Giá mua</th>
    <th>Giá bán lẻ</th>
    <th>Chất liệu</th>
    <th>Chức năng</th>
  </tr>
  <?php while ($product = mysqli_fetch_array($products)) { ?>
    <tr>
      <td class="idProduct"><?php echo $product['productID']; ?> </td>
      <td><?php echo $product['productName'] ?></td>
      <td><?php echo $product['productLineID'] ?></td>
      <td><?php echo $product['productVendor'] ?></td>
      <td><?php echo $product['productDescription'] ?></td>
      <td><?php echo $product['quantityInStock'] ?></td>
      <td><?php echo $product['buyPrice'] ?></td>
      <td><?php echo $product['MSRP'] ?></td>
      <td><?php echo $product['productMaterial'] ?></td>
      <td style="display: flex;justify-content: space-around;">

        <a href="admin.php?page=edit&productID=<?php echo $product['productID']; ?>"><i class="fa-solid fa-edit"></i></a>
        <a onclick="removeProduct(event,this)" href="deleteproduct.php?productID=<?php echo $product['productID']; ?>"><i class="fa-solid fa-trash"></i></a>


      </td>
    </tr>
  <?php } ?>
</table>

<div class="modal">
  <div class="modal_notify">
    <h3>Bạn có chắc muốn xóa sản phẩm này?</h3>
    <p style="font-size: 13px">Sản phẩm đang được bán trên website.</p>
    <div class="modal_buttons">
      <button style="" id="confirmDelete">Xóa</button>
      <button style="padding: 5px 15px;font-size: 16px;cursor: pointer;" id="cancelDelete">Hủy</button>
    </div>
  </div>
</div>




<script>
  // Lấy tham chiếu đến modal
  var modal = document.querySelector('.modal');

  // Lấy tham chiếu đến nút xác nhận xóa
  var confirmDeleteButton = document.getElementById('confirmDelete');

  // Lấy tham chiếu đến nút hủy xóa
  var cancelDeleteButton = document.getElementById('cancelDelete');

  // Hiển thị modal khi người dùng nhấn vào nút xóa


  // Đóng modal khi người dùng nhấn vào nút hủy


  const id = document.querySelector(".idProduct").innerText
  var etemp;

  function removeProduct(e, element) {
    etemp = element;
    e.preventDefault();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        let result = xmlhttp.responseText;
        console.log(result);
        if (result == 1) {
          modal.style.display = 'block';
          confirmDeleteButton.addEventListener('click', function() {
            window.location.href = element.getAttribute("href");
            modal.style.display = 'block';
          });
          cancelDeleteButton.addEventListener('click', function() {
            modal.style.display = 'none';
          });
        }
        else
        window.location.href = element.getAttribute("href");


      }
    };
    xmlhttp.open("GET", "checkproduct.php?productID=" + encodeURIComponent(id), true);
    xmlhttp.send();
  }
</script>