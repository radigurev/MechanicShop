<?php

session_start();

require_once 'dbConnect.php';
require_once 'functions.php';
if(isset($_POST)){
    if(isset($_SESSION["userid"])){
        $userId = $_SESSION["userid"];
        $productType = $_POST['type'];
        $productName = $_POST['name'];
        $productPrice = $_POST['price'];
        $img = $_POST['image'];

        if(emptyInputProduct($productName,$img,$productType,$productPrice) !== false) {
            // echo $productName." ";
            // echo $productPrice." ";
            // echo $productType." ";
            // echo $img." ";
            header("location: neProduct.php?error=emptyinput");
            exit();
        }

addProduct($con, $userId, $productType, $productName, $productPrice,$img);
    }   
}else{
    header("location: neProduct.php");
    exit();
}