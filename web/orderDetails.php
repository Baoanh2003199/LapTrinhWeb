<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/orderDetails.php';
$ordDetail = new OrderDetail();
$UserID = Session::Get('UserId');
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  header('location:404.php');
}
?>
<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="titleMain">
      <h4>Chi tiết đơn hàng: ghi mã đơn hàng</h4>
    </div>
    <div class="cartLeft">
      <div class="cartLeft">
        <?php

        $get_product_order = $ordDetail->showOrderDetail($UerID);
        if ($get_product_order) {
          while ($result = $get_product_order->fetch_assoc()) {
            $productName = $result['ProductName'];
            $Price = $result['Price'];
            $Quantity = $result['Quantity'];
            $totalQuantity += $Quantity;
            $Image = $result['Image'];
            $cusName = $result['Name'];
            $cusAddress = $result['Address'];
            $cusPhone = $result['Phone'];
        ?>
            <div class="itemCart">
              <img style="max-width:120px; max-height:120px;" src="../uploads/<?php echo $Image; ?>" alt="sản phẩm">
              <div class="carDetails">
                <br>
                <div class="row">
                  <div class="col">
                    <a style="font-weight:bold;" href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>"><?php echo $productName; ?></a>
                  </div>
                </div>
              </div>
              <div class="cartAction">
                <br>
                <form action="#" method="GET">
                  <div class="row">
                    <div class="col-4">
                      <a><?php echo number_format($Price) . ' đ' ?> </a>
                    </div>
                    <div class="col-5">
                      <div class="form-group">
                        <input type="number" class="form-control" class="txtNum" name="quantity" value="<?php echo $Quantity ?>" min="1">
                        <input type="hidden" class="form-control" class="cartID" name="cartID" value="<?php echo $result['CartID']; ?>" min="1">
                        <input type="button" class="btn btn-light btnUpdateCart" value="Cập nhật">
                      </div>
                    </div>
                    <div class="col-3">
                      <input type="button" class="btn btn-light" onclick="onclickDeleteCart(<?php echo $result['CartID']; ?> )" value="Xóa">
                    </div>
                  </div>
                </form>
              </div>
              <?php
              $total = $result['Price'] * $result['Quantity'];
              $subTotal += $total; ?>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
    <div class="cartRight">
      <div class="uperRight">
        <span class="subtotal">Tổng</span>
        <span class="subPrice">343434VND</span>
      </div>
      <div class="itemRight">
        <span class="subtotal grandtotal">Thành tiền</span>
        <span class="subPrice grandPrice">343434VND</span><br><br>
        <span>(Đã tính vat)</span>
      </div>
      <div class="itemRight">
        <span class="">Hình thức thanh toán: </span>
      </div>
    </div>
  </div>


</div>
<!-- End Main -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/footer.php';
?>