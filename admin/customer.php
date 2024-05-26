<?php
  require('connectPHP.php');
     // Thực hiện truy vấn SQL
     $sql ="SELECT * FROM CUSTOMER";
     $customers = mysqli_query($conn,$sql);
 
?>

<table>
  <thead>
    <tr>
      <th>ID Khách hàng</th>
      <th>Tên Khách hàng</th>
      <th>Email</th>
      <th>Số điện thoại</th>
      <th>Địa chỉ</th>
      <th>Thành phố</th>
      <th>Quốc gia</th>
      <th>Trạng thái</th>
      <th>Chức năng</th>
    </tr>
  </thead>
  <tbody>
    <?php while ( $customer = mysqli_fetch_array($customers)) { ?>
      <tr>
        <td><?php echo $customer['customerID']; ?></td>
        <td><?php echo $customer['customerName']; ?></td>
        <td><?php echo $customer['customerEmail']; ?></td>
        <td><?php echo $customer['phoneNumber']; ?></td>
        <td><?php echo $customer['addressLine1'] . ', ' . $customer['addressLine2']; ?></td>
        <td><?php echo $customer['city']; ?></td>
        <td><?php echo $customer['country']; ?></td>
        <td><?php echo $customer['customerStatus'] ? 'Active' : 'Inactive'; ?></td>
        <td style="display: flex;justify-content: space-around;"> 
           
            <?php 
          echo "<form method='post'>
          <button id='status-btn'  type='submit' name='status' value='" . $customer['customerID'] . "|" . $customer['customerStatus'] . "'>
              <i  class='fa " . ($customer['customerStatus'] ? 'fa-lock' : 'fa-lock-open') . "'></i>
          </button>
      </form>
      ";
            ?>
          

        </td>
      </tr>
    <?php } ?>
    <?php 
    require('connectPHP.php');
   if(isset($_POST['status'])){
    $status = $_POST['status'];
    $statusArr = explode('|', $status);
    $customerID = $statusArr[0];
    $customerStatus = $statusArr[1];
    $customerStatus = ($customerStatus === "1") ? true : false;
    if(!$customerStatus)
        $sql = "UPDATE CUSTOMER SET customerStatus = 1 WHERE customerID = '".$customerID."'";
    else 
        $sql = "UPDATE CUSTOMER SET customerStatus = 0 WHERE customerID = '".$customerID."'";
    $stmt = mysqli_query($conn, $sql);
}
                                          
     ?>
  </tbody>
</table>





