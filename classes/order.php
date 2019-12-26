<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/classes/orderDetails.php';
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

  public function insert_order($Total, $QuantityProducts, $name, $phone, $address, $userID)
  {
    $Total = $this->fm->valation($Total);
    $QuantityProducts = $this->fm->valation($QuantityProducts);
    $name =  $this->fm->valation($name);
    $phone = $this->fm->valation($phone);
    $address =  $this->fm->valation($address);
    $userID =  $this->fm->valation($userID);
    //
    $Total = mysqli_real_escape_string($this->db->link, $Total);
    $QuantityProducts = mysqli_real_escape_string($this->db->link, $QuantityProducts);
    $name =  mysqli_real_escape_string($this->db->link, $name);
    $phone = mysqli_real_escape_string($this->db->link, $phone);
    $address =  mysqli_real_escape_string($this->db->link, $address);
    $userID =  mysqli_real_escape_string($this->db->link, $userID);

    if (empty($Total) || empty($QuantityProducts) || empty($name) || empty($phone) || empty($address) || empty($userID)) {
      return false;
    } else {
      $sql = "INSERT into Orders( Total,QuantityProducts,Name, Phone, Address, UserID, Status) values('$Total','$QuantityProducts','$name','$phone','$address','$userID', '1')";
      $insert_order = $this->db->insert($sql);
      if ($insert_order) {
        $id = mysqli_insert_id($this->db->link);
        return  $id;
      } else {
        header('location:404.php');
      }
    }
  }
  public function searchOrder($name)
  {
    $sql = "SELECT * FROM Orders WHERE OrderID LIKE '%$name%'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function show_order()
  {
    $sql = "SELECT * FROM Orders o";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getOrderID($id)
  {
    $sql = "SELECT * from Orders where OrderID='$id'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getOrderByUserID($Userid)
  {
    $sql = "SELECT * from Orders where UserID='$Userid'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function confirmationOrder($OrderID)
  {
    $sql = "UPDATE Orders SET Status = '4' Where OrderID='$OrderID'";
    $result = $this->db->update($sql);
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
    $result = $this->db->delete($sql);
    $orderDetails = new OrderDetail();
    if ($result) {
      $orderDetails->deleteOrderDetail($id);
      $alert = "<span> delete Orders successen</span>";
      return $alert;
    } else {
      $alert = "<span> delete Orders no successen</span>";
      return $alert;
    }
  }
  public function updateStatus($OrderID, $status)
  {
    $OrderID = $this->fm->valation($OrderID);
    $status = $this->fm->valation($status);


    $OrderID = mysqli_real_escape_string($this->db->link, $OrderID);
    $status = mysqli_real_escape_string($this->db->link, $status);
    if (empty($OrderID) || empty($status)) {
      return false;
    } else {
      $status = intval($status);

      $status = $status + 1;
      $sql = "UPDATE Orders set Status = '$status' where  OrderID ='$OrderID' ";
      $result = $this->db->insert($sql);

      return $result;
    }
  }
  function generateCode($origin, $num)
  {
    $result = $origin;
    $i = 1;
    $n = $num;
    while ((int) $n / 10 != 0) {
      $i++;
      $n  = (int) $n / 10;
    }
    $j = 5 - $i;
    while ($j != 0) {
      $result .= '0';
      $j--;
    }
    $result .= $num;

    return $result;
  }
}
?>