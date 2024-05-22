<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Forgot Password - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="POST">
                    <div class="login-form-head">
                        <h4>Forgot Password</h4>
                        <p>Hey! Forgot Password Your Password ? Reset Now</p>
                    </div>
                    <div class="login-form-body">
                    <div class="form-gp">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" id="exampleInputEmail1" name="txt_username">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>    
                    <div class="form-gp">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" id="exampleInputEmail1" name="txt_email">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="submit-btn-area mt-5">
                            <button id="form_submit" type="submit" name="btn_submit">Reset <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
                <?php 
                        include('../controls.php');
                        include('../PHPMailer/src/DSNConfigurator.php');
                        include('../PHPMailer/src/Exception.php');
                        include('../PHPMailer/src/OAuth.php');
                        include('../PHPMailer/src/PHPMailer.php');
                        include('../PHPMailer/src/POP3.php');
                        include('../PHPMailer/src/SMTP.php');

                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;
                        use PHPMailer\PHPMailer\OAuthTokenProvider;
                        
                        if(isset($_POST["btn_submit"])) {
                            $tbl_user = new tbl_user();
                            $user_info = $tbl_user->select_user($_POST["txt_username"]);

                            if(mysqli_num_rows($user_info) == 1) {  
                                $mail = new PHPMailer(true);
                                try {
                                    $mail->SMTPDebug = 0;
                                    $mail->isSMTP();
                                    $mail->Host = "smtp.gmail.com";
                                    $mail->SMTPAuth = true;
                                    $mail->Username = "lembo0909@gmail.com";
                                    $mail->Password = "kqtl gvga ysmj ytwq";
                                    $mail->SMTPSecure = "tls";
                                    $mail->Port = 587;
                                    $mail->CharSet = "UTF-8";
                                    $mail->setFrom("lembo0909@gmail.com");
                                    $mail->addAddress($_POST["txt_email"], 'Thu Van');
                                    $mail->isHTML(true);
                                    $mail->Subject = "Cảm ơn";
                                    $mail->Body = "Mật khẩu của ban la: ".$user_info->fetch_assoc()["password"];;
                                    $mail->send();
                                    echo "<script>alert('Email has been sent');
                                    window.location='login.php';
                                    </script>";
                                    
                                  
                                
                                } catch (Exception $e) {
                                    echo "Message could not send. Mailer error : " . $mail->ErrorInfo;
                                } 
                                    
                            } else {
                                echo "<script> alert('Tài khoản này không tồn tại') </script>";
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>