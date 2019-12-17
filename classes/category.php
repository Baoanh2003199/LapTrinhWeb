<?php

$filePath = realpath(dirname(__FILE__));
include_once($filePath . '/../lib/database.php');
include_once($filePath . '/../helper/format.php');

include_once "../lib/session.php";
include_once '../lib/database.php';
include_once '../helper/format.php';
?>
<?php
class category
{
  private $db;
  private $fm;

  public function _construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function insert_category($catName, $catDescription, $catStatus)
  {
    $catName = $this->fm->valation($catName);
    $catDescription = $this->fm->valation($catDescription);
    $catStatus = $this->fm->valation($catStatus);
    //
    $catName = mysqli_real_escape_string($this->db->link, $catName);
    $catDescription = mysqli_real_escape_string($this->db->link, $catDescription);
    $catStatus = mysqli_real_escape_string($this->db->link, $catStatus);

    if (empty($catName) || empty($catDescription) || empty($catStatus)) {
      $alert = "catgory must be not empty";
      return $alert;
    } else {
      $sql = "INSERT into Categories(CategoryName,Description,Status) values('$catName',''$catDescription,'$catStatus')";
      $result = $this->db->insert($sql);

      if ($result) {
        $alert = "<span> insert category successen</span>";
        return $alert;
      } else {
        $alert = "<span> insert category no successen</span>";
        return $alert;
      }
    }
  }
  public function show_category()
  {
    $sql = "SELECT * from Categories order by CategoryID";
    $result = $this->db->select($sql);
    return $result;
  }

  public function getCatID($id)
  {
    $sql = "SELECT * from Categories CategoryID='$id'";
    $result = $this->db->select($sql);
    return $result;
  }
  public function update_category($catName, $catDescription, $catStatus, $id)
  {

    $id = $this->fm->valation($id);
    $catName = $this->fm->valation($catName);
    $catDescription = $this->fm->valation($catDescription);
    $catStatus = $this->fm->valation($catStatus);
    //
    $id = mysqli_real_escape_string($this->db->link, $id);
    $catName = mysqli_real_escape_string($this->db->link, $catName);
    $catDescription = mysqli_real_escape_string($this->db->link, $catDescription);
    $catStatus = mysqli_real_escape_string($this->db->link, $catStatus);

    if (empty($catName) || empty($catDescription) || empty($catStatus)) {
      $alert = "catgory must be not empty";
      return $alert;
    } else {
      $sql = "UPDATE Categories set CategoryName='$catName'and Description='$catDescription' and Status='$catStatus' where CategoryID='$id' ";
      $result = $this->db->update($sql);

      if ($result) {
        $alert = "<span> update category successen</span>";
        return $alert;
      } else {
        $alert = "<span> update category no successen</span>";
        return $alert;
      }
    }
  }
  public function del_category($id)
  {
    $sql = "DELETE FROM Categories  WHERE CategoryID='$id'";
    $result = $this->db->delete();
    if ($result) {
      $alert = "<span> delete category successen</span>";
      return $alert;
    } else {
      $alert = "<span> delete category no successen</span>";
      return $alert;
    }
  }
}
?>