<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/session.php';
Session::checklogin();

?>
<?php
class adminlogin
{
  private $db;
  private $fm;

  public function _construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function login_admin($adminUser, $adminPass)
  {
    $adminUser = $this->fm->valation($adminUser);
    $adminPass = $this->fm->valation($adminPass);
    //
    $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
    $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

    if (empty($adminUser) || empty($adminPass)) {
      $alert = "user and pass must not be empty";
      return $alert;
    } else {
      $sql = "select * from User u,Roles r where u.RoleId=r.RoleId and UserName=$adminUser and Password=$adminPass and r.Rolecode='admin'";
      $result = $this->db->select($sql);
      if ($result != false) {
        $value = $result->fetch_assoc();
        Session::set("adminlogin", true);
        Session::set("UserId", $value['UserID']);
        Session::set("AdminUser", $value['AdminUser']);
        header("Location:index.php");
      } else {
        $alert = "user and pass not match";
        return $alert;
      }
    }
  }
}
?>