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
<div id="divLogin">
  <span>Đăng nhập</span>
  <?php
  if(isset($login_check)){
    echo $login_check;
  }
  ?>
  <form method="POST">
    <div class="form-group">
      <label for="exampleInputEmail1">Tên tài khoản</label>
      <input type="text" class="form-control" id="txtUsernamelg" aria-describedby="emailHelp" name="User" placeholder="Tên đăng nhập">
      <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Mật khẩu</label>
      <input type="password" class="form-control" id="txtPasswordlg" placeholder="Mật khẩu" name="Pass">
    </div>
    <button type="submit" class="btn btn-primary">Đăng nhập</button>
    <button type="button" class="btn btn-light" id="btnDel">Hủy</button>
  </form>
</div>
<div id="divRegister" method="post">
  <span>Đăng ký</span>
  <?php
      if( isset($registerUser) && isset($registerCuss)){
        echo $registerUser;
        echo $registerCuss;
      }
   ?>
  <form method="POST">
    <div class="form-group">
      <label for="txtUserName">Tên tài khoản</label>
      <input type="text" class="form-control" id="txtUserName" aria-describedby="emailHelp" placeholder="Tên đăng nhập" name="Name">
    </div>
    <div class="form-group">
      <label for="texPassword">Mật khẩu</label>
      <input type="password" class="form-control" id="texPassword" placeholder="Mật khẩu" name="Pass">
    </div>
    <div class="form-group">
      <label for="txtEmail">Email</label>
      <input type="email" class="form-control" id="txtEmail" placeholder="Email" name="Email">
    </div>
    <div class="form-group">
      <label for="txtPhone">Số điện thoại</label>
      <input type="text" class="form-control" id="txtPhone" placeholder="Số điện thoại" name="Phone">
    </div>
    <div class="form-group">
      <label for="txtPhone">Địa chỉ</label>
      <input type="text" class="form-control" id="txtAddress" placeholder="Địa chỉ" name="Address">
    </div>
    <div class="form-group">
      <label for="txtPhone">city</label>
      <input type="text" class="form-control" id="txtAddress" placeholder="city" name="city">
    </div>
    <div class="form-group">
      <label for="txtPhone">DoB</label>
      <input type="text" class="form-control" id="txtAddress" placeholder="DoB" name="DoB">
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
