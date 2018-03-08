<?php
include("lib_db.php");
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
 // print($id);exit();
 // $q = isset($_REQUEST["q"]) ? trim($_REQUEST["q"]) : "";
 if ($id <  1) return ;
 //tao sql
 $sql = "select * from btl_chitiet
 where Id='{$id}'";

 // echo $sql;exit();
 //thuc thi cau lenh sql
 $result = select_one($sql);
 //print_r($result);exit();
 if (!$result) return ;
$sql7="select * from btl_danhmuc where cid='1' ";
$dangs7 = select_list($sql7);
$sql8="select * from btl_danhmuc where cid='2' ";
$dangs8 = select_one($sql8);
//print_r($dangs8);exit() ;
$sql9="select * from btl_danhmuc where cid='3' " ;
$dangs9 = select_one($sql9);

$sql1 = "select * from btl_chitiet ";
$sql1 .= " where IdDanhMuc={$result ['IdDanhMuc']} ";
$sql1 .= " AND Id <> {$result ['Id']} ";
$sql1 .= " order by id asc ";
$sql1 .= " limit 4";

$datas = select_list($sql1);

 ?>
<!DOCTYPE html >
<html lang="en" >
<head>
<meta charset="UTF-8" />
<title> Nội thất tân cổ điển </title>
<!--latest comitle anh minified CSS $ js-->
<script type="text/javascript" src="bootstrap/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script src ="boostrap/js/boostrap.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/Web.css"/>
</head>

<body>
    <div id ="wrapper">
        <div class="row">
            <div id="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="mini-contacts">
                            <li class="glyphicon glyphicon-map-marker"> 2102CT4HyndaiHillstate,TôHiệu, HàĐông,HN</li>
                            <li class="glyphicon glyphicon-envelope"> sales@louisvietnam.vn</li>
                            <li class="glyphicon glyphicon-earphone"> 0931.831.888</li>
                        </ul><!--/ .mini-contacts-->
                    </div>
                    <div class="col-md-5">

                    </div>
                </div><!--/ .row-->
            </div><!--/ .container-->
            </div><!--/ #top-bar-->
        </div>

        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse " role="banner">
                    <div class="container">
                        <div class="col-md-4 ">
                        <div class="navbar-header ">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="index.php"><img src="images/LOGOCHuanpng.png" alt="logo"></a>
                        </div>
                        </div>
                        <div class="col-md-8">
                        <div class="collapse navbar-collapse  navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">TRANG CHỦ</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">THIẾT KẾ NỘI THẤT <i class="glyphicon glyphicon-menu-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if($dangs7) foreach ($dangs7 as $dang) {?>
                                        <li>
                                            <a href="danhsach.php?id=<?php echo $dang['Id']; ?>">
                                            <?php echo $dang['TenDanhMuc']; ?>
                                            </a>
                                        </li>
                                        <?php
                                            }
                                            ?>



                                    </ul>
                                </li>
                                <li>
                                            <a href="danhsach.php?id=<?php echo $dangs8['Id']; ?>">
                                            <?php echo $dangs8['TenDanhMuc']; ?>
                                            </a>
                                </li>
                                <li>
                                            <a href="danhsach.php?id=<?php echo $dangs9['Id']; ?>">
                                            <?php echo $dangs9['TenDanhMuc']; ?>
                                            </a>
                                </li>
                                <li><a href="#">LIÊN HỆ</a></li>
                                <li><a href="login.php">ĐĂNG NHẬP</a></li>

                            </ul>

                        </div>
                    </div><!--/container-->
                    </div>
                </nav><!--/nav-->
            </div>
        </div><!-- row header-->

        <div class="row">
            <div class="container1">
                    <div class="col-xs-12">
                            <header class="page-header" style="text-align: center; font-family: time new roman;" >
                                <h1 class="folio-page-title"><?php echo $result['TieuDe'] ?></h1>
                            </header><!--/ .page-header-->
                    </div><!--/ .col-xs-12-->
            </div><!--/ .container-->
        </div>

        <div class="row">
            <div class="col-md-12">

                    <div class="container1">
                            <div class="col-xs-12">
                                <div class="project-single-entry">
                                    <div class="entry-media">

                                    <class="panel-content"><h4><b><?php echo $result['NoiDung'] ?><b></h4>
                                    </div><!--/ .entry-media-->
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <h3 class="note" > <?php echo $result['TieuDe'] ?></h3>
                                <p>ĐỊA CHỈ : Hà Nội</p>
                                <p>CHỦ ĐẦU TƯ : <?php echo $result['MoTa'] ?></p>
                            </div>
                    </div>
            </div>
        </div>

        <div class="row z">
            <div class="container1">

                    <div class="clearfix"></div>
                    <div class ="recenta-works">
                        <div class="col-md-12">
                            <div class="container">
                            <?php foreach ($datas as $data) {?>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                        <div class="recent-work-wrap">

                                            <img class="img-responsive" src="<?php echo $data['LinkAnh']; ?>"" alt="">
                                            <div class="overlay">
                                                <div class="recent-work-inner">


                                                    <h4 class="extra-title" > <?php echo $data['TieuDe']; ?> </h4>
                                                    <center><?php echo $data['MoTa'] ?></center>
                                                    <a class="preview" href="tab1.php?id=<?php echo $data['Id']; ?>" ><i class="glyphicon glyphicon-eye-open"></i> Xem Thêm </a>

                                                </div>
                                            </div>

                                        </div>
                                </div>


                                <?php
                                            }

                                            ?>
                            </div><!-- row container-->
                        </div><!--col-md-->
                    </div>
            </div><!--content-->
        </div><!--row content-->


        <div class="row end">
            <div class="container1">
                <div class="col-md-12">
                <div class="footer">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="">
                            <div id="text-2" class="widget widget_text"><h5 class="widget-title">CÔNG TY CỔ PHẦN LOUIS VIỆT NAM</h5>

                                <a class="navbar-brand" href="index.php"><img src="images/LOGOCHuanpng.png" alt="logo"></a>

                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3 ">
                            <div id="text-2" class="widget widget_text"><h5 class="widget-title">CÔNG TY CỔ PHẦN LOUIS VIỆT NAM</h5>
                                <div class="textwidget">
                                <b>Hotline </b> : 0931.831.888 - 0931.831.666
                                <b>Email </b> : sales@louisvietnam.vn</br>
                                <b>Website </b> :  http://louisvietnam.vn</br>
                                <b>Office </b> : 2102 CT4 Hyundai Hillstate, Tô Hiệu, Hà Cầu, Hà Đông, Hà Nội
                                </div>
                            </div>
                    </div><!--/ .col-sm-6 .col-md-3 -->

                    <div class="col-xs-12 col-sm-6 col-md-3">

                            <div id="text-2" class="widget widget_recent_entries">
                            <h5 class="widget-title">TIN TỨC</h5>
                            <ul>
                                <li>
                                    <a href="#">Cross Gallery Post</a>
                                    <span class="post-date"></br>15/05/2015</span>
                                </li>
                                <li>
                                    <a href="#">Post with Self Hosted Video</a>
                                    <span class="post-date"></br>09/11/2014</span>
                                </li>
                                <li>
                                    <a href="#">Post with Quote</a>
                                    <span class="post-date"></br>09/11/2014</span>
                                </li>
                            </ul>
                            </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="widget widget_subscription">
                            <h5 class="widget-title">LIÊN HỆ VỚI CHÚNG TÔI</h5>
                            <p>Nhập Email của bạn để nhận những tin tức mới nhất từ chúng tôi.</p>
                            <form method="post" class="subscription-form" enctype="multipart/form-data">
                            <input type="hidden" name="subscription_form" value="subscription_form_58ac28637a094" />
                            <p class="input-block type-input">
                            <input id="email_58ac28637a094" required type="email" name="subscriber_email" value="" placeholder="Type your Email *" />
                            </p>
                            <button class="button default" type="submit">Gửi Đi</button>
                            <div class="subscription_form_responce" style="display: none;"><ul></ul></div>
                            </form>
                        </div><!--/ .widget-container-->
                    </div>
                    </div>
                    </div>
            </div><!--container1-->
        </div><!--row footer-->
    </div>
</body>
</html>

