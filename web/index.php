<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/product.php';
$pro = new Product();
?>

<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="titleMain">
      <h4>Sản phẩm bán chạy</h4>
    </div>
    <div class="row">

    </div>
    <div id="productSlide" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?php
          $show_product = $pro->show_SellNumber();
          if ($show_product) {
            while ($result = $show_product->fetch_assoc()) {
          ?>
          <div class="col-sm-3 itemProduct">
            <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
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
      </div>
    </div>
  </div>
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#productSlide" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#productSlide" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</div>

<div class="blockDiv">
  <div class="titleMain">
    <h4>Sản phẩm mới</h4>
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
            $SHOW_NEW = $pro->show_newProduct();
            if ($SHOW_NEW) {
            while ($result = $SHOW_NEW->fetch_assoc()) {
        ?>
        <div class="col-sm-3 itemProduct">
          <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
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
