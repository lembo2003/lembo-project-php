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
              <h2>ORDER DETAILS</h2>
               <div>
               <div class="row">
          <div class="col-lg-8 offset-lg-2 col-md-8 offset-md-1">
            <div class="panel panel-default">
              <div class="panel-body">
                <?php 
                  $tbl_user = new tbl_user();
                  $tbl_user_order = new tbl_user_order();

                  $user = $tbl_user->select_user($_SESSION["username"])->fetch_assoc(); // 
                  $order = $tbl_user_order->select_last_order()->fetch_assoc();
                ?>

                <div class="table-responsive">
                  <table class="table" style="color:white;">
                    <tbody>
                      <tr> 
                        <td> Tên khách hàng </td>
                        <td> <?php echo $user["username"] ?> </td>
                      </tr>

                      <tr> 
                        <td> Địa chỉ </td>
                        <td> <?php echo $user["address"] ?> </td>
                      </tr>

                      <tr> 
                        <td> Ngày đặt </td>
                        <td> <?php echo $order["order_date"] ?> </td>
                      </tr>

                      <tr>
                        <td colspan="2" style="text-align: left;"> Danh sách sản phẩm </td>
                      </tr>

                      <tr>
                        <table class="table" style="color:white;">
                          <tr>
                            <th>Tên hàng</th>
                            <th>Hình ảnh</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                          </tr>

                          <?php 
                            $order_products = $tbl_user_order->select_order_products($order["order_id"]);

                            foreach($order_products as $product) {
                          ?>
                          
                          <tr> 
                            <td> <?php echo $product["product_name"] ?> </td>
                            <td> 
                              <img src="../UPLOAD/PRODUCT_img/<?php echo $product["picture"] ?>" alt="" style="width: 80px;">
                            </td>
                            <td> <?php echo $product["price"] ?> </td>
                            <td> <?php echo $product["number_buy"] ?> </td>
                          </tr>                     
                          <?php 
                            }
                          ?>

                          <tr>
                            <td>
                              <td colspan="4" style="text-align: right;"> 
                                <?php echo "Thành tiền : ". $order["into_money"] ?>
                              </td>
                            </td>
                          </tr>
                        </table>
                      <tr>
                    </tbody>
                <table>
              </div>
            </div>
          </div>
        </div>
               </div>

            </div>
          </div>
        </div>
      </div>
    </div>

   
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
