<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']))
  {
      $quantity = $_POST['quantity'];
      $AddtoCart = $ct->Add_to_cart($id,$quantity);
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
            $get_product_cart = $ct->get_product_cart();
            if($get_product_cart)
            {  
               
                while($result = $get_product_cart->fetch_assoc())
                {
                    
                    $productName = $result['ProductName'];
                    $Price = $result['Price'];
                    $Quantity = $result['Quantity'];
                    $Image = $result['Image'];
            ?>
                <div class="itemCart">
                   <img  src="../uploads/<?php echo $Image?>" alt="sản phẩm">
                    <div class="carDetails">
                    <br>
                    <div class="row">
                    <div class="col">
                    <a style="font-weight:bold;"><?php echo $productName?></a>
                    </div>
                    </div>
                    </div>
                    <div class="cartAction">
                        <br>
                        <form action="#" method="POST">
                        <div class="row">
                        <div class="col-4">
                            <a><?php echo $Price?> VND</a>
                        </div>
                        <div class="col-5">
                        <div class="form-group">
                        <input type="number" class= "form-control" id="txtNum" name="quantity" value="<?php echo $Quantity?>" min="1">
                        <input type="submit" class="btn btn-light" value="Cập nhật">
                        </div>
                        </div>
                        <div class="col-3">
                        <input type="submit" class="btn btn-light" value="Xóa">
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
                <div class="uperRight">
                    <span class="subtotal">Tổng</span>
                    <span class="subPrice"> <?php  echo $subTotal?></span>
                </div>
                <div class="itemRight">
                    <span class="subtotal grandtotal">Thành tiền</span>
                    <span class="subPrice grandPrice"><?php $grandTotal = $subTotal + ($subTotal * 10/100); echo $grandTotal ?></span><br><br>
                    <span>(Đã tính vat)</span>
                </div>
                <div class="itemRight">
                    <a href="cart.php?login=order"><button type="button" class="btn btn-danger" id="btnPay" >Thanh toán </button></a>
                </div>
            </div>
        </div>

    </div>
    <div id="paymentDiv">
    <div class="titleMain">
        <h4>Thanh toán</h4>
    </div>
    <br><br>
        <span class="orderInfor"> Tổng tiền: 43434 (đã tính VAT)</span><br>
        <span>Tên khách hàng</span> <br>
        <span>Địa chỉ giao hàng: </span> <br>
        <span>Phương thức thanh toán</span>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="paymentMethod" id="offline" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
             Onine
            </label> <br>
            <input class="form-check-input" type="radio" name="paymentMethod" id="online" value="option1" >
            <label class="form-check-label" for="exampleRadios1">
              Offline
            </label>
          </div>
          <br>
          <button type="button" class="btn btn-light"><a href="">Xác nhận</a> </button>
          <button type="button" class="btn btn-light" id="closePayment"> Hủy</button>

          <button type="button" class="btn btn-warning"><a href=""> Cập nhật thông tin khách hàng</a></button>
</div>
<!-- End Main -->

<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
