<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/LapTrinhWeb/config/config.php';
?>
<?php
class Database
{
  public $host = DB_HOST;
  public $user = DB_USER;
  public $pass = DB_PASS;
  public $dbname = DB_NAME;

  public $link;
  public $error;

  public function __construct()
  {
    $this->connectDB();
  }
  private function connectDB()
  {
    $this->link = new mysqli($this->user, $this->pass, $this->dbname);
    if (!$this->link) {
      $this->link->error_log;
      return false;
    }
  }

  public function select($query)
  {
    $result = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($result->num_rows > 0) {
      return $result;
    } else {
      return false;
    }
  }
  public function insert($query)
  {
    $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($insert_row) {
      return $insert_row;
    } else {
      return false;
    }
  }

  public function update($query)
  {
    $uppdate_row = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($uppdate_row) {
      return $uppdate_row;
    } else {
      return false;
    }
  }

  public function delete($query)
  {
    $delete_row = $this->link->query($query) or die($this->link->error . __LINE__);
    if ($delete_row) {
      return $delete_row;
    } else {
      return false;
    }
  }
}
?>
