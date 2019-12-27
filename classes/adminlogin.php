<?php
$fileName = dirname(__FILE__);
include_once $fileName.'/../lib/database.php';
include_once $fileName.'/../helper/format.php';
include_once $fileName . '/../lib/session.php';
Session::checklogin();

?>
<?php
class adminlogin
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function login_admin($adminUser, $adminPass)
  {
    $adminUser=$this->fm->valation($adminUser);
    $adminPass=$this->fm->valation($adminPass);
    //
    $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
    $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

    if (empty($adminUser) || empty($adminPass)) {
      $alert = "user and pass must not be empty";
      return $alert;
    } else {
      $sql = "SELECT * FROM User u,Roles r WHERE u.RoleId=r.RoleId AND u.UserName='$adminUser' AND u.Password='$adminPass' AND r.Rolecode='admin'";
      $result = $this->db->select($sql);
      if ($result != false) {
        $value = $result->fetch_assoc();
        Session::set("adminlogin", 'true');
        Session::set("AdminId", $value['UserID']);
        Session::set("AdminUser", $value['UserName']);
        header("Location:index.php");
      } else {
        $alert = "user and pass not match";
        return $alert;
      }
    }
  }
}
?>
