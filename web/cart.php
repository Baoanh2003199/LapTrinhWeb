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
<<<<<<< HEAD


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

<!-- Footer -->
<div id="acountManager">
    <ul>
        <li id="btnLogin" > Đăng nhập</li>
        <li id="btnRegister" > Đăng ký</li>
        <li id="" > Đăng xuất</li>
    </ul>
</div>
<div id="divLogin">
    <span>Đăng nhập</span>
    <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Tên tài khoản</label>
          <input type="text" class="form-control" id="txtUsernamelg" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mật khẩu</label>
          <input type="password" class="form-control" id="txtPasswordlg" placeholder="Mật khẩu">
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
        <button type="button" class="btn btn-light" id="btnDel" >Hủy</button>
      </form>
</div>
<div id="divRegister">
    <span>Đăng ký</span>
    <form>
        <div class="form-group">
          <label for="txtUserName">Tên tài khoản</label>
          <input type="text" class="form-control" id="txtUserName" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
        </div>
        <div class="form-group">
          <label for="texPassword">Mật khẩu</label>
          <input type="password" class="form-control" id="texPassword" placeholder="Mật khẩu">
        </div>
        <div class="form-group">
            <label for="txtEmail">Email</label>
            <input type="email" class="form-control" id="txtEmail" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="txtPhone">Số điện thoại</label>
            <input type="text" class="form-control" id="txtPhone" placeholder="Số điện thoại">
          </div>
          <div class="form-group">
            <label for="txtPhone">Địa chỉ</label>
            <input type="text" class="form-control" id="txtAddress" placeholder="Địa chỉ">
          </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
        <button type="button" class="btn btn-light" id="btnDelR" >Hủy</button>
      </form>
</div>

<div class="footer">
        Lập trình web - Shop bán hàng online
</div>
<script src="../templates//vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="../templates/vendor/js/bootstrap.min.js"></script>
<script src="../templates/resource/web/myscript.js"></script>
<script>
    $(document).ready(function () {
        setReadyDocument();
    });
</script>
<!-- End Footer -->
=======


    </div>
    <div id="paymentDiv">
        <div class="titleMain">
            <h4>Thanh toán</h4>
        </div>
        <div class="leftOrder">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="rightOrder">

        </div>
    </div>
    <!-- End Main -->
<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
