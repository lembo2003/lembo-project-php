<?php 
  include('../controls.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Online Store Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Online Store <em>Website</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

                <li class="nav-item"><a class="nav-link" href="products.html">Products</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="about-us.html">About Us</a>
                      <a class="dropdown-item" href="blog.html">Blog</a>
                      <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                      <a class="dropdown-item" href="terms.html">Terms</a>
                    </div>
                </li>
                
                <li class="nav-item active"><a class="nav-link" href="checkout.html">Checkout</a></li>

                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>Lorem ipsum dolor sit amet</h4>
              <h2>CART</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <form action="" method="POST">
              <div class="">
                <div>
                <div class="p" style="align:center;">
                    <div class="">
                        <div class="">
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th>Tên hàng</th>
                                            <th>Hình ảnh</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng (nhập số lượng bạn muốn mua)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sum = 0;
                                            if(!empty($_SESSION["orders"])) {
                                                $i = 0;
                                                foreach($_SESSION["orders"] as $order) {    
                                                    $sum += $order["product"]["price"] * $order["number_buy"];                                                     
                                        ?>
                                                    <tr> 
                                                        <td> 
                                                            <?php echo $order["product"]["product_name"] ?> 
                                                        </td>
                                                        <td> 
                                                            <img src="../UPLOAD/<?php echo $order["product"]["picture"] ?>" alt="" style="width: 100px;">
                                                        </td>
                                                        <td> 
                                                            <?php echo $order["product"]["price"] ?> 
                                                        </td>
                                                        <td> 
                                                            <div class="form-group">
                                                              <label>Số lượng : </label>
                                                              <input type="number" name="txt_quantity" style="margin: 0; width: 300px; border-radius: 10px;" value="<?php echo $order["number_buy"] ?>">
                                                              <br>

                                                              <button 
                                                                type="button" 
                                                                name="btn_update"
                                                                onclick="
                                                                  if(confirm('Sửa số lượng mua sản phẩm này?')) {
                                                                    let number = document.getElementsByName('txt_quantity')[<?php echo $i ?>].value;
                                                                    window.location = 'update_order.php?i=<?php echo $i ?>&number=' + number;
                                                                  }"
                                                                >
                                                                Update
                                                              </button> 

                                                              &nbsp;&nbsp;&nbsp;

                                                              <button 
                                                                type="button" 
                                                                name="btn_delete"
                                                                onclick="                                                               
                                                                  if(confirm('Xóa sản phẩm này ra khỏi giỏ hàng?')) {
                                                                    window.location = 'delete_order.php?i=<?php echo $i ?>';
                                                                  }"
                                                                >
                                                                Delete
                                                              </button> 
                                                            </div>                                                          
                                                        </td>
                                                    </tr>
                                        <?php 
                                                    $i += 1;
                                                }
                                            }
                                        ?>
                                        
                                        <tr> 
                                          <td colspan="4" style="text-align: right;"> 
                                            <?php echo "Thành tiền : ". $sum ?>
                                          </td>
                                        </tr>

                                        <tr>
                                            <td style="text-align: right;" colspan="4">
                                              <h5>
                                                <a href="products.php" style="float: left; margin-top: 20px;"> 
                                                  << Tiếp tục mua hàng
                                                </a> 
                                              </h5>
                                              <button type="submit" name="btn_submit">
                                                Đặt hàng
                                              </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                  <div>
                  </div>
                </div>
              </div>
            </form>

            <?php
                if(isset($_POST["btn_submit"])) {
                    if(!empty($_SESSION["orders"])) {
                        $tbl_user_order = new tbl_user_order();
                        $tbl_user = new tbl_user();
                        $user_id = $tbl_user->select_user($_SESSION["username"])->fetch_assoc()["user_id"];

                        if($tbl_user_order->insert($_SESSION["orders"], $user_id, $sum)) {
                            $_SESSION["orders"] = array();
                            echo "<script> alert('Đặt hàng thành công') </script>";                           
                            echo "<script> window.location = 'order_information.php' </script>";
                        } else {
                            echo "<script> alert('Lỗi') </script>";
                        }
                    }
                }         
            ?>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright © 2020 Company Name - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>

</html>
