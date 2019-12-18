<?php
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/classes/employee.php';
?>
<?php
if (!isset($_GET['EmployeeID']) || $_GET['EmployeeID'] == null) {
  echo "<script>window.loacation='updateEmployee.php'</script>";
} else {
  $id = $_GET['EmployeeID'];
}
$emp = new employee();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $empName = $_POST['Name'];
  $empAddress = $_POST['Address'];
  $empPhone = $_POST['Phone'];
  $empEmail = $_POST['Email'];
  $empDoB = $_POST['DoB'];
  $empStatus = $_POST['Status'];
  $updateEmp = $emp->update_Employees($empName, $empAddress, $empPhone, $empEmail, $empDoB, $empStatus, $id);
}
?>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="updateEmployee.php">Cập nhật nhân viên</a>>
  <?php
  if (isset($updateEmp)) {
    echo $updateEmp;
  }
  ?>
</div>
<?php
$get_emp = $em->getEmpID($id);
if ($get_emp) {
  while ($result = $get_emp->fetch_assoc()) {
    ?>
    <form enctype="multipart/form-data">
      <div class="titleForm">Cập nhật nhân viên</div>
      <div class="form-group">
        <div class="itemForm">Tên</div>
        <input type="text" value="<?php echo $result['Name']; ?>" class="form-control" id="" aria-describedby="" readonly />
      </div>
      <div class="form-group">
        <div class="itemForm">Địa chỉ</div>
        <input type="text" value="<?php echo $result['Adddress']; ?>" class="form-control" id="" aria-describedby="" readonly />
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
        <select name="Status  " id="" class="form-control">
          <?php
              $emp = new employee();
              $cat_list = $emp->show_Employees();
              if ($cat_list) {
                while ($result = $cat_list->fetch_assoc()) {
                  ?>
              <option value="<?php echo $result['EmployeeID'] ?>"> <?php $result['Status'] ?></option>
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
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/admin/inc/footer.php';
?>
