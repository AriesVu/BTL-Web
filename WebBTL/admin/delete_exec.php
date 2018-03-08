<?php 
include("lib_db.php");
$Id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
$sql = "delete from btl_chitiet where id ={$Id }";
//echo $sql ; exit();
$ret = exec_update($sql);
header("Location:index.php");
exit();
?>
