<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/order.php';
?>
<?php
$order = new order();
if (isset($_GET['delID'])) {
  $id = $_GET['delID'];
  $delOrder = $order->del_order($id);
}
if (isset($_GET['orderID']) && $_GET['orderID'] != null && isset($_GET['status']) && $_GET['status'] != null) {
  $id = $_GET['orderID'];
  $status = $_GET['status'];
  $order->updateStatus($id, $status);
  if ($order) {
    echo "false";
  }
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
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['name'])  && $_GET['name'] != null) {
  $name = $_GET['name'];
  $searchOrder = $order->searchOrder($name);
}
?>
<form class="searchForm" method="GET" action="listOrder.php">
  <div class="form-group">
    <div class="itemSearch">Tìm kiếm</div>
    <input type="text" class="form-control search" name="name" id="" placeholder="tìm kiếm theo tên" />
    <input type="submit" id="icon_search" value="tìm kiếm"></input>
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
  if (isset($searchOrder) && $searchOrder) {
    $i = 0;
    while ($result = $searchOrder->fetch_assoc()) {
      $i++;
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $result['Total']; ?></td>
      <td><?php echo $result['Name']; ?></td>
      <td width="15%"><?php echo $result['Address']; ?></td>
      <td><?php echo $result['Phone']; ?></td>
      <td><?php echo $result['Total']; ?></td>
      <td><?php
              if ($result['Status'] == 1) {

              ?>
        <a href="listOrder.php?orderID=<?php echo $result['OrderID']; ?>&status=<?php echo $result['Status']; ?>   ">Chờ
          xử lý</a>
        <?php
              }
              if ($result['Status'] == 2) {

            ?>
        <a href="listOrder.php?orderID=<?php echo $result['OrderID']; ?>&status=<?php echo $result['Status']; ?>">Đang
          xử lý</a>
        <?php
              }
              if ($result['Status'] == 3) {
                echo "Đang giao hàng";
            ?>
        <?php
              }
              if ($result['Status'] == 4) {
                echo "Đã nhận hàng";
              }
            ?>
      </td>
      <td>
        <a href="updateOrder.php?OrderID=<?php echo $result['OrderID']; ?>" class="btn btn-info">Cập nhật</a>
        <a <?php if ($result['Status'] == 4) { ?>
          onclick="return confirm('Bạn có chắc muốn xoá đơn đặt hàng này ?')<?php echo 'return false'; ?> " <?php } ?>
          href="<?php if ($result['Status'] == 4) { ?>?delID=<?php echo $result["OrderID"]; ?><?php } else echo ''; ?>"
          disabled="true" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
  </tbody>
  <?php
    }
  } else {
    ?>
  <?php
    $show_order = $order->show_order();
    if ($show_order) {
      $i = 0;
      while ($result = $show_order->fetch_assoc()) {
        $i++;
    ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $result['Total']; ?></td>
      <td><?php echo $result['Name']; ?></td>
      <td width="15%"><?php echo $result['Address']; ?></td>
      <td><?php echo $result['Phone']; ?></td>
      <td><?php echo $result['Total']; ?></td>
      <td><?php
                if ($result['Status'] == 1) {

                ?>
        <a href="listOrder.php?orderID=<?php echo $result['OrderID']; ?>&status=<?php echo $result['Status']; ?>   ">Chờ
          xử lý</a>
        <?php
                }
                if ($result['Status'] == 2) {

              ?>
        <a href="listOrder.php?orderID=<?php echo $result['OrderID']; ?>&status=<?php echo $result['Status']; ?>">Đang
          xử lý</a>
        <?php
                }
                if ($result['Status'] == 3) {
                  echo "Đang giao hàng";
              ?>
        <?php
                }
                if ($result['Status'] == 4) {
                  echo "Đã nhận hàng";
                }
              ?>
      </td>
      <td>
        <a href="updateOrder.php?OrderID=<?php echo $result['OrderID']; ?>" class="btn btn-info">Cập nhật</a>
        <a <?php if ($result['Status'] == 4) { ?>
          onclick="return confirm('Bạn có chắc muốn xoá đơn đặt hàng này ?')<?php echo 'return false'; ?> " <?php } ?>
          href="<?php if ($result['Status'] == 4) { ?>?delID=<?php echo $result["OrderID"]; ?><?php } else echo ''; ?>"
          disabled="true" class="btn btn-danger">Xóa</a>
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