<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/order.php';
$ord = new order();
?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnPayConfirm'])){
  var_dump($_POST);
}
 ?>
<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="titleMain">
      <h4>Đơn hàng</h4>
    </div>
    <div class="orderList">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Số lượng sản phẩm</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Tổng tiền</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
<<<<<<< HEAD
        <tbody>        
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>Otto</td>
            <td>
              <button type="button" class="btn btn-primary"><a href="orderDetails.php">Chi tiết</a> </button>
              <button type="button" class="btn btn-danger" disabled="false">Xóa</button>
=======
        <tbody>
        <?php
            $SHOW_ORDER = $ord->show_order();
            if ($SHOW_ORDER) {
              $i=0;
            while ($result = $SHOW_ORDER->fetch_assoc()) {
              $i++;
        ?>
          <tr>
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $result['OrderID']; ?></td>
            <td><?php echo $result['QuantityProducts']; ?></td>
            <td><?php echo $result['Status']; ?></td>
            <td><?php echo $result['Total']; ?></td>
            <td>
              <button type="button" class="btn btn-primary"><a href="orderDetails.php?id=<?php $result['OrderID'];?>">Xem chi tiết đơn hàng</a> </button>
>>>>>>> refs/remotes/origin/master
            </td>
          </tr>
          <?php
            }
          }
        ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- End Main -->

<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
