<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/supplier.php';

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
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['name'])  && $_GET['name'] != null) {
  $name = $_GET['name'];
  $searchSupplier = $supplier->searchSupplier($name);
}
?>
<form class="searchForm" method="GET" action="listSupplier.php">
  <div class="form-group">
    <div class="itemSearch">Tìm kiếm</div>
    <input type="text" class="form-control search" name="name" id="" placeholder="tìm kiếm theo tên" />
    <input type="submit" class="icon_search" value="tìm kiếm"></input>
  </div>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên</th>
      <th scope="col" width="25%" >Địa chỉ</th>
      <th scope="col">SDT</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <?php
  if (isset($searchSupplier) && $searchSupplier) {
    $i = 0;
    while ($result = $searchSupplier->fetch_assoc()) {
      $i++;
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $result['SupplierName'] ?></td>
      <td><?php echo $result['Address'] ?></td>
      <td><?php echo $result['Phone'] ?></td>
        <td><?php
              if ($result['Status'] == '1') {
                echo "Hoạt động";
              } else {
                echo "Ngưng hoạt động";
              }
              ?></td>
      <td>
        <a href="updateSupplier.php?SupplierID=<?php echo $result['SupplierID']; ?>" class="btn btn-info">Cập nhật</a>
        <a onclick="return confirm('Bạn có chắc muốn xoá Nhà sản xuất này ?')"
          href="?delID=<?php $result['SupplierID'] ?>" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
  </tbody>
  <?php
    }
  } else {
    ?>
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
        <td><?php
              if ($result['Status'] == '1') {
                echo "Hoạt động";
              } else {
                echo "Ngưng hoạt động";
              }
              ?></td>
      <td>
        <a href="updateSupplier.php?SupplierID=<?php echo $result['SupplierID']; ?>" class="btn btn-info">Cập nhật</a>
        <a onclick="return confirm('Bạn có chắc muốn xoá Nhà sản xuất này ?')"
          href="?delID=<?php $result['SupplierID'] ?>" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
  </tbody>
  <?php
      }
    }
  }
  ?>
</table>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/footer.php';
?>