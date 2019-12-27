<?php
include_once '../classes/adminlogin.php';
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
  <link href="../templates/images/icon.png" rel="icon" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../templates//resource/login/styleLogin.css?" />
 <script src="https://kit.fontawesome.com/5845faa3cb.js" crossorigin="anonymous"></script>

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
          <div class="clearFloat"></div>
        </div>

        <div class="rowForm">
          <div class="lbName">Mật khẩu</div>
          <input type="password" placeholder="Mật khẩu" name="adminPass" />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script></body>

</html>
