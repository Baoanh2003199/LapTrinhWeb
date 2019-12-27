<?php
include_once 'inc/header.php';
include_once '../classes/product.php';
include_once '../classes/supplier.php';
include_once '../classes/category.php';
?>

<?php
if (!isset($_GET['ProductID']) || $_GET['ProductID'] == null) {
  // echo "<script>window.location='updateProduct.php'</script>";
} else {
  $id = $_GET['ProductID'];
}
$product = new Product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
  if(isset($_FILES) &&$_FILES['Img']['name'] != ""  ){
  $updateProd = $product->update_product($_POST,$_FILES,$id);
  }else{
     $updateProd = $product->updateProductNoneImg($_POST,$id);
  }
}
?>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="updateProduct.php">Cập nhật sản phẩm</a>>
  <?php
  if (isset($updateProd)) {
    echo $updateProd;
  }
  ?>
</div>
<?php
$get_Name = $product->getProductID($id);
if (isset($get_Name)) {

  while ($result = $get_Name->fetch_assoc()) {
    ?>
    <form enctype="multipart/form-data" method="POST">
      <div class="titleForm">Cập nhật sản phẩm</div>
      <div class="form-group">
        <div class="itemForm">Tên sản phẩm</div>
        <input type="text" class="form-control" value="<?php echo $result['ProductName']; ?> " name="ProductName" placeholder="Nhập tên loại" />
      </div>
      <div class="form-group">
        <div class="itemForm">Giá</div>
        <input type="text" value="<?php echo $result['Price']; ?>" class="form-control" name="Price" placeholder="Nhập giá" />
      </div>
      <div class="form-group">
        <div class="itemForm">Nguồn gốc</div>
        <input type="text" class="form-control" name="Origin" value="<?php echo $result['Origin']; ?> "  placeholder="Nhập nguồn gốc" />
      </div>

      <div class="form-group">
        <div class="itemForm">Hình ảnh</div>        
           <img width="200"  src="../uploads/<?php echo $result['Img']; ?>" alt="" id="img" >
           <br>
        <input id="uploadImg" name="Img" type="file" value="<?php echo $result['Img']; ?>" />
      </div>
      <div class="form-group">
        <div class="itemForm">Phân loại</div>
        <br />
        <select name="CategoryID" id="" class="form-control">
          <?php
      $cat = new category();
      $cat_list = $cat->show_category();
      if ($cat_list) {
        while ($resultCate = $cat_list->fetch_assoc()) {         
          ?>
          <option <?php if( $resultCate['CategoryID'] == $result['CategoryID'] ) echo "selected='true'"; ?>  value="<?php echo $resultCate['CategoryID']; ?>"> <?php echo $resultCate['CategoryName'];?>
           </option>
      <?php
        }
      }
      ?>
        </select>
      </div>
      <div class="form-group">
        <div class="itemForm">Nhà sản xuất</div>
        <br />
        <select name="SupplierID" id="" class="form-control">
          <?php
      $supp = new supplier();
      $supp_list = $supp->show_supplier();
      if ($supp_list) {
        while ($resultSup = $supp_list->fetch_assoc()) {
          var_dump($resultSup);
          ?>
          <option  value="<?php echo $resultSup['SupplierID']; ?>"><?php echo $resultSup['SupplierName']; ?></option>
      <?php
        }
      }
      ?>
        </select>
      </div>
      <div class="form-group">
        <div class="itemForm">Mô tả</div>
        <textarea name="Description" id="" cols="100" rows="5" class="form-control"><?php echo $result['Description']; ?> 
        </textarea>
      </div>

      <div class="form-group">
        <div class="itemForm">Trạng thái</div>
        <br />
        <select name="Status" id="" class="form-control">
         <?php 
            if($resulut['Status'] === '1' ){
         
           ?>
              <option value="1" selected="true">Hoạt động</option>
              <option value="2">Ngưng hoạt động</option>
          <?php          
            }else{

          ?>
              <option value="1" >Hoạt động</option>
              <option value="2" selected="true">Ngưng hoạt động</option>
          <?php 
          }
           ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
<?php
  }
}
?>
</div>
</div>
<?php 
include_once 'inc/footer.php';
 ?>