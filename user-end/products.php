<?php
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
          <a class="navbar-brand" href="index.html"><h2>Lembo <em>Shop</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
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
                
                <li class="nav-item"><a class="nav-link" href="checkout.html">Checkout</a></li>

                <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                <li class="nav-item">
                  <?php 
                    if(!empty($_SESSION["username"])) {
                      echo "<p style='color: white; margin: 0;'> Hello " . $_SESSION["username"] . "</p>";
                      echo "<a class='nav-link' href='logout.php'>Logout</a>";
                    } else {
                      echo "<a class='nav-link' href='login.php'>Login</a>";
                    }
                  ?>                 
                </li>
                <li class="nav-item">
                  <?php
                  if(!empty($_SESSION["username"])){
                    echo "<a href='../admin-end/login.php' class='nav-link'>Go to admin</a>";
                  }
                  ?>
                  
                </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>HI</h4>
            <h2>I love you</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>HELLO</h4>
            <h2>Who are you?</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>LEMBO</h4>
            <h2>Que unta ?</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>ALL PRODUCT</h2>
              
            </div>
          </div>

          <?php 
          include('../controls.php');
          $tbl_product = new tbl_product();
          $products = $tbl_product->select_all();

          foreach($products as $product) {
        ?>
                  <div class="col-md-4">
            <div class="product-item">
              <a href="product-details.php?id=<?php echo $product['product_id'] ?>"><img src="../UPLOAD/<?php echo  $product['picture'] ?>" alt=""></a>
              <div class="down-content">
                <a href="product-details.php?id=<?php echo $product['product_id'] ?>"><h4><?php echo $product['product_name'] ?></h4></a>
                <h6> <?php echo $product['price'] ?></h6>
                <p><?php echo $product['description'] ?></p>
              </div>
            </div>
          </div>
          <?php 
          }
          ?>
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


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
  </body>
</html>