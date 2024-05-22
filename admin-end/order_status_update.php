<?php 
    include("../controls.php");

    $tbl_user_order = new tbl_user_order();
    $tbl_user_order->update_status($_GET["id"], $_GET["stt"]);
    echo "<script> window.location = 'order_select.php' </script>";