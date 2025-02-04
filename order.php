<?php
include_once 'inc/header.php';
include_once 'lib/session.php';
$UserID = Session::Get('UserId');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm']) && isset($_POST['confirmID'])) {
  $orderid_conf = $_POST['confirmID'];
  $Confirmation = $ord->confirmationOrder($orderid_conf);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['txtSearch']) && $_GET['txtSearch'] != null) {
  $name = $_GET['txtSearch'];
  $search = $ord->searchOrder($name);
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
        <tbody>
          <?php
          if (isset($search) && $search) {
            $i = 0;
            while ($result = $search->fetch_assoc()) {
              $i++;
              $orderID = $result['OrderID'];
              $QuantityPro = $result['QuantityProducts'];
              $Status = $result['Status'];
              $Total = $result['Total'];
          ?>
          <tr class="headerTD" onclick="window.location.href='orderDetails.php?id=<?php echo $orderID; ?>'"
            title="Click để xem chi tiết đơn đặt hàng">
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $orderID; ?></td>
            <td><?php echo $QuantityPro; ?></td>
            <td style="<?php
                            switch ($Status) {
                              case '1':
                                echo 'color:red;';
                                break;
                              case '2':
                                echo 'color:yellow;';
                                break;
                              case '3':
                                echo 'color:blue;';
                                break;
                              case '4':
                                echo 'color:green;';
                                break;
                            }
                            ?>">
              <?php
                  switch ($Status) {
                    case '1':
                      echo 'Đang chờ xử lí';
                      break;
                    case '2':
                      echo 'Đang xử lí';
                      break;
                    case '3':
                      echo 'Đang giao hàng';
                      break;
                    case '4':
                      echo 'Đã nhận hàng';
                      break;
                  }
                  ?></td>
            <td style="color: green;"><?php echo number_format($Total) . ' VNĐ'; ?></td>
            <td>
              <form action="" method="POST">
                <input type="hidden" class="form-control" name="confirmID" value="<?php echo $orderID; ?>">
                <button name="confirm" type="submit" class="btn btn-success" title="Click để xác nhận đã nhận hàng"
                  <?php if ($Status != '3') {echo 'style="display: none;"';} ?>>Xác nhận đã nhận hàng </button>
              </form>
            </td>
          </tr>
          <?php
            }
          } else {
            ?>
          <?php
            $SHOW_ORDER = $ord->getOrderByUserID($UserID);
            if ($SHOW_ORDER) {
              $i = 0;
              while ($result = $SHOW_ORDER->fetch_assoc()) {
                $i++;
                $orderID = $result['OrderID'];
                $QuantityPro = $result['QuantityProducts'];
                $Status = $result['Status'];
                $Total = $result['Total'];
            ?>
          <tr class="headerTD" onclick="window.location.href='orderDetails.php?id=<?php echo $orderID; ?>'"
            title="Click để xem chi tiết đơn đặt hàng">
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $orderID; ?></td>
            <td><?php echo $QuantityPro; ?></td>
            <td style="<?php
                              switch ($Status) {
                                case '1':
                                  echo 'color:red;';
                                  break;
                                case '2':
                                  echo 'color:yellow;';
                                  break;
                                case '3':
                                  echo 'color:blue;';
                                  break;
                                case '4':
                                  echo 'color:green;';
                                  break;
                              }
                              ?>">
              <?php
                    switch ($Status) {
                      case '1':
                        echo 'Đang chờ xử lí';
                        break;
                      case '2':
                        echo 'Đang xử lí';
                        break;
                      case '3':
                        echo 'Đang giao hàng';
                        break;
                      case '4':
                        echo '
                Đã nhận hàng
                ';
                        break;
                    }
                    ?></td>
            <td style="color: green;"><?php echo number_format($Total) . ' VNĐ'; ?></td>
            <td>
              <form action="" method="POST">
                <input type="hidden" class="form-control" name="confirmID" value="<?php echo $orderID; ?>">
                <button name="confirm" type="submit" class="btn btn-success" title="Click để xác nhận đã nhận hàng"
                  <?php if ($Status != '3') {
                                                                                                                            echo 'style="display: none;"';
                                                                                                                          } ?>>Xác nhận đơn đặt hàng </button>
              </form>
            </td>
          </tr>
          <?php
              }
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
include_once 'inc/footer.php';
?>