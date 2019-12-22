<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/login.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/customer.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/user.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/lib/session.php';
Session::checkUser();
?>
<?php
$class = new login();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLogin'])) {
  $User = $_POST['User'];
  $Pass = md5($_POST['Pass']);

  $login_check = $class->login($User, $Pass);
  if($login_check){
    echo "<script> confirm('Đăng nhập thành công')</script>";
    // header('location:cart.php');
  }else{
    echo "<script> alert('Đăng nhập thất bại')</script>";
  }

}
?>
<?php
  $register=new user();
  $cuss=new customer();
  if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['btnRegister'])){
    $user = $_POST['User'];
      $Name=$_POST['Name'];
      $Pass=md5($_POST['Pass']);
      $Phone=$_POST['Phone'];
      $Address=$_POST['Address'];
      $DoB=$_POST['DOB'];

      $registerUser=$register->insert_User($user,$Pass);
      if($registerUser){
        $getUserID = $register->findID($user);
        if($getUserID){
          $fetchUserID = $getUserID->fetch_assoc();
        if($fetchUserID){
            $userID = $fetchUserID['UserID'];
          $registerCuss=$cuss->insert_customer($Name,$Address,$Phone,$DoB, $userID);
          if ($registerCuss) {
            echo "<script type='text/javascript'>alert('Đăng ký thành công');</script>";
          }
        }
        }
      }
      else{
         echo "<script type='text/javascript'>alert('Tên đăng nhập đã tồn tại');</script>";
      }
  }
?>
<!-- Footer -->
<div id="acountManager">
<table class="table table-hover"">
  <?php 
      if (Session::checkUser() == false) {
     ?>
     <tr>
    <td id="btnLogin" class="headerTD"> Đăng nhập</td>
    </tr>
    <tr>
    <td id="btnRegister" class="headerTD"> Đăng ký</td>
    </tr>
    <?php 
      }
     ?>
    <?php
          if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            $sID = session_id();
            $ct->deleteCarBySessionID($sID);
            Session::destroy();
            header('location:index.php');
          }
    ?>
    <?php 
      if (Session::checkUser() == true) {
     ?>
     <tr>
    <td id="btnlogOut" class="headerTD"> <a href="index.php?action=logout">Đăng xuất</a> </td>
    </tr>
    <?php 
      }
     ?>

  </table>
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
    <button type="submit" class="btn btn-primary" name="btnLogin" >Ðăng nhập</button>
    <button type="button" class="btn btn-secondary" id="btnDel">Đóng</button>
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
      <input type="text" class="form-control" id="txtName" placeholder="Họ tên của bạn" name="Name">
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
    <button type="submit" class="btn btn-primary"  name="btnRegister" >Ðăng ký</button>
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
     console.log('ok');
     setReadyDocument();
     $('#btnPay').click(function(event) {
        check  =$('#checkLogin').val();
        console.log(check);
        if(check == 1){
          $("#loginModal").modal('show');
        }else{
          setDisplay('#paymentDiv');
        }
    });
     });
</script>
 </body>

 </html>
