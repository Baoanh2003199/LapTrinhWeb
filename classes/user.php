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
     public function findID($userName){
      $userName = $this->fm->valation($userName);
      $userName = mysqli_real_escape_string($this->db->link, $userName);
      if(empty($userName)){
          return false;
      }else{
        $sql = "SELECT * FROM User WHERE UserName = '$userName'";
         $result =  $this->db->select($sql);
         return $result;
      }
    }
    public function insert_User($Name,$pass){
      $Name=$this->fm->valation($Name);
      $Pass=$this->fm->valation($pass);

      $Name=mysqli_real_escape_string($this->db->link,$Name);
      $Pass=mysqli_real_escape_string($this->db->link,$Pass);

      if(empty($Name) || empty($Pass)){
        $alert="user must be not empty";
        return $alert;
      }else{

        $getUserID = $this->findID($Name);
        if($getUserID) {
          return false;
        }
        $sql="INSERT INTO User (UserName, Password, RoleID, Status)
            SELECT * FROM (SELECT '$Name', '$Pass', 2, 1) AS tmp
            WHERE NOT EXISTS (
            SELECT * FROM User WHERE UserName = '$Name'
              ) LIMIT 1;";
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
   public function deleteUser($userID){
    $sql = "DELETE From User WHERE UserID='$userID'";
    $result = $this->db->delete($sql);
    return $result;
   }
  }

?>
