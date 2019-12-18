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
            <a href="ProductDetails.php=<?php echo $result['ProductID']; ?>">
              <img src="../admin/uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
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
          <a href="ProductDetails.php=<?php echo $result['ProductID']; ?>">
            <img src="../admin/uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
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
      <input type="text" class="form-control" id="txtUsernamelg" aria-describedby="emailHelp"
        placeholder="Tên đăng nhập">
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
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/footer.php';
?>
