<?php
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/classes/product.php';
?>

<?php
if (!isset($_GET['ProductID']) || $_GET['ProductID'] == null) {
  echo "<script>window.location='updateProduct.php'</script>";
} else {
  $id = $_GET['ProductID'];
}
$product = new Product();
if ($_SERVER[' REQUEST_METHOD'] == 'POST') {

  $updateProd = $product->update_product($_POST,$_FILES,$id);
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
  while ($result = $get_Name->ferch_assoc()) {
    ?>
    <form enctype="multipart/form-data" method="POST">
      <div class="titleForm">Cập nhật sản phẩm</div>
      <div class="form-group">
        <div class="itemForm">Tên sản phẩm</div>
        <input type="text" class="form-control" value="<?php echo $result['ProductName']; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên loại" />
      </div>
      <div class="form-group">
        <div class="itemForm">Giá</div>
        <input type="text" value="<?php echo $result['Price']; ?>" class="form-control" id="" aria-describedby="" placeholder="Nhập giá" />
      </div>
      <div class="form-group">
        <div class="itemForm">Nguồn gốc</div>
        <input type="text" class="form-control" id="" aria-describedby="" placeholder="Nhập nguồn gốc" />
      </div>

      <div class="form-group">
        <div class="itemForm">Hình ảnh</div>

        <input type="file" value="<?php echo $result['Img']; ?>" />
      </div>
      <div class="form-group">
        <div class="itemForm">Phân loại</div>
        <br />
        <select name="" id="" class="form-control">
          <option value="1"> hoạt động</option>
          <option value="2"> tạm ngưng</option>
        </select>
      </div>
      <div class="form-group">
        <div class="itemForm">Nhà sản xuất</div>
        <br />
        <select name="" id="" class="form-control">
          <option value="1"> hoạt động</option>
          <option value="2"> tạm ngưng</option>
        </select>
      </div>
      <div class="form-group">
        <div class="itemForm">Mô tả</div>
        <textarea name="<?php echo $result['Description']; ?>" id="" cols="100" rows="5" class="form-control"></textarea>
      </div>

      <div class="form-group">
        <div class="itemForm">Trạng thái</div>
        <br />
        <select name="" id="" class="form-control">
          <option value="1"> hoạt động</option>
          <option value="2"> tạm ngưng</option>
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
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/admin/inc/footer.php';
?>
