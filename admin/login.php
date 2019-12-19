<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/adminlogin.php';
?>
<?php
$class = new adminlogin();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $adminUser = $_POST['adminUser'];
  $adminPass = md5($_POST['adminPass']);

  $login_check = $class->login_admin($adminUser, $adminPass);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link href="../templates/images/logo.jpg" rel="icon" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../templates/vendor/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../templates//resource/login/styleLogin.css" />
  <link rel="stylesheet" href="../templates/vendor/fontawesome-free-5.11.2-web/css/all.css" />
  <title>Login Admin</title>
</head>

<body>
  <div class="main">
    <div class="formLogin">
      <div class="titleLogin">Đăng nhập</div>
      <div class="formlg">
        <form action="login.php" method="POST">
        <?php
        if (isset($login_check)) {
          echo $login_check;
        }
        ?>
        <div class="rowForm">
          <div class="lbName">Tên đăng nhập</div>
          <input type="text" placeholder="Tài khoản" name="adminUser" />
          <i class="fas fa-check"></i>
          <div class="clearFloat"></div>
        </div>

        <div class="rowForm">
          <div class="lbName">Mật khẩu</div>
          <input type="text" placeholder="Mật khẩu" name="adminPass" />
          <i class="fas fa-times"></i>
          <div class="clearFloat"></div>
        </div>
        <center>
        <div class="rowBtn">
          <input type="submit" class="btn btn-primary" value="Đăng nhập" />
          <input type="submit" class="btn btn-danger" value="Trở về" />
        </div>
        </center>
        </form>
      </div>
    </div>
  </div>
  <script src="../templates//vendor/jquery/jquery-3.4.1.min.js"></script>
  <script src="../templates/vendor/js/bootstrap.min.js"></script>
</body>

</html>
