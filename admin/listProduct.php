<?php
include_once "inc/header.php";
include_once "../classes/product.php";
?>
<?php
$pro = new Product();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $ProductName = $_POST['ProductName'];
  $Price = $_POST['Price'];
  $Views = $_POST['Views'];
  $SellNumber = $_POST['SellNumber'];
  $Origin = $_POST['Origin'];
  $Img = $_POST['Img'];
  $Description = $_POST['Description'];
  $Status = $_POST['Status'];

  $insert_Pro = $pro->insert_product($ProductName, $Price, $Views, $SellNumber, $Origin, $Img, $Description, $Status);
}
?>
<div class="titleRight path">
  <a href="index.html">home</a> >
  <a href="listProduct.php">Danh sách sản phẩm</a>>
</div>
<div class="titleForm">Danh sách sản phẩm</div>
<?php
if (isset($insert_Pro)) {
  echo $insert_Pro;
}
?>
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
      <th scope="col">Tên</th>
      <th scope="col">Giá</th>
      <th scope="col">Nguồn gốc</th>
      <th scope="col">hình ảnh</th>
      <th scope="col">Phân loại</th>
      <th scope="col">Nhà sản xuất</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
        <a href="updateProduct.php" class="btn btn-info">Cập nhật</a>
        <a href="updateCategory.php" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>
<?php
include_once "inc/footer.php";
?>