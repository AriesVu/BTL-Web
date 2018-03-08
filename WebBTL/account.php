<?php
include("lib_db.php");
include("checklogin.php");
$user = checkLoggedUser();
$q = isset($_REQUEST["q"]) ? $_REQUEST["q"] : "";
$q = trim($q);
$cond = "";
if ($q){
	$cond = "where (title like '%{$q}%')";
	$cond .= " or (date like '%{$q}%')";
	$cond .= " or (description like '%{$q}%')";
}
$sql = " select * from kenhtre_chitiet {$cond} ";
$datas = select_list($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Tin hot nhất trong ngày| Tin giới trẻ kênh trẻ</title>
      <link rel="stylesheet" href="css/style.css"/>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-theme.min.css" rel="stylesheet">
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <style>
         body{
         padding: 70px 0px;
		 margin: auto;
         }
      </style>
   </head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
				<div id="navbar" class="collapse navbar-collapse">
						<ul class="nav navbar-nav">
						<li class="active"><a href="http://localhost:8080/BAITAPLON/bootstrap3/account.php"><span class="glyphicon glyphicon-home"</span></a></li>
						<li>
                     <a>Xin chào <?php echo $user['username']?></a></li>
					 <li><a href="add.php">THÊM BÀI VIẾT</a></li>
					 <li><a href="logout.php">ĐĂNG XUẤT</a></li>
					 
					 
					 </ul>

            <!--/.nav-collapse -->
         </div>
      </nav>
	<div class="container">
			<div class="col-md-12">
			<div class="col-md-3">
			</div>
			<div class="col-md-6">
				<h1> CHỨC NĂNG CHÍNH </h1>
				</div>
			<div class="col-md-3">
			</div>
			</div>
			
			<table class="table">
				<thead>
				<tr>
					<th>STT</th>
					<th>Link bài viết</th>
					<th>Danh mục</th>
					<th>Hình ảnh</th>
					<th>Ngày viết</th>
				</tr>
		</thead>
		
				<tbody>
				<?php $i=1; if($datas) foreach ($datas as $data){?>
				     <tr class="success">
					<td>
						<?php echo $i++;?>
					</td>
					<td>
						<?php echo $data['title']?>
					</td>
					<td>
						<?php echo $data['mid']?>
					</td>
					<td>
						<?php echo $data['image']?>
					</td>
					<td>
						<?php echo $data['date']?>
					</td>
					
					<td>
						<a href="edit.php?id=<?php echo $data['id']?>">Edit</a>
						<a href="delete.php?id=<?php echo $data['id']?>">Delete</a>
					</td>
      </tr>
	  <?php } ?>
			</table>
							
	</div><!-- end container -->
      <div class="footer">
         <div class="container">
            <div class="col-md-12">
               <h5 style="color: white"><b>Trụ Sở Hà Nội</b></h5>
               <h6 style="color: white">Tầng 20, tòa nhà Center Building, Hapulico Complex, số 1 Nguyễn Huy Tưởng, p. Thanh Xuân Trung, quận Thanh Xuân, Hà Nội. Điện thoại: 04.39743410, máy lẻ 230.</h6>
               <h6 style="color: white">Copyright © 2008 - 2017 – CÔNG TY CỔ PHẦN VCCORP</h6>
            </divơ
         </div>
      </div>
</div><!-- end wrapper -->
<div id="log"></div>
</body>
</html>