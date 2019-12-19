<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/customer.php';
?>
<?php
if (!isset($_GET['CustomerID']) || $_GET['CustomerID'] == null) {
  echo "<script> window.location='updateCustomer.php'</script?";
} else {
  $id = $_GET['CustomerID'];
}
$cus = new customer();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $cusName = $_POST['Name'];
  $cusAddress = $_POST['Address'];
  $cusPhone = $_POST['Phone'];
  $cusEmail = $_POST['Email'];
  $cusCity = $_POST['City'];
  $cusDob = $_POST['DoB'];
  $cusStatus = $_POST['Status'];
  $update_customer = $cus->update_Customers($cusName, $cusAddress, $cusPhone, $cusEmail, $cusCity, $cusDob, $cusStatus, $id);
}
?>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="updateCustomer.php">Cập nhật Khách hàng</a>>
  <?php
  if (isset($update_customer)) {
    echo $update_customer;
  }
  ?>
</div>
<?php
$get_Name = $cus->getCusID($id);
if ($get_Name) {
  while ($result = $get_Name->fetch_assoc()) {
    ?>
    <form enctype="multipart/form-data">
      <div class="titleForm">Cập nhật khách hàng</div>
      <div class="form-group">
        <div class="itemForm">Tên</div>
        <input type="text" value="<?php echo $result['Name']; ?>" class="form-control" id="" aria-describedby="" readonly />
      </div>
      <div class="form-group">
        <div class="itemForm">Địa chỉ</div>
        <input type="text" value="<?php echo $result['Address']; ?>" class="form-control" id="" aria-describedby="" readonly />
      </div>
      <div class="form-group">
        <div class="itemForm">Điện thoại</div>
        <input type="text" value="<?php echo $result['Phone']; ?>" class="form-control" id="" aria-describedby="" readonly />
      </div>
      <div class="form-group">
        <div class="itemForm">Email</div>
        <input type="email" value="<?php echo $result['Email']; ?>" class="form-control" id="" aria-describedby="" readonly />
      </div>
      <div class="form-group">
        <div class="itemForm">City</div>
        <input type="text" value="<?php echo $result['City']; ?>" class="form-control" id="" aria-describedby="" readonly />
      </div>
      <div class="form-group">
        <div class="itemForm">Ngày sinh</div>
        <input type="text" value="<?php echo $result['DoB']; ?>" class="form-control" id="" aria-describedby="" readonly />
      </div>
      <div class="form-group">
        <div class="itemForm">Trạng thái</div>
        <br />
        <select name="Status" id="" class="form-control">
          <?php
              $cuss = new customer();
              $cuss_list = $cuss->show_Customers();
              if ($cuss_list) {
                while ($result = $cuss_list->fetch_assoc()) {
                  ?>
              <option value="<?php echo $result['CustomerID']; ?>"> <?php $result['Status']; ?></option>
          <?php
                }
              }
              ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
<?php
  }
}
?>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
