<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
?>
<?php
  class User
  {
    private $db;
    private $fm;

    public function __construct()
    {
      $this->db = new Database();
      $this->fm = new Format();
    }
    public function insert_User($Name,$pass){
      $Name=$this->fm->valation($Name);
      $Pass=$this->fm->valation($Pass);

      $Name=mysqli_real_escape_string($this->db->link,$Name);
      $Pass=mysqli_real_escape_string($this->db->link,$Pass);

      if(empty($Name) || empty($Pass)){
        $alert="user must be not empty";
        return $alert;
      }else{
        $sql="INSERT INTO user(UserName, Password, RoleID) VALUES($Name,$Pass,'user')";
        $result=$this->db->insert($sql);
        if($result){
          $alert="<span>insert user successen </span>";
          return $alert;
        }else{
          $alert="<span>insert no successen</span>";
          return $alert;
        }
      }
    }
  }

?>
