<?php

session_start();

require_once 'dbConnect.php';

if(isset($_GET['ProductId'])) {
    $id = $_GET['ProductId'];

    $sql = 'DELETE FROM `cart` itemId'.$id;
    $result = mysqli_query($con,$sql);
    
    $sql = 'DELETE FROM items WHERE Id ='.$id;
    $type = $_GET['type'];

    $result = mysqli_query($con,$sql);
    header('location: typesOfProducts.php?type=' . $type);
}
?>


