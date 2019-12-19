<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
?>
<?php
class supplier
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function insert_supplier($suppName, $suppAddress, $suppPhone, $suppStatus)
  {
    $suppName = $this->fm->valation($suppName);
    $suppAddress = $this->fm->valation($suppAddress);
    $suppPhone = $this->fm->valation($suppPhone);
    $suppStatus = $this->fm->valation($suppStatus);
    //

    $suppName = mysqli_real_escape_string($this->db->link, $suppName);
    $suppAddress = mysqli_real_escape_string($this->db->link, $suppAddress);
    $suppPhone = mysqli_real_escape_string($this->db->link, $suppPhone);
    $suppStatus = mysqli_real_escape_string($this->db->link, $suppStatus);

    if (empty($suppName) || empty($suppAddress) || empty($suppPhone) || empty($suppStatus)) {
      $alert = "catgory must be not empty";
      return $alert;
    } else {
      $sql = "INSERT INTO Suppliers(SupplierName,Address,Phone,Status) values('$suppName','$suppAddress','$suppPhone','$suppStatus')";
      $result = $this->db->insert($sql);

      if ($result) {
        $alert = "<span> insert Suppliers successen</span>";
        return $alert;
      } else {
        $alert = "<span> insert Suppliers no successen</span>";
        return $alert;
      }
    }
  }
  public function show_supplier()
  {
    $sql = "SELECT * from Suppliers order by SupplierID";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getSupplierID($id)
  {
    $sql = "SELECT * from Suppliers SupplierID='$id'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function update_supplier($suppName, $suppAddress, $suppPhone, $suppStatus, $id)
  {
    $suppName = $this->fm->valation($suppName);
    $suppAddress = $this->fm->valation($suppAddress);
    $suppPhone = $this->fm->valation($suppPhone);
    $suppStatus = $this->fm->valation($suppStatus);
    $id = $this->fm->valation($id);

    $suppName = mysqli_real_escape_string($this->db->link, $suppName);
    $suppAddress = mysqli_real_escape_string($this->db->link, $suppAddress);
    $suppPhone = mysqli_real_escape_string($this->db->link, $suppPhone);
    $suppStatus = mysqli_real_escape_string($this->db->link, $suppStatus);

    if (empty($catName) || empty($suppAddress) || empty($suppPhone) || empty($suppStatus)) {
      $alert = "Suppliers must be not empty";
      return $alert;
    } else {
      $sql = "UPDATE Suppliers set SupplierName='$suppName' and Address='$suppAddress' and Phone='$suppPhone' and Status='$suppStatus' where SupplierID='$id' ";
      $result = $this->db->update($sql);

      if ($result) {
        $alert = "<span> update Suppliers successen</span>";
        return $alert;
      } else {
        $alert = "<span> update Suppliers no successen</span>";
        return $alert;
      }
    }
  }
  public function del_supplier($id)
  {
    $sql = "DELETE FROM Suppliers  WHERE SupplierID='$id'";
    $result = $this->db->delete($id);
    if ($result) {
      $alert = "<span> delete Suppliers successen</span>";
      return $alert;
    } else {
      $alert = "<span> delete Suppliers no successen</span>";
      return $alert;
    }
  }
}
?>