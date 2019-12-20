<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
 ?>
    <!-- Main -->
    <div class="main">
        <div class="blockDiv">
            <div class="titleMain">
                <h4>Giỏ hàng</h4>
            </div>
            <div class="cartLeft">
                <div class="itemCart">
                   <img style="max-height:80px; max-width:80px;"src="../img/product/product1.jpg" alt="sản phẩm">
                    <div class="carDetails">
                    <br>
                    <div class="row">
                    <div class="col">
                    <a>Sản phảm bàn ủi</a>
                    </div>
                    </div>
                    </div>
                    <div class="cartAction">
                        <br>
                        <form action="#" method="GET">
                        <div class="row">
                        <div class="col-4">
                            <a style="min-width:150px;">23232 VNĐ</a>
                        </div>
                        <div class="col-4">
                        <div class="form-group">
                        <input type="number" class= "form-control" id="txtNum" name="txtNum" value="1" min="1" style="min-width:150px;">
                        </div>
                        </div>
                        <div class="col-3">
                        <input type="submit" class="btn btn-light" value="Xóa" style="min-width:80px;">
                        </div>
                        </div>
                        </form> 
                    </div>
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
                    <button type="button" class="btn btn-danger" id="btnOrder" >Thanh toán</button>
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
