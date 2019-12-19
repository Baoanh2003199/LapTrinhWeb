<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/product.php';
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
  <a href="index.html">home</a> >
  <a href="listProduct.php">Danh sách sản phẩm</a>>
</div>
<div class="titleForm">Danh sách sản phẩm</div>
<?php
if (isset($delPro)) {
  echo $delPro;
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
    <?php
        $show_pro=$pro->show_product();
        if($show_pro){
          $i=0;
          while($resut=$show_pro->fetch_assoc()){
            $i++;
            $description =  $fm->textShorten($resut['Description']);
     ?>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $resut['ProductName']; ?></td>
      <td><?php echo $resut['Price']; ?></td>
      <td><?php echo $resut['Origin']; ?></td>
      <td><img src="uploads/<?php echo $resut['Img']; ?>"/></td>
      <td><?php echo $resut['CategoryID']; ?></td>
      <td><?php echo $resut['SupplierID']; ?></td>
      <td width="15%" ><?php echo $description; ?></td>
      <td>
        <a href="updateProduct.php?ProductID=<?php echo $result['ProductID']; ?>" class="btn btn-info">Cập nhật</a>
        <a onclick="return confirm('are you delete')" href="?delID=<?php $result["ProductID"] ?>" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
    </tr>
    <?php
        }
      }
     ?>
  </tbody>
</table>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
