<?php
	include("lib_db.php");

	include("../checklogin.php");
	//include("add_exec.php");
	$user = checkLoggedUser();
	$id=isset($_REQUEST['id'])? $_REQUEST['id']:0;
	$sql1="select * from btl_chitiet where Id={$id}";
	// echo $sql1;

	$data=select_one($sql1);
	//print_r($data);
	// exit();
	$sql = "select * from btl_danhmuc";
	//echo "sql=[$sql]"; exit();
	$categories = select_list($sql);

	$error=" ";
$pathImg=" ";
if(isset($_POST['ok'])){ // Người dùng đã ấn submit
		if($_FILES['file']['name'] != NULL){
           // Tiến hành code upload file
			  // là file ảnh
			  // Tiến hành code upload
			if($_FILES['file']['size'] > 1048576){
			      echo "File không được lớn hơn 1mb";
			}else{
				// file hợp lệ, tiến hành upload
				$path = "../images/"; // ảnh upload sẽ được lưu vào thư mục news
				$NgayThem=date("Y-m-d_H-i-s",time());
				$tmp_name = $_FILES['file']['tmp_name'];
				$name =$NgayThem."_".$_FILES['file']['name'];
				 // echo $name;
				 // exit();
				if(file_exists($path.$name)){
					$error="tên file đã tồn tại. Vui lòng chọn lại file !";
				}else{
					move_uploaded_file($tmp_name,$path.$name);
					$pathImg = $path.$name;
					$subPathImg=substr($pathImg,3);
					//echo $subPathImg;

					$Id = isset($_REQUEST["Id"]) ? $_REQUEST["Id"] : 0;
					$IdDanhMuc = isset($_REQUEST["IdDanhMuc"]) ? $_REQUEST["IdDanhMuc"] : "";
					$TenBaiViet = isset($_REQUEST["TenBaiViet"]) ? $_REQUEST["TenBaiViet"] : "";
					$MoTa = isset($_REQUEST["MoTa"]) ? $_REQUEST["MoTa"] : "";
					$NoiDung = isset($_REQUEST["NoiDung"]) ? $_REQUEST["NoiDung"] : "";

					//include("lib_db.php");
					//print_r($_REQUEST);exit();
					//tao sql
					$sql = "UPDATE btl_chitiet  ";
					$sql .= "set";
					$sql .= "	LinkAnh='{$subPathImg}', ";
					$sql .= "	IdDanhMuc='{$IdDanhMuc}', ";
					$sql .= "	TieuDe='{$TenBaiViet}', ";
					$sql .= "	MoTa='{$MoTa}', ";
					$sql .= "   NoiDung='{$NoiDung}' ";
					$sql .= " where Id={$id}";

					 //echo "sql=[$sql]"; exit();
					//Thuc thi sql
					$ret = exec_update($sql);
					//print_r($ret);exit();
					header("Location:index.php");
					exit();
				}
			}
		}else{
			$Id = isset($_REQUEST["Id"]) ? $_REQUEST["Id"] : 0;
			$subPathImg = isset($_REQUEST["LinkAnh"]) ? $_REQUEST["LinkAnh"] : "";
			$IdDanhMuc = isset($_REQUEST["IdDanhMuc"]) ? $_REQUEST["IdDanhMuc"] : "";
			$TenBaiViet = isset($_REQUEST["TenBaiViet"]) ? $_REQUEST["TenBaiViet"] : "";
			$MoTa = isset($_REQUEST["MoTa"]) ? $_REQUEST["MoTa"] : "";
			$NoiDung = isset($_REQUEST["NoiDung"]) ? $_REQUEST["NoiDung"] : "";
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$NgayCapNhat=date("Y-m-d H:i:s",time());
			//print_r($_REQUEST);exit();
			//tao sql
			//tao sql
			$sql = "UPDATE btl_chitiet ";
			$sql .= "set";
			$sql .= "	LinkAnh='{$subPathImg}', ";
			$sql .= "	IdDanhMuc='{$IdDanhMuc}', ";
			$sql .= "	TieuDe='{$TenBaiViet}', ";
			$sql .= "	MoTa='{$MoTa}', ";
			$sql .= "   NoiDung='{$NoiDung}' ";
			$sql .= " where Id={$id}";

			 //echo "sql=[$sql]";// exit();
			//Thuc thi sql
			$ret = exec_update($sql);
			//print_r($ret);exit();
			header("Location:index.php");
			exit();
		}
	}

	//print_r ($categories);
	//exit();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Sửa bài viêt|Du Lịch Bắc Ninh</title>
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
	<center><b>SỬA BÀI VIẾT</b></center>
</div>
<form action="" method="post" enctype="multipart/form-data">
	<div class="col-sm-8 col-sm-offset-2">
	<input type="hidden" name="Id" value="<?php echo $data['Id']?>"/>
		<b>Ảnh bìa bài viết</b>
		<input type="file" id="f" name="file" size="20" onchange="file_change(this)" /><br />
		<label name="Anh" id="infor" style="color:red"> <?php echo $error ?> <br></label></br>
		<img id="img" src="../<?php echo $data['LinkAnh']?>" />


		<div class="form-group col-sm-12 remove-padding">
			<div class="col-sm-4 remove-padding">
			  <label for="sel1">Danh mục bài viết</label>
				<div>
					<select required class="form-control" name="IdDanhMuc">
						<option value="" selected disabled>Chọn danh mục bài viết</option>
						<?php foreach ($categories as $cate) {
							if( $data['IdDanhMuc'] ==$cate['Id']){?>
								<option selected  style="background:#c8c8c8;" value="<?php echo $cate['Id']?>"><?php echo $cate['TenDanhMuc']?></option>
							<?php } else{ ?>
								<option class="selected" value="<?php echo $cate['Id']?>"><?php echo $cate['TenDanhMuc']?></option>
						<?php }} ?>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12 remove-padding">
			<div class="col-sm-8 remove-padding">
				<label>Tên bài viết</label>
				<input type="text" class="form-control" name="TenBaiViet"  placeholder="Nhập tên bài viết" value="<?php echo $data['TieuDe']?>" >
			</div>
		</div>
		<div class="form-group">
			<label>Mô Tả </label>
			<textarea class="form-control" name="MoTa" placeholder="Nhập nội dung bài viết" ><?php echo  $data['MoTa']?></textarea>
		</div>
		<div class="form-group">
			<label>Nội dung</label>
			<textarea class="form-control" name="NoiDung" placeholder="Nhập nội dung bài viết" ><?php echo  $data['NoiDung']?></textarea>
		</div>
		<div class= "col-sm-12" style="margin: 10px">
			<button type="submit" name="ok" value="Upload" class="btn btn-default">Sửa</button>
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
	// var img = document.getElementById("img");
	 document.getElementById("infor").innerHTML =html;
	// img.style.display = "none";
	}
}
</script>
</html>
