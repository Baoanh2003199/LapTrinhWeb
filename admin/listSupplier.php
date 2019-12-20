<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/supplier.php';

?>
<?php
$supplier = new supplier();
if (isset($_GET['delID'])) {
  $id = $_GET['delID'];
  $delSupp = $supplier->del_supplier($id);
}
?>
<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="listSupplier.php">Danh sách nhà sản xuất</a>>
</div>
<div class="titleForm">Danh sách nhà sản xuất</div>
<?php
if (isset($delSupp)) {
  echo $delSupp;
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
      <th scope="col">Tên</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">SDT</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <?php
  $show_supplier = $supplier->show_supplier();
  if ($show_supplier) {
    $i = 0;
    while ($result = $show_supplier->fetch_assoc()) {
      $i++;

      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $result['SupplierName'] ?></td>
          <td><?php echo $result['Address'] ?></td>
          <td><?php echo $result['Phone'] ?></td>
          <td><?php echo $result['Status'] ?></td>
          <td>
            <a href="updateSupplier.php?SupplierID=<?php echo $result['SupplierID']; ?>" class="btn btn-info">Cập nhật</a>
            <a onclick="return confirm('Bạn có chắc muốn xoá Nhà sản xuất này ?')" href="?delID=<?php $result['SupplierID'] ?>" class="btn btn-danger">Xóa</a>
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
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
