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
    $Category = mysqli_real_escape_string($this->db->link, $data['CategoryID']);
    $Supplier = mysqli_real_escape_string($this->db->link, $data['SupplierID']);

    $permited = array('jpg', 'png', 'jpeg', 'gif');
    $file_Name = $files['Img']['name'];
    $file_size = $files['Img']['size'];
    $file_temp = $files['Img']['tmp_name'];

    $div = explode('.', $file_Name);
    $file_ext = strtolower(end($div));
    $unique_img = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_file = $_SERVER['DOCUMENT_ROOT']. '/LapTrinhWeb/uploads/'.$unique_img;
    if (empty($ProductName) || empty($Price) || empty($Origin) || empty($file_Name) || empty($Description) || empty($Status)) {
      $alert = "Products must be not empty";
      return $alert;
    } else {
       
      move_uploaded_file($file_temp, $upload_file);
       
      $sql = "INSERT into Products(ProductName, Price,Views, SellNumber, Origin, Img, Description, CategoryID, SupplierID, Status) values('$ProductName','$Price','0','0','$Origin','$unique_img','$Description','$Category','$Supplier','$Status')";

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
    $sql = "SELECT p.*, c.CategoryID, s.SupplierID from Products p ,Categories c,Suppliers s where p.ProductID='$id' and p.CategoryID=c.CategoryID and p.SupplierID=s.SupplierID";
    $result = $this->db->select($sql);
    return $result;
  }

  public function show_pro_supp($idPro, $idSupp)
  {
    $sql = "SELECT  * from Products p,Supplier s WHERE p.ProductID='$idPro' and s.SupplierID='$idSupp' LIMIT 6";
    $result = $this->db->select($sql);
    return $result;
  }
  public function showProductBySupID($idSupp)
  {
    $sql = "SELECT  p.* from Products p WHERE  p.SupplierID='$idSupp'";
    $result = $this->db->select($sql);
    return $result;
  }
    public function showProductByCateID($cateID)
  {
    $sql = "SELECT  p.* from Products p WHERE  p.CategoryID='$cateID'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function showNewProductByCateID($cateID,$ProductID)
  {
    $sql = "SELECT  p.* from Products p WHERE  p.CategoryID='$cateID' and p.ProductID <> '$ProductID' Order by ProductID DESC LIMIT 4";
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
    $Category = mysqli_real_escape_string($this->db->link, $data['CategoryID']);
    $Supplier = mysqli_real_escape_string($this->db->link, $data['SupplierID']);
    var_dump($data);
    $file_Name = $file['Img']['name'];
    $file_size = $file['Img']['size'];
    $file_temp = $file['Img']['tmp_name'];

    $div = explode('.', $file_Name);
    $file_ext = strtolower(end($div));
    $unique_img = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_file = $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/uploads/'. $unique_img;
    if (empty($ProductName) || empty($Price) ||  empty($Origin) ||  empty($Description) || empty($Status)) {
      $alert = "Products must be not empty";
      return $alert;
    } else {
      move_uploaded_file($file_temp, $upload_file);
      $sql = "UPDATE Products set ProductName='$ProductName', Price='$Price', Origin='$Origin', Img='$unique_img', CategoryID='$Category', SupplierID='$Supplier', Description='$Description', Status='$Status' where ProductID='$id' ";
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
    $result = $this->db->delete($sql);
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
