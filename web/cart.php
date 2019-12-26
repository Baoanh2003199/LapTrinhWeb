<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/lib/session.php';
  $UserID = Session::Get('UserId');
  $sID = session_id();
  // if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
  // {
  //     $quantity = $_POST['quantity'];
  //     $AddtoCart = $ct->Add_to_cart($id,$quantity);
  // }
  $grandTotal = 0;
  $subTotal = 0;
  $totalQuantity = 0;

 if($_SERVER['REQUEST_METHOD'] == 'GET' ){
    if(isset($_GET['updateCarID']) && $_GET['updateCarID'] != null && isset($_GET['Quantity']) && $_GET['Quantity'] != null && $_GET['Quantity'] != 0)
    {
        $cartID = $_GET['updateCarID'];
        $quantity = $_GET['Quantity'];
        $deleteCart = $ct->updateCart($cartID, $quantity);
    }
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

            $get_product_cart = $ct->get_product_cart($UserID);
            if($get_product_cart)
            {  
                while($result = $get_product_cart->fetch_assoc())
                {
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
                        <form action="#" method="GET">
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
                <form action="PaymentConfirm.php" method="POST">
                <input id="txtGuestName" type="hidden" class="form-control" name="CustomerName" value="<?php echo $cusName ?>">
                <input id="txtGuestPhone" type="hidden" class="form-control" name="Phone" value="<?php echo $cusPhone ?>">
                <input id="txtShippingAddr" type="hidden" class="form-control" name="Address" value="<?php echo $cusAddress ?>">
                <input id="txtTotalQuantity" type="hidden" class="form-control" name="totalQuantity" value="<?php echo $totalQuantity ?>">
                <input id="txtShippingAddr" type="hidden" class="form-control" name="grandTotal" value="<?php echo $grandTotal ?>">
                <input type="hidden" value="<?php echo $checkLogin; ?>" id='checkLogin'>
                <input type="submit" class="btn btn-danger" id="btnPay" name="paymentConf"
                <?php 
                if ($totalQuantity == 0) {
                    echo 'disabled';
                } ?> value="Thanh toán" />
                </form>
                </div>
            </div>

        </div>

    </div>
<!-- End Main -->



<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
