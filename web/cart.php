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
                    <img src="../img/product/product1.jpg" alt="sản phẩm">
                    <div class="carDetails">
                        <span class="productName">Sản phảm bàn ủi</span>
                        <span class="inforProduct">Nhà sản xuất: </span><br><br>
                        <span class="inforProduct">Xuất xứ: </span><br><br>
                    </div>
                    <div class="cartAction">
                        <br>
                        <form action="#" method="GET">
                            <span class="price"> 23232 VND</span><br>
                            <span>Số lượng</span>
                            <input type="number" id="txtNum" name="txtNum" value="0"><br><br>
                            <input type="submit" class="btn btn-light" value="Cập nhật">
                            <input type="submit" class="btn btn-light" value="Xóa">
                        </form>
                    </div>
                </div>
                <div class="itemCart">
                    <img src="../img/product/product1.jpg" alt="sản phẩm">
                    <div class="carDetails">
                        <span class="productName">Sản phảm bàn ủi</span>
                        <span class="inforProduct">Nhà sản xuất: </span><br><br>
                        <span class="inforProduct">Xuất xứ: </span><br><br>
                    </div>
                    <div class="cartAction">
                        <br>
                        <form action="#" method="GET">
                            <span class="price"> 23232 VND</span><br>
                            <span>Số lượng</span>
                            <input type="number" id="txtNum" name="txtNum" value="0"><br><br>
                            <input type="submit" class="btn btn-light" value="Cập nhật">
                            <input type="submit" class="btn btn-light" value="Xóa">
                        </form>
                    </div>
                </div>
                <div class="itemCart">
                    <img src="../img/product/product1.jpg" alt="sản phẩm">
                    <div class="carDetails">
                        <span class="productName">Sản phảm bàn ủi</span>
                        <span class="inforProduct">Nhà sản xuất: </span><br><br>
                        <span class="inforProduct">Xuất xứ: </span><br><br>
                    </div>
                    <div class="cartAction">
                        <br>
                        <form action="#" method="GET">
                            <span class="price"> 23232 VND</span><br>
                            <span>Số lượng</span>
                            <input type="number" id="txtNum" name="txtNum" value="0"><br><br>
                            <input type="submit" class="btn btn-light" value="Cập nhật">
                            <input type="submit" class="btn btn-light" value="Xóa">
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
