<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/product.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/category.php';
$pro = new product();
$cat = new category();
?>
<?php 
  if (isset($_GET['CateID']) || $_GET['CateID'] == null) {
   $idCate = $_GET['CateID'];
    $getCatName = $cat->getCatID($idCate);
    if($getCatName)
    $catName = $getCatName->fetch_assoc();
}
?>

<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="leftBlock">
      <h4>Phân loại</h4>
      <ul>
        <?php
            $show_cat=$cat->show_category();
            if($show_cat){
              while ($result=$show_cat->fetch_assoc()) {
         ?>
          <a href="category.php?CateID=<?php echo $result['CategoryID']; ?>">
            <li><?php echo $result['CategoryName']; ?></li>
          </a>
        <?php
            }
          }
         ?>
      </ul>
    </div>
    <div class="rightBlock">
      <div class="titleMain">
        <?php 
          if (isset($catName)) {
         ?>
        <h4><?php echo $catName['CategoryName']; ?></h4>
        <?php 
          }
         ?>
      </div>
      <div class="myRow">
         <?php
if(isset($idCate)){
      $show_pro = $pro->showProductByCateID($idCate);
      if ($show_pro) {
        while ($result = $show_pro->fetch_assoc()) {
      ?>
          <div class="col-sm-3 itemProduct">
            <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
              <img src="../uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
              <br>
              <span class="description"><?php echo $result['ProductName']; ?></span><br>
              <span class="price">Giá: <?php echo number_format($result['Price']).' đ'; ?></span><br>
              <span class="views">Lượt xem: <?php echo $result['Views']; ?></span><br>
            </a>
          </div>
      <?php
         }
       }
       }
      ?>
      </div>
     
    </div>
  </div>
<div class="blockDiv">
  <div class="titleMain">
    <h4>Sản phẩm mới</h4>
  </div>
  <div class="myRow">
<?php
            $SHOW_NEW = $pro->show_newProduct();
            if ($SHOW_NEW) {
            while ($result = $SHOW_NEW->fetch_assoc()) {
        ?>
        <div class="col-sm-3 itemProduct">
          <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
            <img  src="../uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
            <br>
            <span class="description"><?php echo $result['ProductName']; ?></span><br>
            <span class="price">Giá: <?php echo number_format($result['Price']).' đ'; ?></span><br>
            <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
          </a>
        </div>
        <?php
            }
          }
        ?>
  </div>
<<<<<<< HEAD
=======
  <div class="blockDiv">
    <div class="titleMain">
      <h4>Sản phẩm mới</h4>
    </div>
    <div class="myRow">
      <?php
      if (isset($searchNew) && $searchNew) {
        while ($result = $searchNew->fetch_assoc()) {
      ?>
      <div class="col-sm-3 itemProduct">
        <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
          <img src="../uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
          <br>
          <span class="description"><?php echo $result['ProductName']; ?></span><br>
          <span class="price">Giá: <?php echo number_format($result['Price']) . ' đ'; ?></span><br>
          <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
        </a>
      </div>
      <?php
        }
      } else {
        ?>
      <?php
        $SHOW_NEW = $pro->show_newProduct();
        if ($SHOW_NEW) {
          while ($result = $SHOW_NEW->fetch_assoc()) {
        ?>
      <div class="col-sm-3 itemProduct">
        <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
          <img src="../uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
          <br>
          <span class="description"><?php echo $result['ProductName']; ?></span><br>
          <span class="price">Giá: <?php echo number_format($result['Price']) . ' đ'; ?></span><br>
          <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
        </a>
      </div>
      <?php
          }
        }
      }
      ?>
    </div>
>>>>>>> e0b50b81ed0fc5b4ed89541c62c6b64fa7634c5a

</div>
<!-- End Main -->
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/footer.php';
?>