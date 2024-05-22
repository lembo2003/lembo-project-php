<?php
session_start();

if (isset($_SESSION['orders'])) {
  foreach($_SESSION['orders'] as $item) {
    // Access product and number_buy directly within the loop
    echo 'Product: ' . $item['product']['product_name'] . ', Quantity: ' . $item['number_buy'] . '<br />'; 
  }
} else {
  echo 'No orders found in the session.';
}
session_destroy();
?>
