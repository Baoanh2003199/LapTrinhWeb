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
      <input type="text" class="form-control" id="txtUsernamelg" aria-describedby="emailHelp"
        placeholder="Tên đăng nhập">
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

 <div class="footer">
   Lập trình web - Shop bán hàng online
 </div>
 <script src="../templates//vendor/jquery/jquery-3.4.1.min.js"></script>
 <script src="../templates/vendor/js/bootstrap.min.js"></script>
 <script src="../templates/resource/web/myscript.js"></script>
 <script>
   $(document).ready(function() {
     setReadyDocument();
   });
 </script>

 <!-- End Footer -->
 </body>

 </html>
