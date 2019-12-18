<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
?>

<!-- Main -->
<div class="main">
    <div class="blockDiv">
        <div class="imgDetails">
            <div class="titleMain">
                <h4>Thông tin sản phẩm</h4>
            </div>
            <img src="../img/product/product1.jpg" alt="">
            <div class="details">
                <span class="productName">Sản phảm bàn ủi</span><br>
                <span class="detailsViews"> 2 lượt xem</span>
                <span class="detailsViews last"> 2 đã bán </span><br><br>
                <span class="price"> 23232 VND</span><br>
                <span class="inforProduct">Mô tả: </span><br><br>
                <span class="inforProduct">Nhà sản xuất: </span><br><br>
                <span class="inforProduct">Xuất xứ: </span><br><br>
                <form action="#" method="GET">
                    <input type="number" id="txtNum" name="txtNum">
                    <input type="submit" class="btn btn-light" value="Thêm vào giỏ hàng">
                </form>
            </div>
            <div class="clearFloat"></div>
        </div>
    </div>

    <div class="blockDiv">
        <div class="titleMain">
            <h4>Sản phẩm cùng loại</h4>
        </div>
        <div class="row">

        </div>
        <div id="newSlide" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../img/product/product1.jpg" class="img_produt" alt="">
                            <br>
                            <span class="description">Sản phảm 1</span><br>
                            <span class="price">Giá: 777 vnd</span><br>
                            <span class="views">Lượt xem:</span><br>
                        </a>
                    </div>
                    <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../img/product/product1.jpg" class="img_produt" alt="">
                            <br>
                            <span class="description">Sản phảm 1</span><br>
                            <span class="price">Giá: 777 vnd</span><br>
                            <span class="views">Lượt xem:</span><br>
                        </a>
                    </div>
                    <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../img/product/product1.jpg" class="img_produt" alt="">
                            <br>
                            <span class="description">Sản phảm 1</span><br>
                            <span class="price">Giá: 777 vnd</span><br>
                            <span class="views">Lượt xem:</span><br>
                        </a>
                    </div>
                    <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../img/product/product1.jpg" class="img_produt" alt="">
                            <br>
                            <span class="description">Sản phảm 1</span><br>
                            <span class="price">Giá: 777 vnd</span><br>
                            <span class="views">Lượt xem:</span><br>
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../img/product/product1.jpg" class="img_produt" alt="">
                            <br>
                            <span class="description">Sản phảm 1</span><br>
                            <span class="price">Giá: 777 vnd</span><br>
                            <span class="views">Lượt xem:</span><br>
                        </a>
                    </div>
                    <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../img/product/product1.jpg" class="img_produt" alt="">
                            <br>
                            <span class="description">Sản phảm 1</span><br>
                            <span class="price">Giá: 777 vnd</span><br>
                            <span class="views">Lượt xem:</span><br>
                        </a>
                    </div>
                    <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../img/product/product1.jpg" class="img_produt" alt="">
                            <br>
                            <span class="description">Sản phảm 1</span><br>
                            <span class="price">Giá: 777 vnd</span><br>
                            <span class="views">Lượt xem:</span><br>
                        </a>
                    </div>
                    <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../img/product/product1.jpg" class="img_produt" alt="">
                            <br>
                            <span class="description">Sản phảm 1</span><br>
                            <span class="price">Giá: 777 vnd</span><br>
                            <span class="views">Lượt xem:</span><br>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#newSlide" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#newSlide" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

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
