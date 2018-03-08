<?php
// include("lib_db.php");
// include("../checklogin.php");
// include("upload.php");
// $user = checkLoggedUser();
//nho sua lai ten db trong file lib_db.php dong 12
//print_r($_REQUEST);exit();
//get input
if(isset($_POST['ok'])){
$IdDanhMuc = isset($_REQUEST["IdDanhMuc"]) ? $_REQUEST["IdDanhMuc"] : "";
$TenBaiViet = isset($_REQUEST["TenBaiViet"]) ? $_REQUEST["TenBaiViet"] : "";
$MoTa = isset($_REQUEST["MoTa"]) ? $_REQUEST["MoTa"] : "";
$NoiDung = isset($_REQUEST["NoiDung"]) ? $_REQUEST["NoiDung"] : "";
$test = isset($_REQUEST["test"]) ? $_REQUEST["test"] : "";
echo $pathImg;
echo $MoTa ;
// echo $test ;exit();
// //tao sql
// $sql = "INSERT INTO product (cid,name,price,description,body) ";
// $sql .= " VALUES (";
// $sql .= "	'{$cid}', ";
// $sql .= "	'{$name}', ";
// $sql .= "	'{$price}', ";
// $sql .= " '{$description}', ";
// $sql .= "	'{$body}' ";
// $sql .= ")";
//echo "sql=[$sql]"; exit();
//Thuc thi sql
// $ret = exec_update($sql);

?> 
<script text="javascript"> alert("them thanh cong");</script>
<?php
// header("Location:index.php");
// exit();
}
?>
