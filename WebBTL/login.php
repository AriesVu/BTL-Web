<?php
include("lib_db.php");
include("checklogin.php");
$user = getLoggedUser();
if ($user) {
    header("Location:admin/index.php");
    exit();
}
//nho sua lai ten db trong file lib_db.php dong 12
//1. get input
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";

$error = '';
$checkLogin = 1;
$user = 0;
if (isset($_REQUEST["username"])){
    //da nhap thong tin
    //2. Kiem tra
    //2.1.1 tao sql
    $sql ="select * from user";
    $sql .=" where username='{$username}'";
    //echo "sql=[$sql]"; exit();
    //2.1.2 Thuc thi sql
    $user = select_one($sql);
    //print_r($user);exit();
    //co user
    if (!$user){
        //thuc hien co user o day
        $checkLogin = 0;
        $error = 'TÊN ĐĂNG NHẬP KHÔNG CHÍNH XÁC ! VUI LÒNG THỬ LẠI';
    }else{
        //kiem tra pass
        if (md5($password) != $user['password']){
            $checkLogin = 0;
            $error = 'MẬT KHẨU KHÔNG CHÍNH XÁC ! VUI LÒNG THỬ LẠI';
        }
    }
    //dung
    if ($checkLogin){
        //session_start();
        setLoggedUser($user);
        //$_SESSION['user'] = $user;
        //print_r($_SESSION['user']);exit();
        //echo "Ban da login thanh cong,username[$username],password=[$password]";
        //exit();
        //chuyen den trang account
        header("Location:admin/index.php");
        exit();
    }
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Login|Thiết kế Nội Thất</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/Web.css">
        <!--<link rel="stylesheet" href="css/animate.min.css">-->
        <script src="boostrap/js/jquery.min.js"></script>
        <script src="boostrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/Web.css"/>
      <style>
         body{
         padding: 70px 0px;
         margin: auto;
         }
      </style>
   </head>
        <body>
                <div class="container">
                <div class="dangnhap">
                        <?php  if ($error){ ?>
                            <li><?php echo $error ;?></li>
                        <?php } ?>
                            <p><h1>LOGIN</h1></p>

                                <form action="login.php">
                                    <div class="imgcontainer">
                                    <img src="images/LOGOCHuanpng.png" alt="Avatar" class="avatar">
                                </div>
                                <br><label><b>Username</b></label>
                                <input type="text" placeholder="Enter Username" name="username" required value="<?php echo $username ?>"/></br>

                                <br><label><b>Password</b></label>
                                <input type="password" placeholder="Enter Password" name="password" required></br>
                                <br/>
                                <button type="submit">LOGIN</button>
                                <input type="checkbox" checked="checked"> REMEMBER ME

                                </form>
                        </div>
                </div><!-- div.container -->
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
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                  <script src="js/jquery.min.js"></script>
                  <script src="js/bootstrap.min.js"></script>
   </body>
</html>
