<?php
include_once 'inc/header.php';
include_once 'classes/product.php';
$pro = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['txtSearch']) && $_GET['txtSearch'] != null) {
  $name = $_GET['txtSearch'];
  $search_shell = $pro->search_SellNumber($name);
  $search_new = $pro->search_newProduct($name);
}
?>

<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="titleMain">
      <h4>Sản phẩm bán chạy</h4>
    </div>
    <div class="myRow">
      <?php
      if (isset($search_shell) && $search_shell) {
        $i = 0;
        while ($result = $search_shell->fetch_assoc()) {
      ?>
      <div class="col-sm-3 itemProduct">
        <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
          <img src="uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
          <br>
          <span class="description"><?php echo $result['ProductName']; ?></span><br>
          <span class="price">Giá: <?php echo number_format($result['Price']) . ' đ'; ?></span><br>
          <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
          <span class="views">Đã bán:<?php echo $result['SellNumber']; ?></span><br>
        </a>
      </div>
      <?php
        }
      } else {
        ?>
      <?php
        $show_product = $pro->show_SellNumber();
        if ($show_product) {
          while ($result = $show_product->fetch_assoc()) {
        ?>
      <div class="col-sm-3 itemProduct">
        <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
          <img src="uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
          <br>
          <span class="description"><?php echo $result['ProductName']; ?></span><br>
          <span class="price">Giá: <?php echo number_format($result['Price']) . ' đ'; ?></span><br>
          <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
          <span class="views">Đã bán:<?php echo $result['SellNumber']; ?></span><br>
        </a>
      </div>
      <?php
          }
        }
      }
      ?>
    </div>
  </div>
  <!-- Left and right controls -->

</div>
</div>

<div class="blockDiv">
  <div class="titleMain">
    <h4>Sản phẩm mới</h4>
  </div>
  <div class="myRow">
    <?php
    if (isset($search_new) && $search_new) {
      $i = 0;
      while ($result = $search_new->fetch_assoc()) {
    ?>
    <div class="col-sm-3 itemProduct">
      <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
        <img src="uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
        <br>
        <span class="description"><?php echo $result['ProductName']; ?></span><br>
        <span class="price">Giá: <?php echo number_format($result['Price']) . ' đ'; ?></span><br>

        <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
        <span class="views">Đã bán:<?php echo $result['SellNumber']; ?></span><br>
      </a>
    </div>
    <?php
      }
    } else {
      # code...
      ?>
    <?php
      $SHOW_NEW = $pro->show_newProduct();
      if ($SHOW_NEW) {
        while ($result = $SHOW_NEW->fetch_assoc()) {
      ?>
    <div class="col-sm-3 itemProduct">
      <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
        <img src="uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
        <br>
        <span class="description"><?php echo $result['ProductName']; ?></span><br>
        <span class="price">Giá: <?php echo number_format($result['Price']) . ' đ'; ?></span><br>

        <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
        <span class="views">Đã bán:<?php echo $result['SellNumber']; ?></span><br>
      </a>
    </div>
    <?php
        }
      }
    }
    ?>
  </div>

  <!-- Left and right controls -->


</div>

</div>
</div>
<!-- End Main -->
<?php
include_once 'inc/footer.php';
?>