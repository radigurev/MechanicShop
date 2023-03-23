<?php
function emptyInputSignup($name, $email, $phone, $password){
    $result= false;
    if(empty($name) || empty($email) || empty($phone) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email){
    $result = false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emailExists($con, $email){
      $sql = "SELECT * FROM `users` WHERE `Email` = ?;";
      $stmt = mysqli_stmt_init($con);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: register.php?error=stmtfailed");
        exit();
      }

      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);

      $resultData = mysqli_stmt_get_result($stmt);

      if($row = mysqli_fetch_assoc($resultData)){
          return $row;

      }else{
          $result = false;
          return $result;
      }

      mysqli_stmt_close($stmt);
}

function createUser($con, $name, $email, $phone, $password, $choice){
    $sql = "INSERT INTO `users` (`Name`, `Email`, `Phone`, `Password`, `Choice`) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: register.php?error=stmtfailed");
      exit();
    }


    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $password, $choice);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: login.php");
      exit();
}

function addToCart($con, $merchName, $prodN, $prodP, $prodID){
    $sql = "INSERT INTO `cart` (`userName` ,`productName`, `productPrice`, `userID`) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: typesOfProducts.php?error=stmtfailed");
      exit();
    }


    mysqli_stmt_bind_param($stmt, "ssss", $merchName, $prodN, $prodP, $prodID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: checkout.php?noerror=stana");
      exit();
}


function emptyInputLogin($email, $password){
    $result= false;
    if(empty($email) || empty($password)){
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function loginUser($con, $email, $password){
    header("location: nigger.php");
    $emailExists = emailExists($con, $email);

if($emailExists === false){

    header("location: login.php?error=wrongemail");
      exit();
}
$s = " SELECT * FROM `users` WHERE `Email` = '$email' && `Password` = '$password';";

$result = mysqli_query($con, $s);

$num = mysqli_num_rows($result);

if($num === 0){
    header("location: login.php?error=profiledoesntexist");
    exit();
}else if($num === 1){
    session_start();
    $_SESSION["userid"]=$emailExists["Id"];
    $_SESSION["useremail"]=$emailExists["Email"];
    $_SESSION["usertype"]=$emailExists["Choice"];
    $_SESSION["userName"]=$emailExists["Name"];


    header("location: homePage.php");
    exit();
}

}

function addProduct($con, $userName, $userId, $productType, $productName, $productPrice){
    $sql = "INSERT INTO `items` (`userName`,`id`, `type`, `productName`, `productPrice`) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("location: myprofile.php?error=stmtfailed");
      exit();
    }


    mysqli_stmt_bind_param($stmt, "sssss", $userName, $userId, $productType, $productName, $productPrice);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    header("location: myprofile.php?profile=add");

      exit();
}
