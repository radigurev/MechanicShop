<?php

if(isset($_POST["submit"])){

$name = $_POST['user'];
$email = $_POST['email'];
$phone = $_POST['number'];
$password = $_POST['password'];
$choice = $_POST['choice'];

require_once 'dbConnect.php';
require_once 'functions.php';

if(emptyInputSignup($name, $email, $phone, $password) !== false){
    header("location: register.php?error=emptyinput");
    exit();
}

if(invalidEmail($email) !== false){
    header("location: register.php?error=invalid_email");
    exit();
}

if(emailExists($con, $email) !== false){
    header("location: register.php?error=existing_email");
    exit();
}

createUser($con, $name, $email, $phone, $password, $choice);

}else{
    header("location: register.php");
    exit();
}