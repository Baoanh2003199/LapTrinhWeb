<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/category.php';
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
  echo "<script> alert('Xóa loại sản phẩm thành công');</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['name']) && $_GET['name'] != null) {
  $name = $_GET['name'];
  $searchCategorys = $cat->searchCategory($name);
}
?>

<div class="titleForm">Danh sách loại sản phẩm</div>
<form class="searchForm" method="GET" action="listCategory.php">
  <div class="form-group">
    <div class="itemSearch">Tìm kiếm</div>
    <input type="text" class="form-control search" id="" placeholder="tìm kiếm theo tên" name="name" />
    <input type="submit" id="icon_search" value="tìm kiếm"></input>
  </div>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên loại</th>
      <th scope="col" width="20%">Mô tả</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
  </thead>
  <?php

  if (isset($searchCategorys) && $searchCategorys) {
    $i = 0;
    while ($result = $searchCategorys->fetch_assoc()) {
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
        <a onclick="return confirm('Bạn có chắc muốn xoá loại sản phẩm này ?')"
          href="?delID=<?php echo $result['CategoryID']; ?>" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
  </tbody>
  <?php
    }
  } else {
    ?>
  <?php
    $showCategory = $cat->show_category();
    if ($showCategory) {
      $i = 0;
      while ($result = $showCategory->fetch_assoc()) {
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
        <a onclick="return confirm('Bạn có chắc muốn xoá loại sản phẩm này ?')"
          href="?delID=<?php echo $result['CategoryID']; ?>" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
  </tbody>
  <?php
      }
    }
  }
  ?>
</table>
</div>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/footer.php';
?>