<?php
//include("lib_db.php");
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
					$sql .= " set";
					$sql .= "	IdDanhMuc='{$IdDanhMuc}', ";
					$sql .= "	TieuDe='{$TenBaiViet}', ";
					$sql .= "	MoTa='{$MoTa}', ";
					$sql .= "   NoiDung='{$NoiDung}', ";
					$sql .= "   LinkAnh='{$subPathImg}' ";

					$sql .= " where id={$Id}";

					 //echo "sql=[$sql]"; exit();
					//Thuc thi sql
					$ret = exec_update($sql);

					header("Location:index.php");
					exit();
				}
			}
		}else{
			$Id = isset($_REQUEST["Id"]) ? $_REQUEST["Id"] : 0;
			$IdDanhMuc = isset($_REQUEST["IdDanhMuc"]) ? $_REQUEST["IdDanhMuc"] : "";
			$TenBaiViet = isset($_REQUEST["TenBaiViet"]) ? $_REQUEST["TenBaiViet"] : "";
			$MoTa = isset($_REQUEST["MoTa"]) ? $_REQUEST["MoTa"] : "";
			$NoiDung = isset($_REQUEST["NoiDung"]) ? $_REQUEST["NoiDung"] : "";
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$NgayCapNhat=date("Y-m-d H:i:s",time());
			//print_r($_REQUEST);exit();
			//tao sql
			//tao sql
			$sql = "UPDATE tbl_chitiet  ";
			$sql .= " set";
			$sql .= "	IdDanhMuc='{$IdDanhMuc}', ";
			$sql .= "	TieuDe='{$TenBaiViet}', ";
			$sql .= "	MoTa='{$MoTa}', ";
			$sql .= "   NoiDung='{$NoiDung}', ";
			$sql .= "	NgayCapNhat='{$NgayCapNhat}' ";
			$sql .= " where id={$Id}";

			// echo "sql=[$sql]"; exit();
			//Thuc thi sql
			$ret = exec_update($sql);
			header("Location:index.php");
			exit();
		}
	}



  // if(isset($_POST['ok'])){ // Người dùng đã ấn submit
      // if($_FILES['file']['name'] != NULL){ // Đã chọn file
           // // Tiến hành code upload file
		   // if($_FILES['file']['type'] == "image/jpeg"
			// || $_FILES['file']['type'] == "image/png"
			// || $_FILES['file']['type'] == "image/gif"){
			  // // là file ảnh
			  // // Tiến hành code upload
			  // if($_FILES['file']['size'] > 1048576){
			      // echo "File không được lớn hơn 1mb";
			  // }else{
			      // // file hợp lệ, tiến hành upload
			      // $path = "../img/news/"; // ảnh upload sẽ được lưu vào thư mục news
			      // $tmp_name = $_FILES['file']['tmp_name'];
			      // $name = $_FILES['file']['name'];
			      // $type = $_FILES['file']['type'];
			      // $size = $_FILES['file']['size'];

			      // // Upload file
				  // // echo $path.$tmp_name;
				  // if(file_exists($path.$name))
						// {
						// $error="tên file đã tồn tại. Vui lòng chọn lại file !";
						// // header("Location:add-new.php");

						// }
					// // echo "File not uploaded! <br />";
					// else{
						  // move_uploaded_file($tmp_name,$path.$name);
						 // $pathImg = $path.$name;
						 // $subPathImg=substr($pathImg,3);
						 // //echo $subPathImg;
						 // $error .= "File uploaded! <br />";
						 // $error .= "Tên file : ".$name."<br />";
						 // $error .= "Kiểu file : ".$type."<br />";
						 // $error .= "File size : ".$size ;


						// $IdDanhMuc = isset($_REQUEST["IdDanhMuc"]) ? $_REQUEST["IdDanhMuc"] : "";
						// $TenBaiViet = isset($_REQUEST["TenBaiViet"]) ? $_REQUEST["TenBaiViet"] : "";
						// $MoTa = isset($_REQUEST["MoTa"]) ? $_REQUEST["MoTa"] : "";
						// $NoiDung = isset($_REQUEST["NoiDung"]) ? $_REQUEST["NoiDung"] : "";
						// date_default_timezone_set('Asia/Ho_Chi_Minh');
						// $NgayThem=date("Y-m-d H:i:s",time());
						// //print_r($_REQUEST);exit();
						// //tao sql
						// $sql = "INSERT INTO tbl_chitiet (Id,TieuDe,MoTa,NoiDung,NgayThem,LinkAnh, IdDanhMuc) ";
						// $sql .= " VALUES (";
						// $sql .= "'',";
						// $sql .= "	'{$TenBaiViet}', ";
						// $sql .= "	'{$MoTa}', ";
						// $sql .= "	'{$NoiDung}', ";
						// $sql .= "	'{$NgayThem}' ,";
						// $sql .= "	'{$subPathImg}', ";
						// $sql .= "	'{$IdDanhMuc}' ";
						// $sql .= ")";
						 // //echo "sql=[$sql]"; exit();
						// //Thuc thi sql
						// $ret = exec_update($sql);

						 // header("Location:index.php");
						// exit();
						// }
			  // }
			// }else{
			  // // không phải file ảnh
			  // $error="Kiểu file không hợp lệ.";
			// }
	  // }else{
			// $Id = isset($_REQUEST["Id"]) ? $_REQUEST["Id"] : 0;
			// $IdDanhMuc = isset($_REQUEST["IdDanhMuc"]) ? $_REQUEST["IdDanhMuc"] : "";
			// $TenBaiViet = isset($_REQUEST["TenBaiViet"]) ? $_REQUEST["TenBaiViet"] : "";
			// $MoTa = isset($_REQUEST["MoTa"]) ? $_REQUEST["MoTa"] : "";
			// $NoiDung = isset($_REQUEST["NoiDung"]) ? $_REQUEST["NoiDung"] : "";
			// date_default_timezone_set('Asia/Ho_Chi_Minh');
			// $NgayCapNhat=date("Y-m-d H:i:s",time());
			// //print_r($_REQUEST);exit();
			// //tao sql
			// //tao sql
			// $sql = "UPDATE tbl_chitiet  ";
			// $sql .= " set";
			// $sql .= "	IdDanhMuc='{$IdDanhMuc}', ";
			// $sql .= "	TieuDe='{$TenBaiViet}', ";
			// $sql .= "	MoTa='{$MoTa}', ";
			// $sql .= "   NoiDung='{$NoiDung}', ";
			// $sql .= "	NgayCapNhat='{$NgayCapNhat}' ";
			// $sql .= " where id={$Id}";

			// // echo "sql=[$sql]"; exit();
			// //Thuc thi sql
			// $ret = exec_update($sql);

			 // header("Location:index.php");
			// exit();
		// }
    // }

?>
