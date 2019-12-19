<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
?>

<?php
class Product
{
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function insert_product($data, $files)
  {
    $ProductName = mysqli_real_escape_string($this->db->link, $data['ProductName']);
    $Price = mysqli_real_escape_string($this->db->link, $data['Price']);
    $Origin = mysqli_real_escape_string($this->db->link, $data['Origin']);
    $Description = mysqli_real_escape_string($this->db->link, $data['Description']);
    $Status = mysqli_real_escape_string($this->db->link, $data['Status']);
    $Category = mysqli_real_escape_string($this->db->link, $data['Category']);
    $Supplier = mysqli_real_escape_string($this->db->link, $data['Supplier']);

    $permited = array('jpg', 'png', 'jpeg', 'gif');
    $file_Name = $_FILES['Img']['name'];
    $file_size = $_FILES['Img']['size'];
    $file_temp = $_FILES['Img']['tmp_name'];

    $div = explode('.', $file_Name);
    $file_ext = strtolower(end($div));
    $unique_img = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_file = "uploads/" . $unique_img;

    if (empty($ProductName) || empty($Price) || empty($Views) || empty($SellNumber) || empty($Origin) || empty($file_Name) || empty($Description) || empty($Status)) {
      $alert = "Products must be not empty";
      return $alert;
    } else {
      move_uploaded_file($file_Name, $upload_file);
      $sql = "INSERT into Products values('$ProductName','$Price',null,null,'$upload_file','$Origin','$unique_img','$Description','$Category','$Supplier','$Status')";

      $result = $this->db->insert($sql);
      if ($result) {
        $alert = "<span> insert Products successen</span>";
        return $alert;
      } else {
        $alert = "<span> insert Products no successen</span>";
        return $alert;
      }
    }
  }

  public function show_product()
  {
    $sql = "SELECT * from Products order by ProductID";
    $result = $this->db->select($sql);
    return $result;
  }
  public function show_productID($id)
  {
    $sql = "SELECT * FROM Products where ProductID='$id'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function show_supplierName()
  {
    $sql = "SELECT s.SupplierName FROM Suppliers s, Products p where s.SupplierID = p.SupplierID";
    $result = $this->db->select($sql);
    return $result;
  }

  public function show_newProduct()
  {
    $sql = "SELECT * FROM Products order by ProductID desc LIMIT 6";
    $result = $this->db->select($sql);
    return $result;
  }

  public function show_SellNumber()
  {
    $sql = "SELECT * FROM Products order by SellNumber asc LIMIT 6";
    $result = $this->db->select($sql);
    return $result;
  }
  public function getProductID($id)
  {
    $sql = "SELECT * from Products p ,Categories c,Suppliers s where p.ProductID='$id' and p.CategoryID=c.CategoryID and p.SupplierID=s.SupplierID";
    $result = $this->db->select($sql);
    return $result;
  }

  public function show_pro_supp($idPro, $idSupp)
  {
    $sql = "SELECT  * from Products p,Supplier s WHERE p.ProductID='$idPro' and s.SupplierID='$idSupp' LIMIT 6";
    $result = $this->db->select($sql);
    return $result;
  }

  public function show_pro_supp_shell($idPro, $idSupp)
  {
    $sql = "SELECT  * from Products p,Supplier s WHERE p.ProductID='$idPro' and s.SupplierID='$idSupp' ORDER BY SellNumber asc LIMIT 6";
    $result = $this->db->select($sql);
    return $result;
  }

  public function update_product($data, $file, $id)
  {
    $ProductName = mysqli_real_escape_string($this->db->link, $data['ProductName']);
    $Price = mysqli_real_escape_string($this->db->link, $data['Price']);
    $Origin = mysqli_real_escape_string($this->db->link, $data['Origin']);
    $Description = mysqli_real_escape_string($this->db->link, $data['Description']);
    $Status = mysqli_real_escape_string($this->db->link, $data['Status']);
    $Category = mysqli_real_escape_string($this->db->link, $data['Category']);
    $Supplier = mysqli_real_escape_string($this->db->link, $data['Supplier']);

    $permited = array('jpg', 'png', 'jpeg', 'gif');
    $file_Name = $_FILES['Img']['name'];
    $file_size = $_FILES['Img']['size'];
    $file_temp = $_FILES['Img']['tmp_name'];

    $div = explode('.', $file_Name);
    $file_ext = strtolower(end($div));
    $unique_img = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_file = "uploads/" . $unique_img;
    if (empty($ProductName) || empty($Price) || empty($Views) || empty($SellNumber) || empty($Origin) || empty($Img) || empty($Description) || empty($Status)) {
      $alert = "Products must be not empty";
      return $alert;
    } else {
      if ($file_size > 2048) {
        echo "<span>image error size big</span>";
      } elseif (in_array($file_ext, $permited) == false) {
        # code...
        echo "<span>you can upload" . implode(',', $permited) . "</span>";
      }
      $sql = "UPDATE Products set ProductName='$ProductName'and Price='$Price' and and Origin='$Origin' and Img='$unique_img' and CategoryID='$Category' and SupplierID='$Supplier' and Description='$Description' and Status='$Status' where ProductID='$id' ";
      $result = $this->db->update($sql);

      if ($result) {
        $alert = "<span> update Products successen</span>";
        return $alert;
      } else {
        $alert = "<span> update Products no successen</span>";
        return $alert;
      }
    }
  }

  public function del_product($id)
  {
    $sql = "DELETE FROM Products  WHERE ProductID='$id'";
    $result = $this->db->delete();
    if ($result) {
      $alert = "<span> delete Products successen</span>";
      return $alert;
    } else {
      $alert = "<span> delete Products no successen</span>";
      return $alert;
    }
  }
}
?>
