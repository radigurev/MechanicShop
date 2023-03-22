<?php

session_start();

require_once 'dbConnect.php';

if(isset($_POST['deletes'])){
    $prdID = $_POST['prodID'];
    $sqli = "DELETE FROM `items` WHERE `flipID` = $prdID;";

    $q = mysqli_query($con, $sqli);
    header("location: myprofile.php?profile=add");
    exit();
  
}else{
    header("location: myprofile.php?did't-add");
    exit();
}



