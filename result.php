<?php
  include_once 'inc/header.php';
  include_once 'lib/session.php';
  $UserID = Session::get('UserId');
  $sID = session_id();
  $pro = new Product();
  if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['txtSearch']) && $_GET['txtSearch'] != null){
    $name = $_GET['txtSearch'];

  }else{
    header('location:index.php');
  }
 ?>

    <!-- Main -->
    <div class="main">
        <div class="blockDiv">
        <center>
        <h1 class="headingSearch"> Kết quả tìm kiếm </h1>
        </center>
          <div class="myRow">
      <?php
      if(isset($name)){
        $show_product = $pro->search($name);
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
    </div>
<!-- End Main -->



<?php
  include_once 'inc/footer.php';
?>
