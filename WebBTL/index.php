<?php
include("lib_db.php");
$sql2="select * from btl_chitiet order by id desc limit 8 ";
$dangs2 = select_list($sql2);
$sql3="select * from btl_chitiet where IdDanhmuc='1' order by id desc limit 8 ";
$dangs3 = select_list($sql3);
$sql4="select * from btl_chitiet where IdDanhmuc='2' order by id desc limit 8 ";
$dangs4 = select_list($sql4);
$sql5="select * from btl_chitiet where IdDanhmuc='3' order by id desc limit 8 ";
$dangs5 = select_list($sql5);
$sql6="select * from btl_chitiet where IdDanhmuc='4' order by id desc limit 8 ";
$dangs6 = select_list($sql6);
$sql7="select * from btl_danhmuc where cid='1' ";
$dangs7 = select_list($sql7);
$sql8="select * from btl_danhmuc where cid='2' ";
$dangs8 = select_one($sql8);
//print_r($dangs8);exit() ;
$sql9="select * from btl_danhmuc where cid='3' " ;
$dangs9 = select_one($sql9);

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
<link rel='stylesheet' id='tmm_grid-css'  href="css/min/grid.css?ver=4.5.6" type='text/css' media='all' />
<link rel="stylesheet" href="css/Web.css"/>

</head>

<body>
    <div id ="wrapper">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-inverse navbar-fixed-top navbar-fixed-top" role="banner">
                    <div class="container ">
                        <div class="col-md-4 ">
                            <div class="navbar-header navbar-fixed-top ">
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
                                <li class="active"><a href="#">TRANG CHỦ</a></li>
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
                        </div>
                    </div><!--/container-->
                </nav><!--/nav-->
            </div>
        </div><!-- row header-->

        <div class="row">
            <div class="col-md-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="slider">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="images/anh-bia-1.jpg" width="100%" alt="1">
                                    <div class="carousel-caption"></div>
                                </div>
                                <div class="item">
                                    <img src="images/anh-bia-2.jpg" width="100%" alt="2">
                                    <div class="carousel-caption"></div>
                                </div>
                                <div class="item">
                                    <img src="images/anh-bia-3.jpg" width="100%" alt="3">
                                    <div class="carousel-caption"></div>
                                </div>
                            </div>
                                <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--row slider-->

        <div class="row ">
            <div class="container1">

                    <div class=" col-md-12 ">
                        <h2 class="" style="font-weight: 300;text-align: center; margin-bottom: 0px; line-height: 1.4em; color: #000000; "><b><i>LOUIS DESIGN</i></b> tự hào là thương hiệu hàng đầu Việt Nam</h2>
                        <h2 class="" style="font-weight: 300;text-align: center; margin-bottom: 40px; line-height: 1.4em; color: #000000; ">Chúng tôi cung cấp các giải pháp hữu ích cho không gian sống của bạn</h2>

                    </div><!--col-md-12-->
                    <div class="clearfix"></div>

            </div><!--/ .container1-->
        </div><!--row -->

        <div class="row z">
            <div class="content">
                    <div class="center wow fadeInDown">
                        <h2>DỰ ÁN TIÊU BIỂU</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class ="recenta-works">
                        <div class="col-md-12">
                            <div class="container">
                            <?php if($dangs2) foreach ($dangs2 as $dang) {?>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                        <div class="recent-work-wrap">

                                            <img class="img-responsive" src="<?php echo $dang['LinkAnh']; ?>"" alt="">
                                            <div class="overlay">
                                                <div class="recent-work-inner">


                                                    <h4 class="extra-title" > <?php echo $dang['TieuDe']; ?> </h4>
                                                    <center><?php echo $dang['MoTa'] ?></center>
                                                    <a class="preview" href="tab1.php?id=<?php echo $dang['Id']; ?>" ><i class="glyphicon glyphicon-eye-open"></i> Xem Thêm </a>

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

        <div class="row z">
            <div class="content">
                    <div class="center wow fadeInDown">
                        <h2>NỘI THẤT TRUNG CƯ</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class ="recenta-works">
                        <div class="col-md-12">
                            <div class="container">
                            <?php if($dangs3) foreach ($dangs3 as $dang) {?>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                        <div class="recent-work-wrap">

                                            <img class="img-responsive" src="<?php echo $dang['LinkAnh']; ?>"" alt="">
                                            <div class="overlay">
                                                <div class="recent-work-inner">


                                                    <h4 class="extra-title" > <?php echo $dang['TieuDe']; ?> </h4>
                                                    <center><?php echo $dang['MoTa'] ?></center>
                                                    <a class="preview" href="tab1.php?id=<?php echo $dang['Id']; ?>" > <i class="glyphicon glyphicon-eye-open"></i> Xem Thêm </a>

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

        <div class="row z">
            <div class="content">
                    <div class="center wow fadeInDown">
                        <h2>NỘI THẤT BIỆT THỰ</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class ="recenta-works">
                        <div class="col-md-12">
                            <div class="container">
                            <?php if($dangs4) foreach ($dangs4 as $dang) {?>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                        <div class="recent-work-wrap">

                                            <img class="img-responsive" src="<?php echo $dang['LinkAnh']; ?>"" alt="">
                                            <div class="overlay">
                                                <div class="recent-work-inner">


                                                    <h4 class="extra-title" > <?php echo $dang['TieuDe']; ?> </h4>
                                                    <center><?php echo $dang['MoTa'] ?></center>
                                                    <a class="preview" href="tab1.php?id=<?php echo $dang['Id']; ?>" > <i class="glyphicon glyphicon-eye-open"></i> Xem Thêm </a>

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

        <div class="row z">
            <div class="content">
                    <div class="center wow fadeInDown">
                        <h2>NỘI THẤT lÂU ĐÀI</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class ="recenta-works">
                        <div class="col-md-12">
                            <div class="container">
                            <?php if($dangs5) foreach ($dangs5 as $dang) {?>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                        <div class="recent-work-wrap">

                                            <img class="img-responsive" src="<?php echo $dang['LinkAnh']; ?>"" alt="">
                                            <div class="overlay">
                                                <div class="recent-work-inner">


                                                    <h4 class="extra-title" > <?php echo $dang['TieuDe']; ?> </h4>
                                                    <center><?php echo $dang['MoTa'] ?></center>
                                                    <a class="preview" href="tab1.php?id=<?php echo $dang['Id']; ?>" > <i class="glyphicon glyphicon-eye-open"></i> Xem Thêm </a>

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

        <div class="row z">
            <div class="content">
                    <div class="center wow fadeInDown">
                        <h2>THIẾT KẾ KIẾN TRỨC</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class ="recenta-works">
                        <div class="col-md-12">
                            <div class="container">
                            <?php if($dangs6) foreach ($dangs6 as $dang) {?>
                                <div class="col-xs-12 col-sm-4 col-md-3">
                                        <div class="recent-work-wrap">

                                            <img class="img-responsive" src="<?php echo $dang['LinkAnh']; ?>"" alt="">
                                            <div class="overlay">
                                                <div class="recent-work-inner">


                                                    <h4 class="extra-title" > <?php echo $dang['TieuDe']; ?> </h4>
                                                    <center><?php echo $dang['MoTa'] ?></center>
                                                    <a class="preview" href="tab1.php?id=<?php echo $dang['Id']; ?>" > <i class="glyphicon glyphicon-eye-open"></i> Xem Thêm </a>

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

        <div class="row c">
            <div class="introduce">
                <div class="container">
                    <div class="center wow fadeInDown">
                        <h2>ĐỐI TÁC CỦA CHÚNG TÔI</h2>

                    </div>

                <div class="partners">
                    <ul>
                        <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" src="images/vincostone.png"></a></li>
                        <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" src="images/tanhoangminh.png"></a></li>
                        <li> <a href="#"><img class="img-responsive wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms" src="images/HAGL.png"></a></li>

                    </ul>
                </div>
            </div><!--/.container-->



            </div><!--introduce-->
        </div><!-- row introduce-->

        <div class="row ">
            <div class="col-ms-12">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="slider">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            </ol>
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="images/abc.png" width="100%" alt="1">
                                    <div class="carousel-caption">
                                        <i class="glyphicon glyphicon-paperclip"></i>
                                        <h4> Cảm ơn công ty đã tạo nên không gian sống thật tuyệt cho gia đình mình. Các bạn rất có tài và có tâm.</h4>
                                        <p>Hoàng Lê Vy</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="images/abc.png" width="100%" alt="2">
                                    <div class="carousel-caption">
                                        <i class="glyphicon glyphicon-paperclip"></i>
                                        <h4>Rất hài lòng với sản phẩm mà công ty đã hoàn thiện cũng như thái độ phục vụ của các bạn. Chúc các bạn ngày càng phát triển và thành công hơn trong tương lai. Thân !</h4>

                                        <div class="quote-author">Lê Thúy</div>
                                            </div>
                                    </div>
                                </div>

                            </div>
                                <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
        </div><!--row slider 2-->

        <div class="row end">
            <div class="container1">
                <div class="col-md-12">
                <div class="footer">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="">
                            <div id="text-2" class="widget widget_text"><h5 class="widget-title">CÔNG TY CỔ PHẦN LOUIS VIỆT NAM</h5>

                                <a class="navbar-brand" href="index.html"><img src="images/LOGOCHuanpng.png" alt="logo"></a>

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

    </div><!--wrapper-->
</body>
</html>
