<?php
$filePath = realpath(dirname(__FILE__));
include_once($filePath . '/../lib/database.php');
include_once($filePath . '/../helper/format.php');
include_once 'product.php'
 ?>
<?php
  /**
   *
   */
  class search
  {
    public $product=new product();
    private $db;
    private $fm;

    public function __construct(argument)
    {
      $this->db = new Database();
      $this->fm = new Format();
    }

    public function searchProduct($Name){
      if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $productName=$_POST['productName'];
      }
      $pos=strpos($productName,$Name);

      if($pos===false){
        echo "<span>no found prodouct name </span>";
      }
    }
  }

 ?>
