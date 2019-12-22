<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/product.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/lib/session.php';
$UserID = Session::Get('UserId');
$pro = new product();
$id = $_GET['id'];
if($id == 0 || !is_numeric($id))
{
    header("Location:index.php");
}
else
{
    $pro->updateViews($id);
    $product = $pro->showproductByID($id);
    $Getsupplier = $pro->show_supplierName();
    $result = $product->fetch_assoc();
    $Name = $result["ProductName"];
    $Price = $result["Price"];
    $Views = $result["Views"];
    $SellNum = $result["SellNumber"];	
    $Origin = $result["Origin"];	
    $Img = $result["Img"];	
    $Desc = $result["Description"];
    $CateID = $result["CategoryID"];
    $result = $Getsupplier->fetch_assoc();
    $Supplier = $result["SupplierName"]; 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && $UserID)
    {
        $quantity = $_POST['quantity'];
        $AddtoCart = $ct->Add_to_cart($id,$quantity,$UserID);
    }   
}
?>
<!-- Main -->
<div class="main">
    <div class="blockDiv">
        <div class="imgDetails">
            <div class="titleMain">
     
                <h4>Thông tin sản phẩm</h4>
            </div>
            <!--<img src="../img/product/product1.jpg" alt="">
            https://www.anphatpc.com.vn/media/product/29431_g531gd_07_1.jpg-->
            <img src="../uploads/<?php echo $Img;?>" alt="">
            <div class="details">
                <span class="productName"><?php echo $Name;?></span>
                <span class="detailsViews"><?php echo $Views;?> Lượt Xem</span>
                <span class="detailsViews last"> <?php echo $SellNum;?> Đã Bán </span><br>
                <div class="divPrice">
                <span class="price"><?php echo number_format($Price).' đ'?></span><br>
                </div>
                <span class="inforProduct">Mô tả: <?php echo $Desc;?></span><br><br>
                <span class="inforProduct">Nhà sản xuất: <?php echo $Supplier;?></span><br><br>
                <span class="inforProduct">Xuất xứ: <?php echo $Origin;?></span><br><br>
  
                <form action="" method="POST">
                <div class="form-group">
                <span class="inforProduct">Số lượng: </span><br>
                <div class="row">
                    <div class="col-3"> <input type="number" id="txtNum" name="quantity" min="1" value="1" class="inumber form-control"></div>
                    <div class="col"> <button type="submit" name="submit" class="btn btn-primary" style="width: 200px"> <i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button></div>
                </div>
                </div>
                </form>
                <?php 
                if($UserID == false){
                    echo '<span style="color:red;font-size:18px;">Vui lòng đăng nhập để mua hàng</span>';
                }else{
                    if(isset($AddtoCart))
                    {
                        echo $AddtoCart;
                    }     
                }
                   
                ?>
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
                <?php 
                $show_pro = $pro->showNewProductByCateID($CateID,$id);
                if ($show_pro)
                {
                    while ($result = $show_pro->fetch_assoc()) 
                    {
                        $ProName = $result['ProductName'];
                        $Pri = $result['Price'];
                        $Vws = $result['Views'];
                        $Image = $result["Img"];
                        ?>
                        <div class="col-sm-3 itemProduct">
                        <a href="#">
                            <img src="../uploads/<?php echo $Image;?>" class="img_produt" alt="">
                            <br>
                            <span class="description"><?php echo $ProName?></span><br>
                            <span class="price">Giá: <?php echo $Pri?></span><br>
                            <span class="views">Lượt xem: <?php echo $Vws?></span><br>
                        </a>
                    </div>
                    <?php
                    }    
                }
                  ?>
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
