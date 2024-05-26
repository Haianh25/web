
<?php 
           require_once('connectPHP.php');
                // Thực hiện truy vấn SQL
                if (isset($_POST['submit'])) {
                  
                  $sql = "SELECT ORDERS.orderID, ORDERS.customerID, ORDERS.comments, ORDERS.orderDate, ORDERS.shippedDate, ORDERS.subAddress, ORDERS.status
                  FROM ORDERS
                  INNER JOIN CUSTOMER ON ORDERS.customerID = CUSTOMER.customerID
                  WHERE 1=1"; // điều kiện giả để giúp thêm các điều kiện sau dễ dàng hơn
              
                  if (!empty($_POST['province'])) {
                      $province = $_POST['province'];
                      $sql .= " AND CUSTOMER.city = '" . $province . "'";
                      
                  }
              
                  if (!empty($_POST['start_date']) && !empty($_POST['end_date'])) {
                      $start_date = $_POST['start_date'];
                      $end_date = $_POST['end_date'];
                      $sql .= " AND ORDERS.orderDate BETWEEN '$start_date' AND '$end_date'";
                      
                  }
                 
                  $orders =  mysqli_query($conn,$sql);
                }
                else {
                  $sql = "SELECT * FROM ORDERS";
                  $orders =  mysqli_query($conn,$sql);
                }
                $sql_1 = "SELECT DISTINCT city FROM CUSTOMER;";
                $cities = mysqli_query($conn,$sql_1);  
               
            ?>
         
   
   

<div class="header_form">
        <div class="header_form_1">Lọc theo ngày đặt</div>
        <div class="header_form_2">Lọc theo tỉnh/thành</div>
    </div>
    
    <div style="width:66%">
 <form  method="POST" action="admin.php?page=0">
  <div style="display: flex; justify-content: space-between;">
    <div class="input-group mb-3" >
      <input type="date" class="date_form" placeholder="Từ ngày" aria-label="Từ ngày" name="start_date">
      <span class="icon_form"><i class="fa-solid fa-arrow-right"></i></span>
      <input type="date" class="date_form" placeholder="Đến ngày" aria-label="Đến ngày" name="end_date">
    </div>
    <div style="height:100%" class="input-group mb-3" >
      <select name="province" class="form-select">
        <option  selected disabled>Chọn vùng</option>
        <?php while( $city = mysqli_fetch_array($cities)) { ?>
          <option value="<?php echo $city['city']; ?>"><?php echo $city['city']; ?></option>
        <?php } ?>
       
      </select>
     
      <button class="btn btn-primary" type="submit" name="submit">Lọc</button>
    </div>
  </div>
</form>
    </div>
      <table>
               <tr>
                 <th>Order ID</th>
                 <th>Ngày đặt</th>
                 <th>Ngày giao</th>
                 <th>Trạng thái</th>
                 <th>Comments</th>
                 <th>Customer ID</th>
                 <th>Địa chỉ</th>
                 <th>Chi tiết hóa đơn</th>
                 </tr>
                 <?php while($order = mysqli_fetch_array($orders)) { ?>
                    <tr>
                     <td id="orderID"><?php echo $order['orderID']; ?> </td>
                     <td><?php echo $order['orderDate'] ?></td>
                     <td><?php echo $order['shippedDate'] ?></td>
                     <td>
                     <select id="status" name="status" class="form-select">
  <option value="Chưa giao" <?php if ($order['status'] == 'Chưa giao') echo 'selected'; ?>>Chưa giao</option>
  <option value="Hủy đơn giao" <?php if ($order['status'] == 'Hủy đơn giao') echo 'selected'; ?>>Hủy đơn giao</option>
  <option value="Đang được giao" <?php if ($order['status'] == 'Đang được giao') echo 'selected'; ?>>Đang được giao</option>
</select>

                    
                    </td>
                     <td><?php echo $order['comments'] ?></td>
                     <td><?php echo $order['customerID'] ?></td>
                     <td><?php echo $order['subAddress'] ?></td>
                    <td><a href="<?php echo 'detailorder.php?code='. $order['orderID'] ?>">View Details</a></td>
                     </tr>
                     <?php } ?>
                </table>

  <script>
      
    document.getElementById('status').onchange = function() {
        var selectedStatus = this.value; 
       
        var orderID = this.closest('tr').querySelector('#orderID').innerText;
       
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               
            }
        };
       
        xhttp.open("GET", "updateStatuspOrder.php?orderId=" +encodeURIComponent(orderID) + "&status=" + selectedStatus, true);
        xhttp.send();
    };
</script>

