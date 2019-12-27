<?php
include_once 'inc/header.php';
include_once 'classes/orderDetails.php';
$ordDetail = new OrderDetail();
$UserID = Session::Get('UserId');
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  header('location:404.php');
}
$SHOW_ORDER = $ord->getOrderID($id);
$res = $SHOW_ORDER->fetch_assoc();
$OrderId = $res['OrderID'];
$Status = $res['Status'];
?>
<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="titleMain">
      <h4>Chi Tiết Đơn Đặt Hàng: <?php echo $OrderId ?></h4>
    </div>
      <div class="cartLeft">
        <?php
        $totalQuantity = 0;
        $subTotal = 0;

        $get_product_order = $ordDetail->showOrderDetail($id);
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
          <img style="max-width:120px; max-height:120px;" src="uploads/<?php echo $Image; ?>" alt="sản phẩm">
          <div class="carDetails">
            <br>
            <div class="row">
              <div class="col">
                <a style="font-weight:bold;"
                  href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>"><?php echo $productName; ?></a>
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
                    Số lượng: <label><?php echo $Quantity ?></label>
                  </div>
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
    <div class="cartRight">
      <div class="itemRight">
        <span class="subtotal grandtotal">Tình trạng:</span>
        <span  class="subPrice status" style="<?php
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
                      ?>"><?php switch ($Status) {
                            case '1':
                              echo 'Đang chờ xử lí';
                              break;
                            case '2':
                              echo 'Đang xử lí';
                              break;
                            case '3':
                              echo 'Đang vận chuyển';
                              break;
                            case '4':
                              echo 'Đã nhận hàng';
                              break;
                          } ?></span><br><br>
        <div class="clearFloat"></div>
       <span class="subtotal grandtotal">Tổng tiền:</span>
        <span class="subPrice grandPrice"><?php $grandTotal = $subTotal + ($subTotal * 10 / 100);echo number_format($grandTotal) . ' đ' ?></span><br><br>
      </div>
    </div>


  </div>
  <!-- End Main -->
  <?php
  include_once 'inc/footer.php';
  ?>