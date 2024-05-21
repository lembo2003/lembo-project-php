<?php 
    include("../controls.php");

    $tbl_product = new tbl_product();
    if($tbl_product->delete($_GET["id"])) {
        echo "<script> alert('Xóa sản phẩm thành công!!') </script>";
        header("location:select_products.php");
    } else {
        echo "<script> alert('Lỗi!!') </script>";
    }