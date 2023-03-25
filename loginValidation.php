<?php
echo "submited";
if(isset($_POST)) {
    echo "in";
    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'dbConnect.php';
    require_once 'functions.php';

if(emptyInputLogin($email, $password) !== false){
    header("location: login.php?error=emptyinput");
    exit();
}
echo "login";
loginUser($con, $email, $password);
echo "logged";
}else{
    echo "out";
    header("location: login.php");
    exit();
}