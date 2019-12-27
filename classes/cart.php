<?php
$fileName = dirname(__FILE__);
include_once $fileName.'/../lib/database.php';
include_once $fileName.'/../helper/format.php';
?>

<?php
class Cart
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function Add_to_cart($id, $quantity, $UserID)
  {
    $quantity = $this->fm->valation($quantity);
    $quantity = mysqli_real_escape_string($this->db->link, $quantity);
    $id = mysqli_real_escape_string($this->db->link, $id);
    $sID = session_id();
    $query = "SELECT * FROM Products where ProductID='$id'";
    $result = $this->db->select($query)->fetch_assoc();
    $productName = $result['ProductName'];
    $Price = $result['Price'];
    $Image = $result['Img'];
    $query_insert = "INSERT INTO Cart(ProductID,ProductName,Quantity,sID,Image,Price,UserID,Status) VALUES('$id','$productName','$quantity','$sID','$Image','$Price','$UserID','1')";
    $query_check = "SELECT * FROM Cart where ProductID='$id' AND UserID = '$UserID' AND Status='1'";
    $check_exists = $this->db->select($query_check);
    if ($check_exists) {
      $msg = "<span style='color:red;font-size:18px;'>Sản phẩm đã nằm trong giỏ hàng</span>";
      return $msg;
    } else {
      $insert_cart = $this->db->insert($query_insert);
      if ($insert_cart) {
        header("Location:cart.php");
      } else {
        header("Location:index.php");
      }
    }
  }

  public function get_product_cart($UserID)
  {
    $query = "SELECT c.*, cus.Name, cus.Address, cus.Phone FROM Cart c, Customers cus where c.UserID = '$UserID' and cus.UserID = c.UserID and c.Status = '1'";
    $result = $this->db->select($query);
    return $result;
  }
  public function getProductCartBySID($sessionID)
  {
    $query = "SELECT c.*, cus.Name, cus.Address, cus.Phone FROM Cart c, Customers cus where c.sID = '$sessionID'
    and cus.UserID = c.UserID";
    $result = $this->db->select($query);
    return $result;
  }
  public function deleteCart($cartID)
  {
    $query = "DELETE from Cart where cartID = '$cartID'";
    $result = $this->db->delete($query);
    return $result;
  }
  public function deleteCartByUserID($UserID)
  {
    $query = "DELETE from Cart where UserID = '$UserID'";
    $result = $this->db->delete($query);
    return $result;
  }

  public function deleteCarBySessionID($sesionId)
  {
    $query = "DELETE from Cart where sID = '$sesionId'";
    $result = $this->db->delete($query);
    return $result;
  }
  public function updateCart($cartID, $sl)
  {
    $query = "UPDATE Cart set Quantity = '$sl' where CartID = '$cartID'";
    $result = $this->db->update($query);
    return $result;
  }

  public function updateStatusCart($cartID, $status)
  {
    $query = "UPDATE Cart set Status = '$status' where CartID = '$cartID'";
    $result = $this->db->update($query);
    return $result;
  }
}