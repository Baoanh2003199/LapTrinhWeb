<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/header.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/classes/supplier.php';
?>
<?php
if (!isset($_GET['SupplierID']) || $_GET['SupplierID'] == null) {
  // header("Location:listSupplier.php");
} else {
  $id = $_GET['SupplierID'];
}
$supp = new supplier();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $suppName = $_POST['supName'];
  $suppAddress = $_POST['supAddress'];
  $suppPhone = $_POST['supPhone'];
  $suppStatus = $_POST['Status'];
  $updateSupp = $supp->update_supplier($suppName, $suppAddress, $suppPhone, $suppStatus, $id);
}
?>
<div class="titleRight path">
  <a href="index.html">home</a> > 
  <a href="updateSupplier.php">Cập nhật nhà sản xuất</a>>
</div>
 <?php
  if (isset($updateSupp)) {
    echo $updateSupp;
  }
  ?>
<?php
$get_Name = $supp->getSupplierID($id);

if ($get_Name) {
  while ($resulut = $get_Name->fetch_assoc()) {
  
    ?>
    <form action="updateSupplier.php?SupplierID=<?php echo $id ?>" method="POST"  > 
      <div class="titleForm">Cập nhật sản xuất</div>
      <div class="form-group">
        <div class="itemForm">Nhà sản xuất</div>
        <input type="text" class="form-control" value="<?php echo $resulut['SupplierName'] ?>" id="" aria-describedby="" placeholder="Nhập tên loại" name ='supName'/>
      </div>
      <div class="form-group">
        <div class="itemForm">Địa chỉ</div>
        <input type="text" class="form-control" value="<?php echo $resulut['Address'] ?>" id="" aria-describedby="" placeholder="Nhập địa chỉ" name ='supAddress' />
      </div>
      <div class="form-group">
        <div class="itemForm">SDT</div>
        <input type="text" class="form-control" value="<?php echo $resulut['Phone'] ?>" id="" aria-describedby="" placeholder="Nhập số điện thoại" name='supPhone'  />
      </div>
      <div class="form-group">
        <div class="itemForm">Trạng thái</div>
        <br />
        <select name="Status" id="" class="form-control">
          <?php 
            if($resulut['Status'] === '1' ){
         
           ?>
              <option value="1" selected="true">Hoạt động</option>
              <option value="2">Ngưng hoạt động</option>
          <?php          
            }else{

          ?>
              <option value="1" >Hoạt động</option>
              <option value="2" selected="true">Ngưng hoạt động</option>
          <?php 
          }
           ?>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
<?php
  }
}
?>
</div>
</div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/LapTrinhWeb/admin/inc/footer.php';
?>
