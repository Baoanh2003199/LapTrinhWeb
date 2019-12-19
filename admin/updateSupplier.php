<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/supplier.php';
?>
<?php
if (!isset($_GET['SupplierID']) || $_GET['SupplierID'] == null) {
  echo "<script> window.loaction='updateSupplier.php'</script>";
} else {
  $id = $_GET['SupplierID'];
}
$supp = new supplier();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $suppName = $_POST['SupplierName'];
  $updateSupp = $supp->update_supplier($suppName, $suppAddress, $suppPhone, $suppStatus, $id);
}
?>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="updateSupplier.php">Cập nhật nhà sản xuất</a>>
  <?php
  if (isset($updateSupp)) {
    echo $updateSupp;
  }
  ?>
</div>
<?php
$get_Name = $supp->getSupplierID($id);
if ($get_Name) {
  while ($resulut = $get_Name->fetch_assoc()) {
    ?>
    <form>
      <div class="titleForm">Cập nhật sản xuất</div>
      <div class="form-group">
        <div class="itemForm">Nhà sản xuất</div>
        <input type="text" class="form-control" value="<?php echo $resulut['SupplierName'] ?>" id="" aria-describedby="" placeholder="Nhập tên loại" />
      </div>
      <div class="form-group">
        <div class="itemForm">Địa chỉ</div>
        <input type="text" class="form-control" value="<?php echo $resulut['Address'] ?>" id="" aria-describedby="" placeholder="Nhập địa chỉ" />
      </div>
      <div class="form-group">
        <div class="itemForm">SDT</div>
        <input type="text" class="form-control" value="<?php echo $resulut['Phone'] ?>" id="" aria-describedby="" placeholder="Nhập số điện thoại" />
      </div>
      <div class="form-group">
        <div class="itemForm">Trạng thái</div>
        <br />
        <select name="Status" id="" class="form-control">
          <?php
              $supp = new supplier();
              $supp_list = $supp->show_supplier();
              if ($supp_list) {
                while ($result = $supp_list->fetch_assoc()) {
                  ?>
              <option value="<?php echo $resulut['SupplierID'] ?>"><?php echo $resulut['Status'] ?></option>
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
