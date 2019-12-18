<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
?>
<!-- Main -->
<div class="main">
    <div class="blockDiv">
        <div class="titleMain">
            <h4>Chi tiết đơn hàng: ghi mã đơn hàng</h4>
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
                    <span class="price"> 23232 VND</span><br>
                    <span>Số lượng</span>
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
                    <span class="price"> 23232 VND</span><br>
                    <span>Số lượng</span>
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
                    <span class="price"> 23232 VND</span><br>
                    <span>Số lượng</span>
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
                <span class="">Hình thức thanh toán: </span>
            </div>
        </div>
    </div>


</div>
<!-- End Main -->

<!-- Footer -->
<div id="acountManager">
    <ul>
        <li id="btnLogin"> Đăng nhập</li>
        <li id="btnRegister"> Đăng ký</li>
        <li id=""> Đăng xuất</li>
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
        <button type="button" class="btn btn-light" id="btnDel">Hủy</button>
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
        <button type="button" class="btn btn-light" id="btnDelR">Hủy</button>
    </form>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
