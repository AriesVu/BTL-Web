<?php
	include("lib_db.php");
	include("upload.php");
	include("../checklogin.php");
	//include("add_exec.php");
	$user = checkLoggedUser();
	$sql = "select * from btl_danhmuc";
//echo "sql=[$sql]"; exit();
$categories = select_list($sql);


//print_r ($categories); exit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Thêm Mới|Thiết kế nội thất</title>
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.min.css">
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="css/styles.css">

</head>
<body>

	<div class="col-sm-12"style="padding-top:20px">
	<center><b>THÊM MỚI BÀI VIẾT</b></center>
</div>
<form action="add-new.php" method="post" enctype="multipart/form-data">
	<div class="col-sm-8 col-sm-offset-2">
		<b>Ảnh bìa bài viết</b>
		<input required type="file" id="f" name="file" size="20" onchange="file_change(this)" /><br />
		<label name="Anh" id="infor" style="color:red"> <?php echo $error ?> <br></label></br>
		<img id="img" style="display: none" />


		<div class="form-group col-sm-12 remove-padding">
			<div class="col-sm-4 remove-padding">
			  <label for="sel1">Danh mục bài viết</label>
				<div>
					  <select required class="form-control" name="IdDanhMuc">
						<option value="" selected disabled>Chọn danh mục bài viết</option>
						<?php foreach ($categories as $cate) {?>
								<option value="<?php echo $cate['Id']?>"><?php echo $cate['TenDanhMuc']?></option>
						<?php } ?>
					  </select>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12 remove-padding">
			<div class="col-sm-8 remove-padding">
				<label>Tên bài viết</label>
				<input type="text" class="form-control" name="TenBaiViet" required placeholder="Nhập tên bài viết">
			</div>
		</div>
		<div class="form-group">
			<label>Mô tả</label>
			<textarea class="form-control" name="MoTa" required placeholder="Nhập mô tả bài viết"></textarea>
		</div>
		<div class="form-group">
			<label>Nội dung</label>
			<textarea class="form-control" name="NoiDung" placeholder="Nhập nội dung bài viết"></textarea>
		</div>
		<div class= "col-sm-12" style="margin: 10px">
			<button type="submit" name="ok" value="Upload" class="btn btn-default">Thêm</button>
			<a href="index.php" class="btn btn-info" role="button">Hủy</a>
		</div>
	</div>
</form>
</body>
<script type="text/javascript">
CKEDITOR.replace( 'NoiDung');
function file_change(f){
var x=f.files[0];
if(x['type']=="image/jpeg" || x['type']=="image/png")
	{
		var reader = new FileReader();
		reader.onload = function (e) {
		var html="";
		html="</br> Tên file: " +x['name'] +" <br> Kiểu file: " +x['type'] +" <br>Kích thước: " +x['size']+ " bytes"
			document.getElementById("infor").innerHTML =html;
			var img = document.getElementById("img");
			img.src = e.target.result;
			img.style.display = "inline";
		};
		reader.readAsDataURL(x);
	}else{
	html="</br>File được chọn không đúng đinh dạng";
	document.getElementById("f").value ="";
	var img = document.getElementById("img");
	document.getElementById("infor").innerHTML =html;
	img.style.display = "none";
	}
}
</script>
</html>
