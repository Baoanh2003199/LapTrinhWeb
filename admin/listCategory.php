<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/category.php';
?>
<?php
$cat = new category();
if (isset($_GET['delID'])) {
  $id = $_GET['delID'];
  $delCat = $cat->del_category($id);
}

?>
<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="listCategory.php">Danh sách loại sản phẩm</a>>
</div>
<?php
if (isset($delCat)) {
  echo $delCat;
}
?>

<div class="titleForm">Danh sách loại sản phẩm</div>
<form class="searchForm">
  <div class="form-group">
    <div class="itemSearch">Tìm kiếm</div>
    <input type="text" class="form-control search" id="" placeholder="tìm kiếm theo tên" />
    <a href=""><i class="fas fa-search"></i></a>
  </div>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên loại</th>
      <th scope="col" width="20%" >Mô tả</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <?php
  $show_category = $cat->show_category();
  if ($show_category) {
    $i = 0;
    while ($result = $show_category->fetch_assoc()) {
      $i++;
      ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $result['CategoryName']; ?></td>
          <td><?php echo $result['Description']; ?></td>
          <td><?php echo $result['Status']; ?></td>
          <td>
            <a href="updateCategory.php?CategoryID=<?php echo $result['CategoryID']; ?>" class="btn btn-info">Cập nhật</a>
            <a onclick="return confirm('Bạn có chắc muốn xoá Danh mục này ?')" href="?delID=<?php $result['delID'] ?>" class="btn btn-danger">Xóa</a>
          </td>
        </tr>
      </tbody>
  <?php
    }
  }
  ?>
</table>
</div>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
