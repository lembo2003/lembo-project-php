<?php 
    session_start();
    if(!empty($_SESSION["orders"])) {
        array_splice($_SESSION["orders"], $_GET["i"], 1);
        header("location:cart.php");
    } 