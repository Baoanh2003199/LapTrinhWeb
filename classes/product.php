<?php
$fileName = dirname(__FILE__);
include_once $fileName.'/../lib/database.php';
include_once $fileName.'/../helper/format.php';
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
    $upload_file = $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/uploads/' . $unique_img;
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
    $sql = "SELECT * from Products p, Suppliers s, Categories c
    WHERE p.CategoryID = c.CategoryID and s.SupplierID = p.SupplierID order by ProductID";
    $result = $this->db->select($sql);
    return $result;
  }
  public function showproductByID($id)
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
    $sql = "SELECT * FROM Products order by ProductID DESC LIMIT 10";
    $result = $this->db->select($sql);
    return $result;
  }

  public function search_newProduct($name)
  {
    $sql = "SELECT * FROM Products where ProductName like '%$name%' order by ProductID DESC LIMIT 10";
    $result = $this->db->select($sql);
    return $result;
  }

  public function show_SellNumber()
  {
    $sql = "SELECT * FROM Products order by SellNumber DESC LIMIT 10";
    $result = $this->db->select($sql);
    return $result;
  }

  public function search_SellNumber($name)
  {
    $sql = "SELECT * FROM Products where ProductName like '%$name%' order by SellNumber DESC LIMIT 10";
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
  public function searchProductBySupID($name, $idSupp)
  {
    $sql = "SELECT  p.* from Products p WHERE ProductName like '%$name%' and p.SupplierID='$idSupp'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function showProductByCateID($cateID)
  {
    $sql = "SELECT  p.* from Products p WHERE  p.CategoryID='$cateID'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function searchProductByCateID($name, $cateID)
  {
    $sql = "SELECT  p.* from Products p WHERE ProductName like '%$name%'  and p.CategoryID='$cateID'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function search($name)
  {
    $sql = "SELECT * FROM Products p, Suppliers s, Categories c
    WHERE p.CategoryID = c.CategoryID and s.SupplierID = p.SupplierID and ProductName like '%$name%'";
    $result = $this->db->select($sql);
    return $result;
  }

  public function showNewProductByCateID($cateID, $ProductID)
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
    $file_Name = $file['Img']['name'];
    $file_size = $file['Img']['size'];
    $file_temp = $file['Img']['tmp_name'];

    $div = explode('.', $file_Name);
    $file_ext = strtolower(end($div));
    $unique_img = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_file = $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/uploads/' . $unique_img;
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
  public function updateProductNoneImg($data, $id)
  {
    $ProductName = mysqli_real_escape_string($this->db->link, $data['ProductName']);
    $Price = mysqli_real_escape_string($this->db->link, $data['Price']);
    $Origin = mysqli_real_escape_string($this->db->link, $data['Origin']);
    $Description = mysqli_real_escape_string($this->db->link, $data['Description']);
    $Status = mysqli_real_escape_string($this->db->link, $data['Status']);
    $Category = mysqli_real_escape_string($this->db->link, $data['CategoryID']);
    $Supplier = mysqli_real_escape_string($this->db->link, $data['SupplierID']);

    if (empty($ProductName) || empty($Price) ||  empty($Origin) ||  empty($Description) || empty($Status)) {
      $alert = "Products must be not empty";
      return $alert;
    } else {
      $sql = "UPDATE Products set ProductName='$ProductName', Price='$Price', Origin='$Origin', CategoryID='$Category', SupplierID='$Supplier', Description='$Description', Status='$Status' where ProductID='$id' ";
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
  public function updateViews($id)
  {
    $resultViews = $this->showproductByID($id);
    if ($resultViews) {
      $fetchViews = $resultViews->fetch_assoc();
      $views = $fetchViews['Views'] + 1;

      $sqlUpdate = "UPDATE Products set Views = '$views' where ProductID = '$id'";
      $resultUpdate = $this->db->update($sqlUpdate);
      return $resultUpdate;
    }
  }
  public function updateSellNumber($id, $sellNumber)
  {
    $resultViews = $this->showproductByID($id);
    if ($resultViews) {
      $fetchViews = $resultViews->fetch_assoc();
      $sellNumber = $fetchViews['SellNumber'] + $sellNumber;
    }

    $sqlUpdate = "UPDATE Products set SellNumber = '$sellNumber' where ProductID = '$id'";
    $resultUpdate = $this->db->update($sqlUpdate);
    return $resultUpdate;
  }
  public function searchUltimate($data){
      $query = "SELECT * FROM Products";

      $filtered_get = array_filter($data); 

      if (count($filtered_get)) { 
          $query .= " WHERE";

          $keynames = array_keys($filtered_get); 
          $i = 0;
          foreach($filtered_get as $key => $value)
          {
            if( $key == 'ProductName'){
              $query .= " ProductName like '%$value%'";
            }else if ($key == 'PriceMin') {
              $query .= " Price > '$value'";
            }else if($key == 'PriceMax'){
              $query .= " Price < '$value'";
            }else if($key != 'btnSearch'){
               $query .= " $key = '$value'";
            }

             if (count($filtered_get) > 1 &&  $i < count($filtered_get) - 2) { 
                $query .= " AND";
             }
             $i++;
          }
        $query .= ";";
          $result = $this->db->select($query);
          return $result;
        }
        return false;
  }
}
?>