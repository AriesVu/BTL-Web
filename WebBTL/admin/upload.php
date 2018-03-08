<?php
$error=" ";
$pathImg=" ";
  if(isset($_POST['ok'])){ // Người dùng đã ấn submit
           // Tiến hành code upload file
			  // là file ảnh
			  // Tiến hành code upload
		if($_FILES['file']['size'] > 1048576){
			      echo "File không được lớn hơn 1mb";
		}else{
			// file hợp lệ, tiến hành upload
			$path = "../images/"; // ảnh upload sẽ được lưu vào thư mục news
			
			$tmp_name = $_FILES['file']['tmp_name'];
			$name =$NgayThem."_".$_FILES['file']['name'];  
			 // echo $name;
			 // exit();
			if(file_exists($path.$name)){  
				$error="tên file đã tồn tại. Vui lòng chọn lại file !"; 
			}
			else{
				move_uploaded_file($tmp_name,$path.$name);
				$pathImg = $path.$name;
				$subPathImg=substr($pathImg,3);
				//echo $subPathImg;
				 
				$IdDanhMuc = isset($_REQUEST["IdDanhMuc"]) ? $_REQUEST["IdDanhMuc"] : "";
				$TenBaiViet = isset($_REQUEST["TenBaiViet"]) ? $_REQUEST["TenBaiViet"] : "";
				$MoTa = isset($_REQUEST["MoTa"]) ? $_REQUEST["MoTa"] : "";
				$NoiDung = isset($_REQUEST["NoiDung"]) ? $_REQUEST["NoiDung"] : "";
				// date_default_timezone_set('Asia/Ho_Chi_Minh');
				// $NgayCapNhat=date("Y-m-d H:i:s",time());
				//print_r($_REQUEST);exit();
				//tao sql
				$sql = "INSERT INTO btl_chitiet (Id,TieuDe,MoTa,NoiDung,LinkAnh, IdDanhMuc) ";
				$sql .= " VALUES (";
				$sql .= "'',";
				$sql .= "	'{$TenBaiViet}', ";
				$sql .= "	'{$MoTa}', ";
				$sql .= "	'{$NoiDung}', ";
				$sql .= "	'{$subPathImg}', ";
				$sql .= "	'{$IdDanhMuc}' ";
				$sql .= ")";
				 //echo "sql=[$sql]"; exit();
				//Thuc thi sql
				$ret = exec_update($sql);
				
				header("Location:index.php");
				exit();
			}  
		}
	}
 
?>