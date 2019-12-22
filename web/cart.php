<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/lib/session.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/order.php';
  $UserID = Session::Get('UserId');
  $sID = session_id();
  // if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
  // {
  //     $quantity = $_POST['quantity'];
  //     $AddtoCart = $ct->Add_to_cart($id,$quantity);
  // }
 if($_SERVER['REQUEST_METHOD'] == 'GET' ){
    if(isset($_GET['updateCarID']) && $_GET['updateCarID'] != null && isset($_GET['Quantity']) && $_GET['Quantity'] != null && $_GET['Quantity'] != 0)
    {
        $cartID = $_GET['updateCarID'];
        $quantity = $_GET['Quantity'];
        $deleteCart = $ct->updateCart($cartID, $quantity);
    }
}
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['PaymentConfirm']) && $UserID != null)
    {
        $quantity = $_POST['quantity'];
        $AddtoOrder = $ord->insert_order($id,$quantity,$UserID);
    }   

 ?>

    <!-- Main -->
    <div class="main">
        <div class="blockDiv">
            <div class="titleMain">
                <h4>Giỏ hàng</h4>
            </div>
            <div class="cartLeft">
            <?php 
             $grandTotal = 0;
             $subTotal = 0;
            $get_product_cart = $ct->get_product_cart($UserID);
            if($get_product_cart)
            {  
                while($result = $get_product_cart->fetch_assoc())
                {
                    $productName = $result['ProductName'];
                    $Price = $result['Price'];
                    $Quantity = $result['Quantity'];
                    $Image = $result['Image'];
                    $cusName = $result['Name'];
                    $cusAddress = $result['Address'];
                    $cusPhone = $result['Phone'];
            ?>
                <div class="itemCart">
                   <img  style="max-width:120px; max-height:120px;"src="../uploads/<?php echo $Image?>" alt="sản phẩm">
                    <div class="carDetails">
                    <br>
                    <div class="row">
                    <div class="col">
                    <a style="font-weight:bold;" href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>"><?php echo $productName?></a>
                    </div>
                    </div>
                    </div>
                    <div class="cartAction">
                        <br>
                        <form action="#" method="POST">
                        <div class="row">
                        <div class="col-4">
                            <a><?php echo number_format($Price).' đ'?> </a>
                        </div>
                        <div class="col-5">
                        <div class="form-group">
                        <input type="number" class= "form-control" class="txtNum" name="quantity" value="<?php echo $Quantity?>" min="1">
                        <input type="hidden" class= "form-control" class="cartID" name="cartID" value="<?php echo $result['CartID']; ?>" min="1">
                        <input type="button" class="btn btn-light btnUpdateCart" value="Cập nhật">
                        </div>
                        </div>
                        <div class="col-3">
                        <input type="button" class="btn btn-light" onclick="onclickDeleteCart(<?php echo $result['CartID'];?> )"  value="Xóa">
                        </div>
                        </div>
                        </form>
                    </div>
                    <?php $total = $result['Price'] * $result['Quantity']; $subTotal += $total; ?>
                </div>
                <?php 
                }    
            }
                ?>
            </div>
            <div class="cartRight">
                <div class="itemRight">
                <span class="subtotal grandtotal">Tạm tính:</span>
                    <span class="subPrice grandPrice"><?php echo number_format($subTotal).' đ'?></span><br><br>
                    <span class="subtotal grandtotal">Tổng tiền:</span>
                    <span class="subPrice grandPrice"><?php $grandTotal = $subTotal + ($subTotal * 10/100); echo number_format($grandTotal).' đ'?></span><br><br>
                </div>
                <br><span style="float:right; margin:5px;">(đã +10% VAT)</span><br>
                <div class="itemRight">
                    <input type="hidden" value="<?php echo $checkLogin; ?>" id='checkLogin'>
                   <input type="button" class="btn btn-danger" id="btnPay" value="Thanh toán" />
                </div>
            </div>

        </div>

    </div>
 <?php 
    if(isset($cusName) && $count != 0){
    ?>
    <div id="paymentModal" class="modal fade" role="dialog">
  <div class="modal-dialog mw-100 w-50">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Xác Nhận Thanh Toán</h4>
      </div>
      <div class="modal-body">
      <form action="order.php" method="POST">
        <span style="font-size:18px; font-weight:bold; color:#5aa4e8;">Thông Tin Nhận Hàng </span><br><br>
        <div class="form-group">
        <label>Họ Tên Người Nhận Hàng: </label>
        <input id="txtGuestName" type="text" class="form-control" name="Name" value="<?php echo $cusName ?>">
        </div>
        <div class="form-group">
        <label> Số điện thoại: </label>
        <input id="txtGuestPhone" type="text" class="form-control" name="Phone" value="<?php echo $cusPhone ?>">
        </div>
        <div class="form-group">
        <label> Địa chỉ nhận hàng: </label>
        <input id="txtShippingAddr" type="text" class="form-control" name="Address" value="<?php echo $cusAddress ?>">
        </div>
        <div class="form-group">
        <label> Lời nhắn tới người bán: </label>
        <textarea id="txtareaNote" class="form-control rounded-0" row="3"></textarea>
        </div>

         <br>
        <br>
        <span style="font-size:15px; font-weight:bold; color: #5aa4e8; float:right;"> <?php $grandTotal = $subTotal + ($subTotal * 10/100); echo number_format($grandTotal).' đ'?></span>
        <span class="orderInfor" style="float:right; margin-right:20px"> Tổng tiền (đã +10% VAT): </span> <br>    
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="btnPayConfirm" name="btnPayConfirm" style="float:right; margin-right:15px;">Đặt hàng</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="float:right;"> Hủy</button>
      </div>
      </form>
 
       
    </div>

  </div>
</div>
 <?php 
    }
?>
<!-- End Main -->



<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
