<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/category.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/product.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/supplier.php';
?>
<?php
$pro = new Product();
if ($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['submit'])) {
  $insert_pro = $pro->insert_product($_POST,$_FILES);
}

?>
</div>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="addProduct.html">Thêm sản phẩm</a>>
  <?php
  if (isset($insert_pro)) {
    echo $insert_pro;
  }
  ?>
</div>
<form enctype="multipart/form-data" method="POST">
  <div class="titleForm">Thêm sản phẩm</div>
  <div class="form-group">
    <div class="itemForm">Tên sản phẩm</div>
    <input type="text" class="form-control" name="ProductName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên loại" />
  </div>
  <div class="form-group">
    <div class="itemForm">Giá</div>
    <input type="text" name="Price" class="form-control" id="" aria-describedby="" placeholder="Nhập giá" />
  </div>
  <div class="form-group">
    <div class="itemForm">Nguồn gốc</div>
    <input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập nguồn gốc" />
  </div>
  <div class="form-group">
    <div class="itemForm">Hình ảnh</div>
    <input type="file" name="Img" />
  </div>
  <div class="form-group">
    <div class="itemForm">Phân loại</div>
    <br />
    <select name="CategoryID" id="" class="form-control">
      <?php
      $cat = new category();
      $cat_list = $cat->show_category();
      if ($cat_list) {
        while ($result = $cat_list->fetch_assoc()) {
          ?>
          <option value="<?php echo $result['CategoryID'] ?>"> <?php $result['CategoryName'] ?></option>
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
        while ($result = $supp_list->fetch_assoc()) {
          ?>
          <option value="<?php echo $result['SupplierID']; ?>"><?php echo $result['SupplierName']; ?></option>
      <?php
        }
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <div class="itemForm">Mô tả</div>
    <textarea name="Description" id="" cols="100" rows="5" class="form-control"></textarea>
  </div>

  <div class="form-group">
    <div class="itemForm">Trạng thái</div>
    <br />
    <select name="Status" id="" class="form-control">
      <?php
      $product = new Product();
      $pro_list = $product->show_product();
      if ($pro_list) {
        while ($resut = $supp_list->fetch_assoc()) {
          ?>
          <option value="<?php echo $result['ProductID'] ?>"><?php echo $result['ProductName']; ?></option>
      <?php
        }
      }
      ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
