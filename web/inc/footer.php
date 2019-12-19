<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/login.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/customer.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/user.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/lib/session.php';
Session::checkSession();
?>
<?php
$class = new login();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $User = $_POST['User'];
  $Pass = md5($_POST['Pass']);

  $login_check = $class->login($User, $Pass);
}
?>
<?php
  $register=new user();
  $cuss=new customer();
  if($_SERVER['REQUEST_METHOD']==='POST'){
      $Name=$_POST['Name'];
      $Pass=$_POST['Pass'];
      $Email=$_POST['Email'];
      $Phone=$_POST['Phone'];
      $Address=$_POST['Address'];
      $City=$_POST['city'];
      $DoB=$_POST['DoB'];
      $Status=$_POST['null'];

      $registerUser=$register->insert_User($Name,$Pass);
      $registerCuss=$cuss->insert_category($Name,$Address,$Phone,$Email,$City,$DoB,$Status);
  }
?>
<!-- Footer -->
<div id="acountManager">
  <ul>
    <li id="btnLogin"> Đăng nhập</li>
    <li id="btnRegister"> Đăng ký</li>
    <?php
          if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            Session::destroy();
          }
    ?>
    <li id="?action=logout"> Đăng xuất</li>
  </ul>
  </div>
  <div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đăng nhập</h4>
      </div>
      <div class="modal-body">
      <?php
        if(isset($login_check)){
        echo $login_check;
        }
      ?>
  <form method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên đăng nhập</label>
      <input type="text" class="form-control" id="txtUsernamelg" aria-describedby="emailHelp" name="User" placeholder="Tên đăng nhập">
      <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mật khẩu</label>
      <input type="password" class="form-control" id="txtPasswordlg" placeholder="Mật khẩu" name="Pass">
    </div>
    <button type="submit" class="btn btn-primary">Ðăng nhập</button>
    <button type="button" class="btn btn-secondary" id="btnDelR">Đóng</button>
  </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<div id="registerModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Đăng Ký</h4>
        <?php
      if( isset($registerUser) && isset($registerCuss)){
        echo $registerUser;
        echo $registerCuss;
        }
      ?>
      </div>
      <div class="modal-body">
      <form method="POST">
      <h3 class="registerHeader">Thông tin tài khoản</h3>
    <div class="form-group">
      <label for="txtUserName">Tên đăng nhập<label class="redStart">*</label></label>
      <input type="text" class="form-control" id="txtUserName" aria-describedby="emailHelp" placeholder="Tên đăng nhập" name="User">
    </div>
    <div class="form-group">
      <label for="texPassword">Mật khẩu<label class="redStart">*</label></label>
      <input type="password" class="form-control" id="txtPassword" placeholder="Mật khẩu" name="Pass">
    </div>
    <div class="form-group">
      <label for="texPassword">Xác nhận mật khẩu<label class="redStart">*</label></label>
      <input type="password" class="form-control" id="txtConfirmPassword" placeholder="Xác nhận lại mật khẩu" name="ConfirmPass">
    </div>
    <h3 class="registerHeader">Thông tin cá nhân</h3>
    <div class="form-group">
      <label for="txtName">Họ Tên<label class="redStart">*</label></label>
      <input type="email" class="form-control" id="txtName" placeholder="Họ tên của bạn" name="Name">
    </div>
    <div class="form-group">
      <label for="txtDOB">Ngày sinh<label class="redStart">*</label></label>
      <input type="date" class="form-control" id="txtDOB" name="DOB">
    </div>
    <div class="form-group">
      <label for="txtPhone">Số Điện thoại<label class="redStart">*</label></label>
      <input type="text" class="form-control" id="txtPhone" placeholder="Số Điện thoại" name="Phone">
    </div>
    <div class="form-group">
      <label for="txtPhone">Ðịa chỉ<label class="redStart">*</label></label>
      <input type="text" class="form-control" id="txtAddress" placeholder="Ðịa chỉ nơi bạn đang sinh sống" name="Address">
    </div>
    <button type="submit" class="btn btn-primary">Ðăng ký</button>
    <button type="button" class="btn btn-secondary" id="btnDelR">Đóng</button>
  </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
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
