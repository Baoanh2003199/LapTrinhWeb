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
                <span class="productName">Bàn Ủi Khô Philips HD1172</span><br>
                <span class="detailsViews"> 2 lượt xem</span>
                <span class="detailsViews last"> 2 đã bán </span><br>
                <div class="divPrice">
                <span class="price"> 230.000 VND</span><br>
                </div>
                <span class="inforProduct">Mô tả: </span><br><br>
                <span class="inforProduct">Nhà sản xuất: </span><br><br>
                <span class="inforProduct">Xuất xứ: </span><br><br>
  
                <form action="#" method="GET">
                <div class="form-group">
                <span class="inforProduct">Số lượng: </span><br>
                    <input type="number" id="txtNum" name="txtNum" min="1" value="1" class="inumber">
                    <button type="submit" class="btn btn-primary" style="width: 200px"> <i class="fas fa-shopping-cart"></i> Chọn mua</button>
                    </div>
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

<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
