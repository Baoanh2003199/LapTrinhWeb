<?php
include_once 'inc/header.php';
include_once '../classes/supplier.php';
include_once '../helper/format.php';
include_once '../lib/database.php';
include_once '../lib/session.php';
?>
<?php
$supp = new supplier();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $SupplierName = $_POST['SupplierName'];
  $SuppAddress = $_POST['Address'];
  $SuppPhone = $_POST['Phone'];
  $suppStatus = $_POST['Status'];
  $insert_supp = $supp->insert_supplier($SupplierName, $SuppAddress, $SuppPhone, $suppStatus);
  var_dump($_POST);
}
?>
<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="addSupplier.html">Thêm nhà sản xuất</a>>
  <?php
  if (isset($insert_supp)) {
    echo $insert_supp;
  }
  ?>
</div>
<form method="POST" action="addSupplier.php" >
  <div class="titleForm">Thêm nhà sản xuất</div>
  <div class="form-group">
    <div class="itemForm">Nhà sản xuất</div>
    <input type="text" class="form-control" name="SupplierName" id="" aria-describedby="" placeholder="Nhập tên loại" />
  </div>
  <div class="form-group">
    <div class="itemForm">Địa chỉ</div>
    <input type="text" class="form-control" name="Address" id="" aria-describedby="" placeholder="Nhập địa chỉ" />
  </div>
  <div class="form-group">
    <div class="itemForm">SDT</div>
    <input type="text" class="form-control" name="Phone" id="" aria-describedby="" placeholder="Nhập số điện thoại" />
  </div>
  <div class="form-group">
    <div class="itemForm">Trạng thái</div>
    <br />
    <select name="Status" id="" class="form-control">
      <option value="1"> hoạt động</option>
      <option value="2"> tạm ngưng</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
</div>
<?php
include_once 'inc/footer.php';
?>
