<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/category.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/product.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/supplier.php';
?>
<?php
$pro = new Product();
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_FILES["Img"])) {
  $insert_pro = $pro->insert_product($_POST, $_FILES);
}

?>

<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="addProduct.php">Thêm sản phẩm</a>>
  <?php
  if (isset($insert_pro)) {
    echo $insert_pro;
  }
  ?>
</div>
<form action="addProduct.php" method="post" enctype="multipart/form-data">
  <div class="titleForm">Thêm sản phẩm</div>
  <div class="form-group">
    <div class="itemForm">Tên sản phẩm</div>
    <input type="text" class="form-control" name="ProductName" id="exampleInputEmail1" aria-describedby="emailHelp"
      placeholder="Nhập tên sản phẩm" />
  </div>
  <div class="form-group">
    <div class="itemForm">Giá</div>
    <input type="text" name="Price" class="form-control" placeholder="Nhập giá" />
  </div>
  <div class="form-group">
    <div class="itemForm">Nguồn gốc</div>
    <input type="text" class="form-control" name="Origin" placeholder="Nhập nguồn gốc" />
  </div>
  <div class="form-group">
    <div class="itemForm">Hình ảnh</div>

    <img width="200" src="" alt="" id="img">
    <br>
    <input type="file" name="Img" id="uploadImg" />
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
      <option value="<?php echo $result['CategoryID']; ?>"> <?php echo $result['CategoryName']; ?>
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
      <option value="1">Hoạt động</option>
      <option value="2">Ngưng hoạt động</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/footer.php';
?>