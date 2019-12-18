<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/session.php';
Session::checklogin();

?>
<?php
class login
{
  private $db;
  private $fm;

  public function _construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function login($User, $Pass)
  {
    $User = $this->fm->valation($User);
    $Pass = $this->fm->valation($Pass);
    //
    $User = mysqli_real_escape_string($this->db->link, $User);
    $Pass = mysqli_real_escape_string($this->db->link, $Pass);

    if (empty($adminUser) || empty($adminPass)) {
      $alert = "user and pass must be not empty";
      return $alert;
    } else {
      $sql = "select * from User u,Roles r where u.RoleId=r.RoleId and UserName=$User and Password=$Pass and r.Rolecode='user'";
      $result = $this->db->select($sql);
      if ($result != false) {
        $value = $result->fetch_assoc();
        Session::set("adminlogin", true);
        Session::set("UserId", $value['UserID']);
        Session::set("User", $value['User']);
        header("Location:index.php");
      } else {
        $alert = "user and pass not match";
        return $alert;
      }
    }
  }
}
?>
