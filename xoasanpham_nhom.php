<?php include "headerquantri.php";?>
<?php
  include "function_sanpham.php";

  $nhomsanpham = new nhomsanpham();
  $id = $_GET['id'];
  $result = $nhomsanpham->hienthiid($id);
  $row = mysqli_fetch_array($result);
 
  $nhomsanpham->delete($id);
  ?>


