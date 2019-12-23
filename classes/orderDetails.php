<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
?>

public class OrderDetails{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }
  public function insertOrderDetails($cartID, $orderID){
  	$cartID = $this->fm->valation($cartID);
    $orderID = $this->fm->valation($orderID);

  	$cartID = mysql_real_escape_string($this->db->link, $cartID);
  	$orderID = mysql_real_escape_string($this->db->link, $orderID);

  	if(empty($cartID) || empty($orderID)){
  		return false;
  	}else{
  		$sql = "INSERT into OrderDetails(CartID, OrderID, Status)
  		values('cartID', 'orderID', '1')";
  		$result = $this->db->insert($sql);

  		return $result;
  	}
  }
  public function showOrderDetail($orderId){
  	$sql = "SELECT p.ProductName, p.Price, c.Quantity, o.OrderId from orderDetails od, Products p, Customers c where od.OrderID = '$orderId' and p.ProductID = c.ProductID and c.CartID = o.CartID";
  	$result = $this->db->select($sql);
  	return $result;
  }
}
