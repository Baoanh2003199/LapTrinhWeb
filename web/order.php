<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
?>

<!-- Main -->
<div class="main">
  <div class="blockDiv">
    <div class="titleMain">
      <h4>Đơn hàng</h4>
    </div>
    <div class="orderList">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Ngày mua</th>
            <th scope="col">Tổng tiền</th>
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
            <td>Otto</td>
            <td>
              <button type="button" class="btn btn-primary"><a href="orderDetails.html">Chi tiết</a> </button>
              <button type="button" class="btn btn-danger" disabled="false">Xóa</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>Otto</td>
            <td>
              <button type="button" class="btn btn-primary"><a href="orderDetails.html">Chi tiết</a> </button>
              <button type="button" class="btn btn-danger" disabled="false">Xóa</button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
            <td>Otto</td>
            <td>
              <button type="button" class="btn btn-primary"><a href="orderDetails.html">Chi tiết</a> </button>
              <button type="button" class="btn btn-danger" disabled="false">Xóa</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- End Main -->

<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
