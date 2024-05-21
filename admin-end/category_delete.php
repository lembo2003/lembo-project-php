<?php 
    include("../controls.php");

    $tbl_category = new tbl_category();
    $tbl_product = new tbl_product();

    if($tbl_category->delete($_GET["id"]) && $tbl_product->delete_by_category($_GET["name"])) {
        echo "<script> alert('Xóa thành công!!') </script>";
        header("location:category_select.php");
    } else {
        echo "<script> alert('Lỗi!!') </script>";
    }