<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../templates/vendor/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../templates/vendor/fontawesome-free-5.11.2-web/css/all.css" />
  <link rel="stylesheet" href="../templates/resource/web/Stylesheet.css">
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
        <a href="#">Shop online</a>
      </div>
      <div class="rightUp">
        <div class="btnHeader" id="btnAcount">
          <a href="">
            <i class="fas fa-user-circle"></i>
            Tài khoản
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
      <input type="text" name="txtSearch">
      <div class="btnSearch">
        <a href="#"> <i class="fas fa-search" id="iconSearch"></i></a>

      </div>
    </div>
    <div class="cart">
      <div class="btnHeader sCart">
        <a href="cart.php">
          <i class="fas fa-shopping-cart"></i>
          <span class='badge badge-warning' id='lblCartCount'> 5 </span>
          Giỏ hàng
        </a>
      </div>
    </div>
  </div>
  <div class="clearFloat"></div>
  <div class="menu">
    <ul>
      <li> <a href="index.php">Trang chủ</a> </li>
      <li> <a href="category.php">Danh mục sản phẩm</a> </li>
      <li> <a href="supplier.php"> Nhà sản xuất</a></li>
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
