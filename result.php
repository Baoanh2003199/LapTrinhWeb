<?php
  include_once 'inc/header.php';
  include_once 'lib/session.php';
  $UserID = Session::get('UserId');
  $sID = session_id();
  $pro = new Product();
  $cate = new category();
  $sup = new supplier();
  if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['txtSearch']) && $_GET['txtSearch'] != null){
    $name = $_GET['txtSearch'];
    $resultSearch = $pro->search($name);

  }
  if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['btnSearch'])){
    $resultSearch = $pro->searchUltimate($_GET);

  }
 ?>

    <!-- Main -->
    <div class="main">
        <div class="blockDiv">
        <center>
        <h1 class="headingSearch"> Kết quả tìm kiếm </h1>
        </center>
        <div class="leftBlock divSearchLeft">
      <h4>Tìm kiếm</h4>
      <form action="result.php" method="GET">
        <center>
           <span>Tên sản phẩm</span>
        <input type="text" name="ProductName" ><br><br>
        <span>Loại sản phẩm</span>
        <select name="CategoryID" class="optionSearch">
          <option value="">all</option>
          <?php 
            $resultCate = $cate->show_category();
            if($resultCate){
              while($showCate = $resultCate->fetch_assoc( )){

           ?>
          <option value="<?php echo $showCate['CategoryID'] ?> "><?php echo $showCate['CategoryName'];  ?></option>
           <?php 
            }
          }
           ?>
        </select> <br><br>
        <span>Nhà cung cấp</span>
        <select name="SupplierID" class="optionSearch">
          <option value="">all</option>
          <?php 
            $resultSup = $sup->show_supplier();
            if($resultSup){
              while($showSup = $resultSup->fetch_assoc( )){

           ?>
          <option value="<?php echo $showSup['SupplierID'] ?> "><?php echo $showSup['SupplierName'];  ?></option>
           <?php 
            }
          }
           ?>
        </select> <br><br>
         <span>Từ</span>
         <input type="number" min='1' class="priceSearch" name="PriceMin">
          <span>đến</span>
         <input type="number"   min='1' class="priceSearch" name="PriceMax" ><br><br><br>
         <input type="submit" name="btnSearch" class="btn btn-light" value="Tìm kiếm" >
        </center>      
      </form>
    </div>
    <div class="rightBlock divSearchRight">
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
if(isset($resultSearch)){

      if ($resultSearch) {
        while ($result = $resultSearch->fetch_assoc()) {
      ?>
          <div class="col-sm-4 itemProduct">
            <a href="ProductDetails.php?id=<?php echo $result['ProductID']; ?>">
              <img src="uploads/<?php echo $result['Img']; ?>" class="img_produt" alt="">
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
    </div>
<!-- End Main -->



<?php
  include_once 'inc/footer.php';
?>
