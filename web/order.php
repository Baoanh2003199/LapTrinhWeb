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

<!-- Footer -->
<div id="acountManager">
  <ul>
    <li id="btnLogin"> Đăng nhập</li>
    <li id="btnRegister"> Đăng ký</li>
    <li id=""> Đăng xuất</li>
  </ul>
</div>
<div id="divLogin">
  <span>Đăng nhập</span>
  <form>
    <div class="form-group">
      <label for="exampleInputEmail1">Tên tài khoản</label>
      <input type="text" class="form-control" id="txtUsernamelg" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
      <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mật khẩu</label>
      <input type="password" class="form-control" id="txtPasswordlg" placeholder="Mật khẩu">
    </div>
    <button type="submit" class="btn btn-primary">Đăng nhập</button>
    <button type="button" class="btn btn-light" id="btnDel">Hủy</button>
  </form>
</div>
<div id="divRegister">
  <span>Đăng ký</span>
  <form>
    <div class="form-group">
      <label for="txtUserName">Tên tài khoản</label>
      <input type="text" class="form-control" id="txtUserName" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
    </div>
    <div class="form-group">
      <label for="texPassword">Mật khẩu</label>
      <input type="password" class="form-control" id="texPassword" placeholder="Mật khẩu">
    </div>
    <div class="form-group">
      <label for="txtEmail">Email</label>
      <input type="email" class="form-control" id="txtEmail" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="txtPhone">Số điện thoại</label>
      <input type="text" class="form-control" id="txtPhone" placeholder="Số điện thoại">
    </div>
    <div class="form-group">
      <label for="txtPhone">Địa chỉ</label>
      <input type="text" class="form-control" id="txtAddress" placeholder="Địa chỉ">
    </div>
    <button type="submit" class="btn btn-primary">Đăng ký</button>
    <button type="button" class="btn btn-light" id="btnDelR">Hủy</button>
  </form>
</div>

<?php
include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
