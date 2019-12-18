<?php
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/classes/category.php';
?>

<?php
if (!isset($_GET['CategoryID']) || $_GET['CategoryID'] == null) {
  echo "<script> window.loaction='updateCategory.php'</script>";
} else {
  $id = $_GET['CategoryID'];
}
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $catName = $_POST['CategoryName'];
  $catDescription = $_POST['Description'];
  $catStatus = $_POST['Status'];
  $updateCat = $cat->update_category($catName, $catDescription, $catStatus, $id);
}
?>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/admin/inc/header.php';
?>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="updateCategory.php">Cập nhật loại sản phẩm</a>>
</div>
<?php
if (isset($updateCat)) {
  echo $updateCat;
}
?>
<?php
$get_Name = $cat->getCatID($id);
if ($get_Name) {
  while ($resulut = $get_Name->fetch_assoc()) {
    ?>
    <form action="" method="POST">
      <div class="titleForm">Cập nhật loại sản phẩm</div>
      <div class="form-group">
        <div class="itemForm">Loại sản phẩm</div>
        <input type="text" value="<?php echo $resulut['CategoryName']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên loại" />
      </div>
      <div class="form-group">
        <div class="itemForm">Mô tả</div>
        <textarea name="<?php echo $resulut['Status']; ?>" id="" cols="100" rows="5" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <div class="itemForm">Trạng thái</div>
        <br />
        <select name="Status" id="" class="form-control">
          <?php
              $cat = new category();
              $cat_list = $cat->show_category();
              if ($cat_list) {
                while ($result = $cat_list->fetch_assoc()) {
                  ?>
              <option value="<?php echo $result['CategoryID'] ?>"> <?php $result['Status'] ?></option>
          <?php
                }
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
include_once $_SERVER['DOCUMENT_ROOT'].'.LapTrinhWeb/admin/inc/footer.php';
?>
