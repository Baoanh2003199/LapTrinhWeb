<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/user.php';
?>
<?php
class customer
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function insert_customer($Name, $Address, $Phone, $DoB, $userID)
  {
    $Name = $this->fm->valation($Name);
    $Address = $this->fm->valation($Address);
    $Phone = $this->fm->valation($Phone);
    $DoB = $this->fm->valation($DoB);
    $userID = $this->fm->valation($userID);
    //
    $Name = mysqli_real_escape_string($this->db->link, $Name);
    $Address = mysqli_real_escape_string($this->db->link, $Address);
    $Phone = mysqli_real_escape_string($this->db->link, $Phone);
    $DoB = mysqli_real_escape_string($this->db->link, $DoB);
     $userID = mysqli_real_escape_string($this->db->link, $userID);
    if (empty($Name) || empty($Address) || empty($Phone)  || empty($DoB) || empty($userID)) {
      $alert = "catgory must be not empty";
      return $alert;
    } else {
       $sql = "INSERT into Customers(Name,Address,Phone,DoB,Status, UserID) 
       SELECT * From (select '$Name','$Address','$Phone','$DoB','1', '$userID') AS tmp
      WHERE not exists (select * from Customers where UserId = '$userID')";
      $result = $this->db->insert($sql);

      if ($result) {
        $alert = "<span> insert Customers successen</span>";
        return $alert;
      } else {
        $alert = "<span> insert Customers no successen</span>";
        return $alert;
      }
    }
  }
  public function show_Customers()
  {
    $sql = "SELECT c.*, u.UserName, u.UserID from Customers c, User u where u.UserID = c.UserID order by CustomerID";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getCusID($id)
  {
    $sql = "SELECT * from Customers c, User u where  CustomerID='$id' 
    and c.UserID = u.UserID";
    $result = $this->db->select($sql);
    return $result;
  }
  public function update_Customers($Name, $Address, $Phone, $Email, $City, $DoB, $Status, $id)
  {
    $id = $this->fm->valation($id);
    $Name = $this->fm->valation($Name);
    $Address = $this->fm->valation($Address);
    $Phone = $this->fm->valation($Phone);
    $Email = $this->fm->valation($Email);
    $City = $this->fm->valation($City);
    $DoB = $this->fm->valation($DoB);
    $Status = $this->fm->valation($Status);

    $id = mysqli_real_escape_string($this->db->link, $id);
    $Name = mysqli_real_escape_string($this->db->link, $Name);
    $Address = mysqli_real_escape_string($this->db->link, $Address);
    $Phone = mysqli_real_escape_string($this->db->link, $Phone);
    $Email = mysqli_real_escape_string($this->db->link, $Email);
    $City = mysqli_real_escape_string($this->db->link, $City);
    $DoB = mysqli_real_escape_string($this->db->link, $DoB);
    $Status = mysqli_real_escape_string($this->db->link, $Status);

    if (empty($Name) || empty($Address) || empty($Phone) || empty($Email) || empty($City) || empty($DoB) || empty($Status)) {
      $alert = "Customers must be not empty";
      return $alert;
    } else {
      $sql = "UPDATE Customers set Name='$Name'and Address='$Address' and Phone='$Phone'  and Email='$Email' and City='$City' and DoB='$DoB' and Status='$Status' where CustomerID='$id' ";
      $result = $this->db->update($sql);

      if ($result) {
        $alert = "<span> update Customers successen</span>";
        return $alert;
      } else {
        $alert = "<span> update Customers no successen</span>";
        return $alert;
      }
    }
  }
  public function del_Customers($id, $userID)
  {
    $sql = "DELETE FROM Customers  WHERE CustomerID='$id'";
    $user = new User();
    $deleteUser = $user->deleteUser($userID);
    if($user){
         $result = $this->db->delete($sql);
      if ($result) {
        $alert = "<span> delete Customers successen</span>";
        return $alert;
      } else {
        $alert = "<span> delete Customers no successen</span>";
        return $alert;
      }
    }else{
      return false;
    }
   
  }
}
?>
