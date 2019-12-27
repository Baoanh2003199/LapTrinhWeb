  <?php
include_once 'inc/header.php';
include_once '../classes/category.php';
?>

<?php
if (!isset($_GET['CategoryID']) || $_GET['CategoryID'] == null) {
  echo "<script> window.loaction='updateCategory.php'</script>";
} else {
  $id = $_GET['CategoryID'];
}
$cat = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $catName = $_POST['CategoryName'];
  $catDescription = $_POST['Description'];
  $catStatus = $_POST['Status'];
  $updateCat = $cat->update_category($catName, $catDescription, $catStatus, $id);
}
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
        <input type="text" value="<?php echo $resulut['CategoryName']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên loại" name='CategoryName'/>
      </div>
      <div class="form-group">
        <div class="itemForm">Mô tả</div>
        <textarea name="Description" id="" cols="100" rows="5" class="form-control"><?php echo $resulut['Description']; ?>
        </textarea>
      </div>
      <div class="form-group">
        <div class="itemForm">Trạng thái</div>
        <br />
        <select name="Status" id="" class="form-control">
          <?php 

            if ($resulut['Status'] == '1') {
          
           ?>
           <option value="1" selected="true">Hoạt động</option>
           <option value="2">Ngừng hoạt động</option>
           <?php 
            }else{
            ?>
             <option value="1" >Hoạt động</option>
           <option value="2" selected="true">Ngừng hoạt động</option>
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
