<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign up - srtdash</title>
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
                <form role="form" method="POST" enctype="multipart/form-data">
                                        <div class="login-form-head">
                        <h4>Sign up</h4>
                        <p>Hello there, Sign up and Join with Us</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1" >Username</label>
                            <input type="text" id="exampleInputName1" name="txt_username">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1" >Email address</label>
                            <input type="email" id="exampleInputEmail1" name="txt_email">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1" >Password</label>
                            <input type="password" id="exampleInputPassword1" name="txt_password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2" >Confirm Password</label>
                            <input type="password" id="exampleInputPassword2" name="txt_retype_password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                        <b class="text-muted mb-3 mt-4 d-block">Gender</b>
                        <div class="custom-control custom-radio">
                                                <input type="radio" checked id="MALE" name="txt_gender" class="custom-control-input" value="MALE">MALE
                                                <label class="custom-control-label" for="MALE"></label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="FEMALE" name="txt_gender"  value="FEMALE" class="custom-control-input">FEMALE
                                                <label class="custom-control-label" for="FEMALE"></label>
                                            </div>
                        <div class="form-gp">
                        <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="txt_avatar">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                        </div>
                        <div class="form-gp">
                        <b class="text-muted mb-3 d-block">Hobby:</b>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" checked class="custom-control-input" id="customCheck1" name="txt_hobby[]" value="Football">Football
                                                <label class="custom-control-label" for="customCheck1"></label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" checked class="custom-control-input" id="customCheck2"  name="txt_hobby[]" value="Code">Code
                                                <label class="custom-control-label" for="customCheck2" " ></label>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" checked class="custom-control-input" name="txt_hobby[]" id="customCheck3" value="Sing">Sing
                                                <label class="custom-control-label" for="customCheck3"  ></label>
                                            </div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputName1" >address</label>
                            <input type="text" id="exampleInputName1" name="txt_address"> 
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="btn_submit">Submit <i class="ti-arrow-right"></i></button>
                            <div class="login-other row mt-4">
                            </div>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Have an account? <a href="login.php">Sign in</a></p>
                        </div>
                    </div>
                </form>
                <?php 
                                        include("../controls.php");


                                        if(isset($_POST["btn_submit"])) {
                                            $count = new tbl_user();
                                            $user_info = $count->select_user($_POST["txt_username"]);

                                            if(empty($_POST['txt_username'])) {
                                               echo "<script> alert('Chưa nhập tên đăng nhập') </script>"; 
                                            } 
                                            elseif (empty($_POST["txt_password"])) {
                                                echo "<script> alert('Chưa nhập mật khẩu') </script>"; 
                                            }
                                            elseif ($_POST["txt_password"] != $_POST['txt_retype_password']) {
                                                echo "<script> alert('Mật khẩu nhập lại không đúng') </script>"; 
                                            }
                                           
                                            elseif (mysqli_num_rows($user_info) == 1){                                          
                                                    echo "<script> alert('Ten dang nhap da ton tai')</script>";
                                            }
                                                else{
                                                    move_uploaded_file($_FILES["txt_avatar"]["tmp_name"], "../UPLOAD/" . $_FILES["txt_avatar"]["name"]);
    
                                                    $username = $_POST["txt_username"];
                                                    $password = $_POST["txt_password"];
                                                    $gender = $_POST["txt_gender"];
                                                    $address = $_POST["txt_address"];
                                                    $hobbies = $_POST["txt_hobby"];
                                                    $avatar_path = $_FILES["txt_avatar"]["name"];
                                                    $email = $_POST["txt_email"];
        
                                                    $hobby_str = "";
                                                    
                                                    if(isset($hobbies)) {
                                                        foreach($hobbies as $hobby) {
                                                            $hobby_str .= ($hobby . " ");
                                                        }                                                
                                                    }
                                                    $tbl_user = new tbl_user();
                                                    if($tbl_user->insert($username, $password, $gender, $address, $hobby_str, $avatar_path, $email)) {
                                                        echo "<script> alert('đăng ký thành công') </script>";
                                                    } else {
                                                        echo "<script> alert('đăng ký thất bại') </script>";
                                                    }
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