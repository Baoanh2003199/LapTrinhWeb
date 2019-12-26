<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/product.php';
?>
<?php
$pro = new product();
$fm = new Format();
if (isset($_GET['delID'])) {
  $id = $_GET['delID'];
  $delPro = $pro->del_product($id);
}
?>
<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="listProduct.php">Danh sách sản phẩm</a>>
</div>
<div class="titleForm">Danh sách sản phẩm</div>
<?php
if (isset($delPro)) {
  echo "<script> alert('Xóa sản phẩm thành công');</script>";
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['name'])  && $_GET['name'] != null) {
  $name = $_GET['name'];
  $searchOrder = $pro->search($name);
}
?>
<form class="searchForm" method="GET" action="listProduct.php">
  <div class="form-group">
    <div class="itemSearch">Tìm kiếm</div>
    <input type="text" class="form-control search" name="name" id="" placeholder="tìm kiếm theo tên" />
    <input type="submit" id="icon_search" value="tìm kiếm"></input>
  </div>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col" width="15%">Tên</th>
      <th scope="col">Giá</th>
      <th scope="col" width="10%">Nguồn gốc</th>
      <th scope="col">hình ảnh</th>
      <th scope="col" width="10%">Phân loại</th>
      <th scope="col" width="10%">Nhà sản xuất</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <?php
  if (isset($searchOrder) && $searchOrder) {
    $i = 0;
    while ($resut = $searchOrder->fetch_assoc()) {
      $i++;
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $resut['ProductName']; ?></td>
      <td><?php echo $resut['Price']; ?></td>
      <td><?php echo $resut['Origin']; ?></td>
      <td><img width="100px" src="../uploads/<?php echo $resut['Img']; ?> " /></td>
      <td><?php echo $resut['CategoryID']; ?></td>
      <td><?php echo $resut['SupplierID']; ?></td>
      <td width="15%"><?php echo $description; ?></td>
      <td>
        <a href="updateProduct.php?ProductID=<?php echo $resut['ProductID']; ?> " class="btn btn-info">Cập nhật</a>
        <a onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này ?')"
          href="listProduct.php?delID=<?php echo $resut['ProductID']; ?> " class="btn btn-danger">Xóa</a>
      </td>
    </tr>
    </tr>
  </tbody>
  <?php
    }
  } else {
    ?>
  <?php
    $show_pro = $pro->show_product();
    if ($show_pro) {
      $i = 0;
      while ($resut = $show_pro->fetch_assoc()) {
        $i++;
        $description =  $fm->textShorten($resut['Description']);
    ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $resut['ProductName']; ?></td>
      <td><?php echo $resut['Price']; ?></td>
      <td><?php echo $resut['Origin']; ?></td>
      <td><img width="100px" src="../uploads/<?php echo $resut['Img']; ?> " /></td>
      <td><?php echo $resut['CategoryID']; ?></td>
      <td><?php echo $resut['SupplierID']; ?></td>
      <td width="15%"><?php echo $description; ?></td>
      <td>
        <a href="updateProduct.php?ProductID=<?php echo $resut['ProductID']; ?> " class="btn btn-info">Cập nhật</a>
        <a onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này ?')"
          href="listProduct.php?delID=<?php echo $resut['ProductID']; ?> " class="btn btn-danger">Xóa</a>
      </td>
    </tr>
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