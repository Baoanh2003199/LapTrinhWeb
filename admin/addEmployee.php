<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/employee.php';
?>

<?php
$emp = new employee();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $Name = $_POST['Name'];
  $Address = $_POST['Address'];
  $Phone = $_POST['Phone'];
  $Email = $_POST['Email'];
  $DoB = $_POST['DoB'];
  $Status = $_POST['Status'];
  $insert_emp = $emp->insert_Employees($Name, $Address, $Phone, $Email, $DoB, $Status);
}
?>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="addEmployee.php">Thêm nhân viên</a>>
  <?php
  if (isset($insert_emp)) {
    echo $insert_emp;
  }
  ?>
</div>
<form enctype="multipart/form-data">
  <div class="titleForm">Thêm nhân viên</div>
  <div class="form-group">
    <div class="itemForm">Tên</div>
    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Tên" />
  </div>
  <div class="form-group">
    <div class="itemForm">Địa chỉ</div>
    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Tên" />
  </div>
  <div class="form-group">
    <div class="itemForm">Điện thoại</div>
    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Tên" />
  </div>
  <div class="form-group">
    <div class="itemForm">Email</div>
    <input type="email" class="form-control" id="" aria-describedby="" placeholder="Tên" />
  </div>
  <div class="form-group">
    <div class="itemForm">City</div>
    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Tên" />
  </div>
  <div class="form-group">
    <div class="itemForm">Ngày sinh</div>
    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Tên" />
  </div>
  <div class="form-group">
    <div class="itemForm">Trạng thái</div>
    <br />
    <select name="" id="" class="form-control">
      <option value="1"> hoạt động</option>
      <option value="2"> tạm ngưng</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
