<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/session.php';
Session::checkAdmin();
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link href="../templates/images/logo.jpg" rel="icon" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../templates/vendor/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../templates//resource/admin/styleAdmin.css" />
  <link rel="stylesheet" href="../templates/vendor/fontawesome-free-5.11.2-web/css/all.css" />
  <title>Admin Page</title>
</head>

<body>
  <div class="main">
    <div class="left">
      <div class="menuTitle">
        <i class="fas fa-bars"></i>
        Menu
      </div>
      <div class="listMenu">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="parentUL">
            <a href="#">Sản phẩm <i class="fas fa-caret-down"></i></a>
            <ul class="childUL">
              <li><a href="listProduct.php">Danh sách sản phảm</a></li>
              <li><a href="addProduct.php">Thêm sản phẩm</a></li>
            </ul>
          </li>
          <li class="parentUL">
            <a href="#">Loại sản phẩm <i class="fas fa-caret-down"></i></a>
            <ul class="childUL">
              <li>
                <a href="listCategory.php">Danh sách loại sản phẩm</a>
              </li>
              <li>
                <a href="addCategory.php">Thêm loại sản phẩm</a>
              </li>
            </ul>
          </li>
          <li class="parentUL">
            <a href="#">Nhà sản xuất <i class="fas fa-caret-down"></i></a>
            <ul class="childUL">
              <li><a href="listSupplier.php">Danh sách nhà sản xuất</a></li>
              <li><a href="addSupplier.php">Thêm nhà sản xuất</a></li>
            </ul>
          </li>

          <li class="parentUL">
            <a href="#">Đơn hàng <i class="fas fa-caret-down"></i></a>
            <ul class="childUL">
              <li><a href="listOrder.php">Danh sách đơn hàng</a></li>
            </ul>
          </li>
          <li class="parentUL">
            <a href="#">Khách hàng <i class="fas fa-caret-down"></i></a>
            <ul class="childUL">
              <li><a href="listCustomer.php">Danh sách khách hàng</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <div class="right">
      <div class="titleRight panel">
        <div class="titlePage">Admin <?php echo Session::get('adminName'); ?></div>
        <div class="titleName">
          Hello, Admin
          <?php
            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                Session::destroyAdmin();
            }
          ?>
          <a href="?action=logout">Đăng xuất</a>
        </div>
      </div>
