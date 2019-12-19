<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/product.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/category.php';

$pro = new product();
$cat = new category();
?>

<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="leftBlock">
      <h4>Phân loại</h4>
      <ul>
        <a href="">
          <li>Điện thoại</li>
        </a>
        <a href="">
          <li>Laptop</li>
        </a>
        <a href="">
          <li>Phụ kiện</li>
        </a>
        <a href="">
          <li>Máy tính bảng</li>
        </a>
        <a href="">
          <li>Xe</li>
        </a>
      </ul>
    </div>
    <div class="rightBlock">
      <div class="titleMain">
        <h4>ghi tên loại</h4>
      </div>
      <?php
      $show_pro = $pro->show_product();
      if ($show_pro) {
        while ($result = $show_pro->fetch_assoc()) {
      ?>
          <div class="col-sm-3 itemProduct">
            <a href="ProductDetails=<?php echo $result['ProductID']; ?>">
              <img src="../admin/uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
              <br>
              <span class="description"><?php echo $result['ProductName']; ?></span><br>
              <span class="price">Giá: <?php echo $result['ProductName']; ?> vnd</span><br>
              <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
            </a>
          </div>
      <?php
                                          }
                                        }
      ?>
    </div>
  </div>
  <div class="blockDiv">
    <div class="titleMain">
      <h4>Sản phẩm bán chạy</h4>
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
              $show_sell = $pro->show_SellNumber();
              if ($show_sell) {
              while ($result = $show_sell->fetch_assoc()) {
          ?>
              <div class="col-sm-3 itemProduct">
                <a href="ProductDetails=<?php echo $result['ProductID']; ?>">
                  <img src="<?php echo $result['Img']; ?>" class="img_produt" alt="">
                  <br>
                  <span class="description"><?php echo $result['ProductName']; ?></span><br>
                  <span class="price">Giá: <?php echo $result['Price']; ?> vnd</span><br>
                  <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
                </a>

              </div>
          <?php
                }
            }
          ?>
        </div>
        <div class="carousel-item">
          <?php
              $show_sell = $pro->show_SellNumber();
              if ($show_sell) {
              while ($result = $show_sell->fetch_assoc()) {
          ?>
              <div class="col-sm-3 itemProduct">
                <a href="ProductDetails=<?php echo $result['ProductID']; ?>">
                  <img src="../admin/uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
                  <br>
                  <span class="description"><?php echo $result['ProductName'];; ?></span><br>
                  <span class="price">Giá: <?php echo $result['Price']; ?> vnd</span><br>
                  <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
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
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/footer.php';
?>
