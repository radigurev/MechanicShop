<?php
session_start();

require_once 'dbConnect.php';
require_once 'functions.php';

if(isset($_GET['item']) && isset($_GET['type']) && isset($_GET['page'])) {
    
    $userId = $_SESSION["userid"];
    $item = $_GET['item'];
    $type = $_GET['type'];
    $page = $_GET['page'];

    addToCart($con,$item,$userId,$type,$page);
}else {
    header("location: homePage.php");
    exit();
}

?>
