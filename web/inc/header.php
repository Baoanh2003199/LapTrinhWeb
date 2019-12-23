<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/session.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/cart.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/order.php';
ob_start();
$ct = new cart();
$ord = new order();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['delCartID']) && $_GET['delCartID'] != null) {
    $cartID = $_GET['delCartID'];
    $deleteCart = $ct->deleteCart($cartID);
  }
}
$checkLogin = '1';
if (Session::checkUserLogin() != true) {
  $checkLogin = '1';
} else {
  $checkLogin = '2';
}
$Product_Cart = 0;
$count = 0;
$cursor = $ct->get_product_cart(Session::get('UserId'));
if ($cursor) {
  while ($cursor->fetch_assoc()) {
    $count += 1;
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="../templates/images/logo.jpg" rel="icon" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../templates/vendor/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../templates/vendor/fontawesome-free-5.11.2-web/css/all.css" />
  <link rel="stylesheet" href="../templates/resource/web/Stylesheet.css?">
  <title>Shop online</title>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <div class="upHeader">
      <div class="leftUp">
        <a href="https://www.twitter.com"><i class="fab fa-twitter-square"></i></a>
        <a href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
        <a href="https://www.youtube.com"><i class="fab fa-youtube"></i></span></a>
      </div>
      <div class="middleHeader">
        <a href="index.php">Shop online</a>
      </div>
      <div class="rightUp">
        <div class="btnHeader" id="btnAcount">
          <a>
            <i class="fas fa-user-circle"></i>
            <?php
            $username = Session::get('User');
            if ($username == '') {
              echo 'Đăng nhập';
            } else {
              echo $username;
            }
            ?>
          </a>

        </div>
        <div class="btnHeader">
          <a href="order.php">
            <i class="fas fa-shopping-bag"></i>
            Đơn hàng
          </a>
        </div>
      </div>
    </div>
    <div class="searchBar">
      <input type="text" name="txtSearch" class="form-group">
      <div class="btnSearch">
        <a href="#"> <i class="fas fa-search" id="iconSearch"></i></a>

      </div>
    </div>
    <div class="cart">
      <div class="btnHeader sCart">
        <a href="cart.php">
          <i class="fas fa-shopping-cart"></i>
          <?php
          if ($count != 0) {
            echo "<span class='badge badge-warning' id='lblCartCount'> $count </span>";
          }
          ?>
          Giỏ hàng
        </a>
      </div>
    </div>
  </div>
  <div class="clearFloat"></div>
  <div class="menu">
    <ul>
      <li> <a href="index.php">Trang chủ</a> </li>
      <li> <a href="category.php?CateID=1">Danh mục sản phẩm</a> </li>
      <li> <a href="supplier.php?SupplierID=1"> Nhà sản xuất</a></li>
      <li> <a href=""> Liên lạc</a></li>
    </ul>
  </div>
  <div class="slider">
    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="../img/slide/clothes-on-sale-2292953.jpg" alt="Los Angeles">
        </div>
        <div class="carousel-item">
          <img src="../img/slide/man-wearing-pink-polo-shirt-with-text-overlay-1114376.jpg" alt="Chicago">
        </div>
        <div class="carousel-item">
          <img src="../img/slide/silver-iphone-6-on-brown-board-821222.jpg" alt="New York">
        </div>
      </div>

      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>

    </div>
  </div>