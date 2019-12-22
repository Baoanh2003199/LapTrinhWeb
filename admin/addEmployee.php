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
  $DoB = $_POST['DOB'];
  $Status = $_POST['Status'];
  $userName = $_POST['User'];
  $password = $_POST['Pass'];
  // $insert_emp = $emp->insert_Employees($Name, $Address, $Phone, $Email, $DoB, $Status);
}
?>
<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="addEmployee.php">Thêm nhân viên</a>>
  <?php
  if (isset($insert_emp)) {
    echo $insert_emp;
  }
  ?>
</div>
      <form method="POST">
      <h3 class="registerHeader">Thông tin tài khoản</h3>
    <div class="form-group">
      <label for="txtUserName">Tên đăng nhập<label class="redStart">*</label></label>
      <input type="text" class="form-control" id="txtUserName" placeholder="Tên đăng nhập" name="User">
    </div>
    <div class="form-group">
      <label for="texPassword">Mật khẩu<label class="redStart">*</label></label>
      <input type="password" class="form-control" id="txtPassword" placeholder="Mật khẩu" name="Pass">
    </div>
    <div class="form-group">
      <label for="texPassword">Xác nhận mật khẩu<label class="redStart">*</label></label>
      <input type="password" class="form-control" id="txtConfirmPassword" placeholder="Xác nhận lại mật khẩu" name="ConfirmPass">
    </div>
    <h3 class="registerHeader">Thông tin cá nhân</h3>
    <div class="form-group">
      <label for="txtName">Họ Tên<label class="redStart">*</label></label>
      <input type="text" class="form-control" id="txtName" placeholder="Họ tên của bạn" name="Name">
    </div>
    <div class="form-group">
      <label for="txtDOB">Ngày sinh<label class="redStart">*</label></label>
      <input type="date" class="form-control" id="txtDOB" name="DOB">
    </div>
    <div class="form-group">
      <label for="txtPhone">Số Điện thoại<label class="redStart">*</label></label>
      <input type="text" class="form-control" id="txtPhone" placeholder="Số Điện thoại" name="Phone">
    </div>
    <div class="form-group">
      <label for="txtPhone">Ðịa chỉ<label class="redStart">*</label></label>
      <input type="text" class="form-control" id="txtAddress" placeholder="Ðịa chỉ nơi bạn đang sinh sống" name="Address">
    </div>
    <button type="submit" class="btn btn-primary"  name="btnRegister" >Lưu</button>
  </form>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
