<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/customer.php';
?>
<?php
$cus = new customer();
if (isset($_GET['delID'])) {
  $id = $_GET['delID'];
  $userId = $_GET['userID'];
  $delCat = $cus->del_Customers($id, $userId);
}
?>
<div class="titleRight path">
  <a href="index.php">home</a> >
  <a href="listCustomer.php">Danh sách khách hàng</a>>
</div>
<div class="titleForm">Danh sách khách hàng</div>
<?php
if (isset($delCat)) {
  echo "<script> alert('Xóa khách hàng thành công');</script>";
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['name'])  && $_GET['name'] != null) {
  $name = $_GET['name'];
  $searchCustomer = $cus->searchCustomer($name);
}
?>
<form class="searchForm" method="GET" action="listCustomer.php">
  <div class="form-group">
    <div class="itemSearch">Tìm kiếm</div>
    <input type="text" class="form-control search" name="name" placeholder="tìm kiếm theo tên" />
    <input type="submit" id="icon_search" value="tìm kiếm"></input>
  </div>
</form>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tên Khách hàng</th>
      <th scope="col">Tên đăng nhập</th>
      <th scope="col" width="15%">Địa chỉ</th>
      <th scope="col">Điện thoại</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Thao tác</th>
    </tr>
  </thead>
  <?php
  //if(isset($seach)){
  //  $search
  //}

  if (isset($searchCustomer) && $searchCustomer) {

    $i = 0;
    while ($result = $searchCustomer->fetch_assoc()) {
      $i++;
  ?>
      <tbody>
        <tr>
          <th scope="row"><?php echo $i; ?></th>
          <td><?php echo $result['Name']; ?></td>
          <td><?php echo $result['UserName']; ?></td>
          <td><?php echo $result['Address']; ?></td>
          <td><?php echo $result['Phone']; ?></td>
          <td><?php echo $result['DoB']; ?></td>
          <td><?php
              if ($result['Status'] == '1') {
                echo "Hoạt động";
              } else {
                echo "Ngưng hoạt động";
              }
              ?></td>
          <td>
            <a href="updateCustomer.php?CustomerID=<?php echo $result['CustomerID']; ?>" class="btn btn-info">Cập nhật</a>
            <a onclick="return confirm('Bạn có chắc muốn xoá khách hàng này ?')" href="?delID=<?php echo $result['CustomerID']; ?>&userID=<?php echo $result['UserID']; ?> " class="btn btn-danger">Xóa</a>
          </td>
        </tr>
      </tbody>
    <?php
    }
  } else {
    ?>
    <?php

    $show_customer = $cus->show_Customers();
    if ($show_customer) {
      $i = 0;
      while ($result = $show_customer->fetch_assoc()) {
        $i++;
    ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $result['Name']; ?></td>
            <td><?php echo $result['UserName']; ?></td>
            <td><?php echo $result['Address']; ?></td>
            <td><?php echo $result['Phone']; ?></td>
            <td><?php echo $result['DoB']; ?></td>
            <td><?php
                if ($result['Status'] == '1') {
                  echo "Hoạt động";
                } else {
                  echo "Ngưng hoạt động";
                }
                ?></td>
            <td>
              <a href="updateCustomer.php?CustomerID=<?php echo $result['CustomerID']; ?>" class="btn btn-info">Cập nhật</a>
              <a onclick="return confirm('Bạn có chắc muốn xoá khách hàng này ?')" href="?delID=<?php echo $result['CustomerID']; ?>&userID=<?php echo $result['UserID']; ?> " class="btn btn-danger">Xóa</a>
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