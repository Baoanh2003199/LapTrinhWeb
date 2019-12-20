<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/session.php';
?>
<?php
class login
{
  private $db;
  private $fm;

  public function __construct()
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
    var_dump($User);
    var_dump($Pass);
    if (empty($User) || empty($Pass)) {
      $alert = "user and pass must be not empty";
      return $alert;
    } else {
      $sql = "SELECT * from User where  UserName='$User' and Password='$Pass' and RoleID = '2'";
      $result = $this->db->select($sql);
      
      if ($result) {
        $value = $result->fetch_assoc();
        var_dump($value);
        Session::set("userLogin", 'true');
        Session::set("UserId", $value['UserID']);
        Session::set("User", $value['UserName']);
      } else {
        $alert = "user and pass not match";
        return $alert;
      }
    }
  }
}
?>
