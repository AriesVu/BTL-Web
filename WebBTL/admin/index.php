<?php
include("lib_db.php");
include("../checklogin.php");

$user = checkLoggedUser();
//kiểm tra nếu có user thì chuyển đến trang account.php luôn

$q = isset($_REQUEST["q"]) ? $_REQUEST["q"] : "";
$d = isset($_REQUEST["d"]) ? $_REQUEST["d"] : "";
$q = trim($q);
$cond = "";
if ($q or $d){
	$cond = " and (ct.IdDanhMuc = '{$d}' or '{$d}' = '')";
	$cond .= " and ((TieuDe like '%{$q}%')";
	$cond .= " or (MoTa like '%{$q}%')";
	$cond .= " or (NoiDung like '%{$q}%'))";
}
$sql = " select ct.Id, ct.TieuDe, ct.MoTa, ct.LinkAnh, ct.IdDanhMuc ,dm.TenDanhMuc
 from btl_chitiet as ct inner join btl_danhmuc as dm where (ct.IdDanhMuc=dm.Id) {$cond} ";

  //echo $sql;
  //exit();
$datas = select_list($sql);
$count =count($datas);
?>
<?php
include("pagination.php");
?>
<?php
// echo $count;
// exit();
// print_r($datas);
$sql1 ="select * from btl_danhmuc order by TenDanhMuc";
$DanhMucs=select_list($sql1);
//print_r($DanhMucs);
//exit();

// <center>
			// <ul class="pagination">
				// <li><a href="#">&laquo;</a></li>
				// <li name="page" class="active"><a href="index.php?page=1"</a>1</a></li>
				// <li class="disabled"><a href="#">2</a></li>
				// <li><a href="#">3</a></li>
				// <li><a href="#">4</a></li>
				// <li><a href="#">5</a></li>
				// <li><a href="#">&raquo;</a></li>
			// </ul>
		// </center>

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Trang Chủ|Thiết Kế Nội Thất</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.min.css">
	<!-- <script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script> -->
	<script>
		function deleteAction(){
			return confirm("Bạn có chắc chắn muốn xóa không?");
		}
	</script>
</head>
<body>
	<div class="col-sm-12" style="padding: 30px">
		<a href="add-new.php" class="btn btn-info" role="button">Thêm Bài Mới</a>
		<a href="../logout.php" class="btn btn-info" role="button">Thoát Admin</a>
	</div>
	<div class="form-group col-sm-12 remove-padding">
		<form action="index.php" method="get">
			<div class="col-sm-4 remove-padding">
			  <label for="sel1">Danh mục bài viết</label>
				<div>
					  <select class="form-control" name="d">
						<option value="" selected disabled>---Chọn danh mục bài viết---</option>
						<?php
							if($DanhMucs)
								{
								foreach($DanhMucs as $DanhMuc)
									{
										if($d == $DanhMuc['Id'])
											{?>
												<option style="background:#101010;" value="<?php echo $DanhMuc['Id'] ?>" selected disabled><?php echo $DanhMuc['TenDanhMuc'] ?></option><?php
											}
										 else
											 { ?>
												<option value="<?php echo $DanhMuc['Id'] ?>"><?php echo $DanhMuc['TenDanhMuc'] ?></option><?php
											 }
									}
								}
						?>
					  </select>
				</div>
			</div>
			<div class="col-sm-4 remove-padding">
				<label>Tên bài viết</label>
				<input type="text" class="form-control" name="q" placeholder="Nhập tên bài viết" value="<?php echo $q?>"/>
			</div>
			<div class="col-sm-4 remove-padding">
				<input type="submit" name="timkiem" value="Tìm Kiếm" style="margin-top: 25px;" class="btn btn-default"/>
				<a href="index.php" class="btn btn-default" style="margin-top: 25px; padding: 6px 25px; margin-left: 15px;" role="button">Hủy</a>
			</div>
		</form>
	</div>
	<div class="col-sm-12" style="padding: 10px 30px;">
		<table class="table table-bordered">
			<tr>
				<th style="width:5%">STT</th>
				<th style="width:5%">Danh Mục</th>
				<th style="width:15%">Tên bài viết</th>
				<th style="width:30%">Mô Tả </th>

				<th style="width:15%"> Ảnh</th>
				<th style="width:5%"> Sửa</th>
				<th style="width:5%"> Xóa</th>
			</tr>
			<?php $i=$vitri+1; if($datas1) foreach ($datas1 as $data){?>
				<tr>
					<td>
						<?php echo $i++;?>
					</td>
					<td>
						<?php echo $data['TenDanhMuc']?>
					</td>
					<td>
						<?php echo $data['TieuDe']?>
					</td>
					<td>
						<?php echo $data['MoTa']?>
					</td>


					<td>
					<img class="img-responsive img-tintuc" src="../<?php echo $data['LinkAnh']?>" width="98%" alt="" />

					</td>
					<td>
						<a href="edit.php?id=<?php echo $data['Id']?>">Sửa</a>
					</td>
					<td>

						<a href="delete_exec.php?id=<?php echo $data['Id']?>" onclick="return deleteAction();">Xóa</a>
					</td>

				</tr>
			<?php } ?>
		</table>
	</div>
	<div class="col-sm-12 row remove-padding">
		<center>
			<ul class="pagination">
			<?php if ($_GET['page'] > 1)  {?>
			<li name="page"><a href="index.php?d=<?php echo $d ?>&q=<?php echo $q ?>&page=<?php echo $_GET['page']-1 ?>">&laquo;</a></li><?php }?>
				<?php if($tong_so_trang)
					for($i=1 ; $i<=$tong_so_trang ; $i++){
						if ($i == $_GET['page']){?>
								<li name="page" class="active"><a href="index.php?d=<?php echo $d ?>&q=<?php echo $q ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
						<?php } else{?>
					<li name="page"><a href="index.php?d=<?php echo $d ?>&q=<?php echo $q ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php }}?>
				<?php if ($_GET['page'] < $tong_so_trang) { ?> <li name="page"><a href="index.php?d=<?php echo $d ?>&q=<?php echo $q ?>&page=<?php echo $_GET['page']+1 ?>">&raquo;</a></li><?php }?>
			</ul>
		</center>



			</ul>
		</center>
	</div>
</body>

</html>
