<?php 
session_start();

if(isset($_POST)){
    require_once 'dbConnect.php';
    require_once 'functions.php';

    $userId = $_SESSION["userid"];
    $name = $_POST['user'];
    $email = $_POST['email'];
    $phone = $_POST['number'];
    $address = $_POST['address'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if(emptyUpdate($name, $email, $phone, $address) !== false){
        header("location: profile.php?error=emptyinput");
        exit();
    }

    if(!empty($oldPassword) || !empty($newPassword) || !empty($confirmPassword)) {
        if(empty($oldPassword)) {
        header("location: profile.php?error=oldpass");
        exit();
        }
        else if(empty($newPassword)) {
            header("location: profile.php?error=newpass");
            exit();
        }else if($newPassword !== $confirmPassword) {
            header("location: profile.php?error=nonmatch");
        }
        updatePassword($con,$oldPassword,$newPassword,$userId);
        echo $oldPassword;
    }
    updateUser($con,$name,$email,$phone,$address,$userId);
}
?>