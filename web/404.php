<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/header.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/lib/session.php';
  $UserID = Session::Get('UserId');
  $sID = session_id();
 ?>

    <!-- Main -->
    <div class="main">
        <div class="blockDiv">
        <center>
        <h1 style="font-size:32px; font-weight:bold; color:#5aa4e8; margin-top:50px"> LỖI 404: KHÔNG TÌM THẤY </h1>
        <form action = "index.php">
        <button type="submit" class="btn btn-primary" style=" margin:0 auto; margin-top:50px;">Quay lại trang chủ</button>
        </form>
        </center>
         
        </div>
    </div>
<!-- End Main -->



<?php
  include_once $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/web/inc/footer.php';
?>
