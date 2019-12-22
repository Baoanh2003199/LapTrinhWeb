<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/employee.php';
?>
<?php
$emp = new employee();
if (isset($_GET['delID'])) {
  $id = $_GET['delID'];
  $delEmp = $emp->del_supplier($id);
}
?>
<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="listEmployee.php">Danh sách nhân viên</a>>
</div>
<div class="titleForm">Danh sách nhân viên</div>
<?php
if (isset($delEmp)) {
  echo $delEmp;
}
?>
<form class="searchForm">
  <div class="form-group">
    <div class="itemSearch">Tìm kiếm</div>
    <input type="text" class="form-control search" id="" placeholder="tìm kiếm theo tên" />
    <a href=""><i class="fas fa-search"></i></a>
  </div>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Tên tài khoản</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Điện thoại</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <?php
  $show_emp = $emp->show_Employees();
  if ($show_emp) {
    $i = 0;
    while ($result = $show_emp->fetch_assoc()) {
      $i++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $result['Name']; ?></td>
          <td><?php echo $result['Name']; ?></td>
          <td><?php echo $result['Address']; ?></td>
          <td><?php echo $result['Phone']; ?></td>
          <td><?php echo $result['DoB']; ?></td>
          <td><?php echo $result['Status']; ?></td>
          <td>@mdo</td>
          <td>
            <a href="updateEmployee.php?EmployeeID=<?php $result['EmployeeID'] ?>" class="btn btn-info">Cập nhật</a>
            <a onclick="return confirm('Bạn có chắn muốn xoá nhân viên này ?')" href="?delID=<?php $result['EmployeeID'] ?>" class="btn btn-danger">Xóa</a>
          </td>
        </tr>
      </tbody>
  <?php
    }
  }
  ?>
</table>
</div>
</div>
<?php
include_once "inc/footer.php";
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
