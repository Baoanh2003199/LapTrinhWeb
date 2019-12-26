<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
?>
<?php
class OrderDetail
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }
  public function insertOrderDetails($cartID, $orderID)
  {
    $cartID = $this->fm->valation($cartID);
    $orderID = $this->fm->valation($orderID);

    $cartID = mysqli_real_escape_string($this->db->link, $cartID);
    $orderID = mysqli_real_escape_string($this->db->link, $orderID);

    if (empty($cartID) || empty($orderID)) {
      return false;
    } else {
      $sql = "INSERT into OrderDetails(CartID, OrderID, Status)
      values('$cartID', '$orderID', '1')";
      $result = $this->db->insert($sql);

      return $result;
    }
  }
  public function showOrderDetail($orderId)
  {
    $sql = "SELECT * FROM OrderDetails od, Products p, Cart c,Orders o WHERE od.OrderID = '$orderId' AND p.ProductID = c.ProductID AND c.CartID = od.CartID AND o.OrderID=od.OrderID";
    $result = $this->db->select($sql);
    return $result;
  }
  public function deleteOrderDetail($orderID)
  {
    $sql = "DELETE FROM OrderDetails WHERE OrderID = '$orderID'";
    $result = $this->db->delete($sql);
    return $result;
  }
}

?>