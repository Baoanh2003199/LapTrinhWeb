<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/category.php';
?>

<?php
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $catName = $_POST['CategoryName'];
  $catDescription = $_POST['Description'];
  $catStatus = $_POST['Status'];

  $insert_cat = $cat->insert_category($catName, $catDescription, $catStatus);
}
?>
<?php
include_once "inc/header.php";
?>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="addCategory.php">Thêm loại sản phẩm</a>>
  <?php
  if (isset($insert_cat)) {
    echo $insert_cat;
  }
  ?>
</div>
<form action="addCategory.php" method="POST">
  <div class="titleForm">Thêm loại sản phẩm</div>
  <div class="form-group">
    <div class="itemForm">Loại sản phẩm</div>
    <input type="text" class="form-control" name="CategoryName" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên loại" />
  </div>
  <div class="form-group">
    <div class="itemForm">Mô tả</div>
    <textarea name="Description" id="" cols="100" rows="5" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <div class="itemForm">Trạng thái</div>
    <br />
    <select name="Status" id="" class="form-control">
      <option value="1"> hoạt động</option>
      <option value="2"> tạm ngưng</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
