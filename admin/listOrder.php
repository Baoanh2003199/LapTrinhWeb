<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/order.php';
?>
<?php
$order = new order();
if (isset($_GET['delID'])) {
  $id = $_GET['delID'];
  $delOrder = $order->del_order($id);
}
?>
<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="listOrder.php">Danh sách đơn đặt hàng</a>>
</div>
<div class="titleForm">Danh sách đơn đặt hàng</div>
<?php
if (isset($delOrder)) {
  echo $delOrder;
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
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">SDT</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <?php
  $show_order = $order->show_order();
  if ($show_order) {
    $i = 0;
    while ($result = $show_order->fetch_assoc()) {
      var_dump($result);
      $i++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $result['Total']; ?></td>
          <td><?php echo $result['Name']; ?></td>
          <td><?php echo $result['Address']; ?></td>
          <td><?php echo $result['Phone']; ?></td>
          <td><?php echo $result['Total']; ?></td>
          <td><?php echo $result['Status']; ?></td>
          <td>
            <a href="updateOrder.php?OrderID=<?php echo $result['OrderID']; ?>" class="btn btn-info">Cập nhật</a>
            <a onclick="return confirm('Bạn có chắc muốn xoá đơn đặt hàng này ?')" href="?delID=<?php $result["OrderID"] ?>" class="btn btn-danger">Xóa</a>
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
