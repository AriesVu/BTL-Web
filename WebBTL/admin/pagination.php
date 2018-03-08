<?php
$baitren_mottrang = 5; // Tổng số tin hiện trên 1 trang

// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .  
if (!isset($_GET['page']))
{
    $_GET['page'] = 1;
	//echo $page;
}
$vitri = ((int)$_GET['page'] -1) * $baitren_mottrang;
 
// Đầu tiên bạn phải lấy số dữ liệu để xem, trong data bạn có bao nhiêu bài post
// $sql_count = "select count(*) as count from tbl_chitiet";
// $so_bai = select_one($sql_count);
// print_r($so_bai);


//Tính số trang. Lấy số bài viết có được, chia cho số bài viết trên 1 trang, ta được số trang 
/* Ví dụ ta có 
20 bài viết trong data. 
mỗi trang hiển thị 10 bài
=> Chúng ta có 20/10 = 2 trang 
*/
//$so_trang = $count/$baitren_mottrang;



// Bắt đầu lấy dữ liệu 
// Ta dùng hàm LIMIT x,y 
// Ta muốn chọn 10 bài, từ bài 20 thì ta để LIMIT 20,10 :D 
// $bat_dau_page= $page*$baitren_mottrang;

if ($q or $d){
	$cond = " and (ct.IdDanhMuc = '{$d}' or '{$d}'= ' ')";
	$cond .= " and ((TieuDe like '%{$q}%')";
	$cond .= " or (MoTa like '%{$q}%')";
	$cond .= " or (NoiDung like '%{$q}%'))";
}
$sql_page = " select ct.Id, ct.TieuDe, ct.MoTa, ct.LinkAnh, ct.IdDanhMuc ,dm.TenDanhMuc , ct.NoiDung
 from btl_chitiet as ct inner join btl_danhmuc as dm where (ct.IdDanhMuc=dm.Id) {$cond} LIMIT {$vitri},{$baitren_mottrang} ";

 
// $sql_page ="select ct.Id, ct.TieuDe, ct.MoTa, ct.NgayCapNhat, ct.NgayThem, ct.LinkAnh, ct.IdDanhMuc ,dm.TenDanhMuc 
			// from tbl_chitiet as ct inner join tbl_danhmuc as dm 
			// where (ct.IdDanhMuc=dm.Id) and (ct.IdDanhMuc = {$d} or {$d} = '') and ((TieuDe like '%{$q}%') or (MoTa like '%{$q}%') or (NoiDung like '%{$q}%')) order by ct.NgayCapNhat desc  LIMIT {$bat_dau_page},{$baitren_mottrang} "; 
//echo $sql_page;
$datas1= select_list($sql_page);
$tong_so_trang = floor($count/$baitren_mottrang) + 1;
 //echo $tong_so_trang;
// print_r($datas1);
// exit();	
/* Bạn xem tại sao là {$page}*{$baitren_mottrang} . Lấy số id của trang hiện tại nhân với số bài viết cho 
phép trên 1 trang
Ví dụ ta đang ở trang số 0. thì ta lấy từ bài thứ 0 trở đi.
ở trang số 1 thì lấy bài thứ 10 trở đi... Vì mỗi trang ta cho nó hiện chỉ 10 bài thôi :D
*/

// Xuất dữ liệu này 
// print_r($datas);
// exit();



// while ( $info = mysql_fetch_array($result ))  
// {
    // echo <<<EOT
    // $info['tenbai_viet']
    // <br />
    // $info['noidung']
// EOT;
// }

// Bây giờ tạo nút bấm để chuyển trang. 
// Hồi nảy ta tính dc cái $sotrang rùi á
// Bây giờ ta dùng hàm for để tạo vòng lập. hiện từ trang số 0 đến <= $sotrang
// for ( $page = 0; $page <= $sotrang; $page ++ )
// {
// echo "<a href='index.php?page={$page}'>{$page}</a>";
// }
?>