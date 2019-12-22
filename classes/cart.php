<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
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

  public function Add_to_cart($id,$quantity,$UserID)
  {
      $quantity = $this->fm->valation($quantity);
      $quantity = mysqli_real_escape_string($this->db->link,$quantity);
      $id = mysqli_real_escape_string($this->db->link,$id);
      $sID = session_id();
      $query = "SELECT * FROM Products where ProductID='$id'";
      $result = $this->db->select($query)->fetch_assoc();
      $productName = $result['ProductName'];
      $Price = $result['Price'];
      $Image = $result['Img'];
      $query_insert = "INSERT INTO Cart(ProductID,ProductName,Quantity,sID,Image,Price,UserID) VALUES('$id','$productName','$quantity','$sID','$Image','$Price','$UserID')";
      $query_check = "SELECT * FROM Cart where ProductID='$id' AND sID = '$sID'";
      $check_exists = $this->db->select($query_check);
      if($check_exists || $UserID == '0')
      {
        $msg = "Sản phẩm đã nằm trong giỏ hàng vui lòng thay đổi số lượng nếu cần thiết ";
        return $msg;
      }
      else
      {
        $insert_cart = $this->db->insert($query_insert);
        if($insert_cart)
        {
          header("Location:cart.php");
        }
        else
        {
          header("Location:index.php");
        }
      }

  }

  public function get_product_cart($UserID)
  {
    $query = "SELECT * FROM Cart where UserID = '$UserID'";
    $result = $this->db->select($query);
    return $result;
  }
    public function getProductCartBySID($sessionID)
  {
    $query = "SELECT * FROM Cart where sID = '$sessionID'";
    $result = $this->db->select($query);
    return $result;
  }
   public function deleteCart($cartID)
  {
    $query = "DELETE from Cart where cartID = '$cartID'";
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
}