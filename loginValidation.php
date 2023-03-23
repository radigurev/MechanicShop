<?php

if(isset($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];

 require_once 'dbConnect.php';
 require_once 'functions.php';

if(emptyInputLogin($email, $password) !== false){

    header("location: login.php?error=emptyinput");
    exit();
}

loginUser($con, $email, $password);
}else{
    header("location: login.php");
    exit();
}