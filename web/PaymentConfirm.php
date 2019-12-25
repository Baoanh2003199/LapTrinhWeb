<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/lib/session.php';

  $sID = session_id();
  // if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
  // {
  //     $quantity = $_POST['quantity'];
  //     $AddtoCart = $ct->Add_to_cart($id,$quantity);
  // }
  $grandTotal = 0;
  $totalQuantity = 0;
  if($_SERVER['REQUEST_METHOD'] == 'POST'  && $UserID != null)
  {
    if(isset($_POST['paymentConf']))
    {
      $Addr = $_POST['Address'];
      $Name = $_POST['CustomerName'];
      $Phone = $_POST['Phone'];
      $grandTotal = $_POST['grandTotal'];
      $totalQuantity = $_POST['totalQuantity'];
      
    }
   
  }

 ?>

    <!-- Main -->
    <div class="main">
        <div class="blockDiv">
           <?php     
           if($count == 0)
            {
            header('location:index.php');
            }
            ?>
            <center>
            <h2 style="font-weight:bold; color:#5aa4e8; margin-top:20px">Thông tin nhận hàng</h2>
            </center>
            <form action="order.php" method="POST" style="max-width:400px; margin:0 auto;">
            <div class="form-group">
            <label>Họ tên người nhận</label>
            <input type="text" class="form-control" name="CustName" id="CustNameID" placeholder="Họ tên người nhận hàng" value="<?php echo $Name;?>">
            </div>
            <div class="form-group">
            <label>Số điện thoại người nhận</label>
            <input type="text" class="form-control" name="CustPhone" id="CustPhoneID" placeholder="Số điện thoại người nhận hàng" value="<?php echo $Phone;?>">
            </div>
            <div class="form-group">
            <label>Địa chỉ nhận hàng</label>
            <input type="text" class="form-control" name="CustAddr" id="CustAddrID" placeholder="Địa chỉ nhận hàng" value="<?php echo $Addr;?>">
            </div>
            <div class="form-group">
            <label style="font-size: 20px; float:left;">Tổng số sản phẩm:  &nbsp</label>
            <label style="font-weight:bold; color:#ff6b6b; font-size: 20px;"><?php echo ($totalQuantity); ?> </label>
            <input type="hidden" name="quantity" value="<?php echo ($totalQuantity); ?>">
            <br>
            <label style="font-size: 20px; float:left;">Tổng số tiền:  &nbsp</label>
            <label style="font-weight:bold; color:#ff6b6b; font-size: 20px;"><?php echo number_format($grandTotal).' đ'; ?> </label>
            <input type="hidden" name="total" value="<?php echo ($grandTotal); ?>">
            <br>
            <input id="btnCancel" type="button" class="btn btn-danger" value="Quay lại" style="float:right; margin-bottom:30px;">
            <input name="Confirm" id="btnConfirm" type="submit" class="btn btn-success" value="Đặt hàng" style="float:right; margin-bottom:30px; margin-right:20px">
            </div>
            </form>

        </div>
    </div>
<!-- End Main -->



<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
