<?php

session_start();

require_once 'dbConnect.php';
require_once 'functions.php';
if(isset($_POST["addSubmit"])){
    if(isset($_SESSION["userid"]) && isset($_SESSION["userName"])){
        $userName = $_SESSION["userName"];
        $userId = $_SESSION["userid"];
        $productType = $_POST['productType'];
        $productName = $_POST['productName'];
        $productPrice = $_POST['productPrice'];

addProduct($con, $userName, $userId, $productType, $productName, $productPrice);

    }   
}else{
    header("location: myprofile.php?did't-add");
    exit();
}