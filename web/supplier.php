<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/product.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/Supplier.php';

$pro = new product();
$supp = new supplier();

if (isset($_GET['SupplierID']) || $_GET['SupplierID'] == null) {
   $idSupp = $_GET['SupplierID'];
   $getSupName = $supp->getSupplierID($idSupp);
   $supName = $getSupName->fetch_assoc();
}
?>

<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="leftBlock">
      <h4>Nhà sản xuất</h4>
      <ul>
        <?php
          $show_supp = $supp->show_supplier();
          if ($show_supp) {
          while ($result = $show_supp->fetch_assoc()) {
        ?>
        <a href="supplier.php?SupplierID=<?php echo $result['SupplierID']; ?>">
          <li><?php echo $result['SupplierName']; ?></li>
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
            if(isset($idSupp) && isset($supName)){

         ?>
        <h4><?php echo $supName['SupplierName']; ?></h4>
        <?php 
          }
         ?>
      </div>
      <div class="myRow">
        <?php
      if(isset($idSupp)){
         $showProSupp = $pro->showProductBySupID($idSupp);
        if ($showProSupp) {
        while ($result = $showProSupp->fetch_assoc()) {
      ?>
          <div class="col-sm-3 itemProduct">
            <a href="#">
              <img src="../uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
              <br>
              <span class="description"><?php echo $result['ProductName']; ?></span><br>
              <span class="price">Giá: <?php echo number_format($result['Price']).' đ'; ?></span><br>
              <span class="views">Lượt xem:<?php echo $result['Views']; ?></span><br>
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

</div>

</div>
</div>

<!-- End Main -->

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/web/inc/footer.php';
?>
