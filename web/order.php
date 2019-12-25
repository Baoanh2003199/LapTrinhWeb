<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/lib/session.php';
$UserID = Session::Get('UserId');
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
          $SHOW_ORDER = $ord->getOrderByUserID($UserID);
          if ($SHOW_ORDER) 
          {
            $i=0;
            while($result = $SHOW_ORDER->fetch_assoc())
            {
              $i++;
              $orderID = $result['OrderID'];
              $QuantityPro = $result['QuantityProducts'];
              $Status = $result['Status'];
              $Total = $result['Total'];
            ?>
          <tr class="headerTD" onclick="window.location.href='orderDetails.php?id=<?php echo $orderID;?>'" title="Click để xem chi tiết đơn đặt hàng" >
            <th scope="row"><?php echo $i ?></th>
            <td><?php echo $orderID; ?></td>
            <td><?php echo $QuantityPro; ?></td>
            <td style="<?php
            switch($Status){
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
            ?>"
            >
            <?php 
            switch($Status){
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
                Đã giao hàng
                ';
                break;
            }
            
            ?></td>
            <td style="color: green;"><?php echo number_format($Total).' VNĐ'; ?></td>
            <td>
              <button type="button" class="btn btn-success" title="Click để xác nhận đã nhận hàng"<?php if($Status != '3') {echo 'style="display: none;"';}?>><a href=""></a>Xác nhận đơn đặt hàng </button>
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
