<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/helper/format.php';
include_once 'product.php'
?>
<?php
/**
 *
 */
class search
{
  public $product = new product();
  private $db;
  private $fm;

  public function __construct()
  {
    $this->db = new Database();
    $this->fm = new Format();
  }

  public function searchProduct($Name)
  {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $productName = $_POST['productName'];
    }
    $pos = strpos($productName, $Name);

    if ($pos === false) {
      echo "<span>no found prodouct name </span>";
    }
  }
}

?>