<?php
include_once '../lib/session.php';
include_once '../lib/database.php';
include_once '../helper/format.php';
?>
<?php
class employee
{
  private $db;
  private $fm;

  public function _construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function insert_Employees($empName, $empAddress, $empPhone, $empEmail, $empDoB, $empStatus)
  {
    $empName = $this->fm->valation($empName);
    $empAddress = $this->fm->valation($empAddress);
    $empPhone = $this->fm->valation($empPhone);
    $empEmail = $this->fm->valation($empEmail);
    $empDoB = $this->fm->valation($empDoB);
    $empStatus = $this->fm->valation($empStatus);
    //
    $empName = mysqli_real_escape_string($this->db->link, $empName);
    $empAddress = mysqli_real_escape_string($this->db->link, $empAddress);
    $empPhone = mysqli_real_escape_string($this->db->link, $empPhone);
    $empEmail = mysqli_real_escape_string($this->db->link, $empEmail);
    $empDoB = mysqli_real_escape_string($this->db->link, $empDoB);
    $empStatus = mysqli_real_escape_string($this->db->link, $empStatus);

    if (empty($empName) || empty($empAddress) || empty($empPhone) || empty($empEmail) || empty($empDoB) || empty($empStatus)) {
      $alert = "catgory must be not empty";
      return $alert;
    } else {
      $sql = "INSERT into Employees(Name,Address,Phone,Email,DoB,Status) values('$empName','$empAddress','$empPhone','$empEmail','$empDoB','$empStatus')";
      $result = $this->db->insert($sql);

      if ($result) {
        $alert = "<span> insert Employees successen</span>";
        return $alert;
      } else {
        $alert = "<span> insert Employees no successen</span>";
        return $alert;
      }
    }
  }
  public function show_Employees()
  {
    $sql = "SELECT * from Employees order by EmployeeID";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getEmpID($id)
  {
    $sql = "SELECT * from Employees EmployeeID='$id'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function update_Employees($empName, $empAddress, $empPhone, $empEmail, $empDoB, $empStatus, $id)
  {
    $id = $this->fm->valation($id);
    $empName = $this->fm->valation($empName);
    $empAddress = $this->fm->valation($empAddress);
    $empPhone = $this->fm->valation($empPhone);
    $empEmail = $this->fm->valation($empEmail);
    $empDoB = $this->fm->valation($empDoB);
    $empStatus = $this->fm->valation($empStatus);

    $id = mysqli_real_escape_string($this->db->link, $id);
    $empName = mysqli_real_escape_string($this->db->link, $empName);
    $empAddress = mysqli_real_escape_string($this->db->link, $empAddress);
    $empPhone = mysqli_real_escape_string($this->db->link, $empPhone);
    $empEmail = mysqli_real_escape_string($this->db->link, $empEmail);
    $empDoB = mysqli_real_escape_string($this->db->link, $empDoB);
    $empStatus = mysqli_real_escape_string($this->db->link, $empStatus);
    if (empty($empName) || empty($empAddress) || empty($empPhone) || empty($empEmail) || empty($empDoB) || empty($empStatus)) {
      $alert = "Employee must be not empty";
      return $alert;
    } else {
      $sql = "UPDATE Employee  set Name='$empName' and Address='$empAddress' and Phone='$empPhone' and Email='$empPhone' and DoB='$empDoB' and Status='$empStatus' where EmployeeID='$id' ";
      $result = $this->db->update($sql);

      if ($result) {
        $alert = "<span> update Employees successen</span>";
        return $alert;
      } else {
        $alert = "<span> update Employees no successen</span>";
        return $alert;
      }
    }
  }
  public function del_Employees($id)
  {
    $sql = "DELETE FROM Employees  WHERE EmployeeID='$id'";
    $result = $this->db->delete();
    if ($result) {
      $alert = "<span> delete Employees successen</span>";
      return $alert;
    } else {
      $alert = "<span> delete Employees no successen</span>";
      return $alert;
    }
  }
}
?>