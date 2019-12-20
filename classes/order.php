<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
?>
<?php
class order
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function insert_order($Total, $QuantityProducts, $Note, $Status)
  {
    $Total = $this->fm->valation($Total);
    $QuantityProducts = $this->fm->valation($QuantityProducts);
    $Note = $this->fm->valation($Note);
    $Status = $this->fm->valation($Status);
    //
    $Total = mysqli_real_escape_string($this->db->link, $Total);
    $QuantityProducts = mysqli_real_escape_string($this->db->link, $QuantityProducts);
    $Note = mysqli_real_escape_string($this->db->link, $Note);
    $Status = mysqli_real_escape_string($this->db->link, $Status);

    if (empty($Total) || empty($QuantityProducts) || empty($Note) || empty($Status)) {
      $alert = "catgory must be not empty";
      return $alert;
    } else {
      $sql = "INSERT into Orders(Total,QuantityProducts,Note,Status) values('$Total',''$QuantityProducts,'$Note','$Status')";
      $result = $this->db->insert($sql);

      if ($result) {
        $alert = "<span> insert Orders successen</span>";
        return $alert;
      } else {
        $alert = "<span> insert Orders no successen</span>";
        return $alert;
      }
    }
  }
  public function show_order()
  {
    $sql = "SELECT o.*, cs.Name,cs.Phone, count(os.OrderID) as countQuantity FROM Orders o ,OrderDetails os, Cart ca,Customers cs WHERE o.OrderID=os.OrderID AND ca.CartID=os.CartID and ca.CustomerID=cs.CustomerID";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getOrderID($id)
  {
    $sql = "SELECT * from Orders where OrderID='$id'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function update_order($Total, $QuantityProducts, $Note, $Status, $id)
  {
    $id = $this->fm->valation($id);
    $Total = $this->fm->valation($Total);
    $QuantityProducts = $this->fm->valation($QuantityProducts);
    $Note = $this->fm->valation($Note);
    $Status = $this->fm->valation($Status);

    $id = mysqli_real_escape_string($this->db->link, $id);
    $Total = mysqli_real_escape_string($this->db->link, $Total);
    $QuantityProducts = mysqli_real_escape_string($this->db->link, $QuantityProducts);
    $Note = mysqli_real_escape_string($this->db->link, $Note);
    $Status = mysqli_real_escape_string($this->db->link, $Status);

    if (empty($Total) || empty($QuantityProducts) || empty($Note) || empty($Status)) {
      $alert = "Orders must be not empty";
      return $alert;
    } else {
      $sql = "UPDATE Orders SET Total='$Total' AND $QuantityProducts='$QuantityProducts' AND Note='$Note' AND Status='$Status' where OrderID='$id'";
      $result = $this->db->update($sql);

      if ($result) {
        $alert = "<span> update Orders successen</span>";
        return $alert;
      } else {
        $alert = "<span> update Orders no successen</span>";
        return $alert;
      }
    }
  }
  public function del_order($id)
  {
    $sql = "DELETE FROM Orders  WHERE OrderID='$id'";
    $result = $this->db->delete();
    if ($result) {
      $alert = "<span> delete Orders successen</span>";
      return $alert;
    } else {
      $alert = "<span> delete Orders no successen</span>";
      return $alert;
    }
  }
}
?>
