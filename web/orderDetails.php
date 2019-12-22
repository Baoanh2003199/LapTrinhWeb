<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/orderDetails.php';
$ordDetail = new OrderDetail();
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
<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
