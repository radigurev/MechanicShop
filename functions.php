<?php
function emptyInputSignup($name, $email, $phone, $password)
{
    return empty($name) || empty($email) || empty($phone) || empty($password);
}

function emptyUpdate($name, $email, $phone, $address)
{
    return empty($name) || empty($email) || empty($phone) || empty($address);
}

function emptyInputProduct($name, $img, $type, $price)
{
    return empty($name) || empty($img) || empty($price) || empty($type);
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailExists($con, $email)
{
    $sql = "SELECT * FROM `users` WHERE `Email` = ?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: register.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;

    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($con, $name, $email, $phone, $password, $choice)
{
    $sql = "INSERT INTO `users` (`Name`, `Email`, `Phone`, `Password`, `Choice`) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: register.php?error=stmtfailed");
        exit();
    }


    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $phone, $password, $choice);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: login.php");
    exit();
}

function addToCart($con, $ItemId, $userId, $type, $page)
{
    $sql = "SELECT * FROM `cart` WHERE itemId = " . $ItemId . " and userID = " . $userId . ";";
    $result = mysqli_query($con, $sql);

    $firstRow = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $sql = "UPDATE `cart` SET quantity = " . $firstRow['quantity'] + 1 . " WHERE itemId = " . $ItemId . " and userID = " . $userId . ";";
        mysqli_query($con,$sql);
    } else {
        $sql = "INSERT INTO `cart` (`userID` ,`itemId`, `quantity`) VALUES (?, ?, 1);";
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: typesOfProducts.php?error=stmtfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $userId, $ItemId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    header('location: typesOfProducts.php?type=' . $type . '&page=' . $page);
    exit();
}


function emptyInputLogin($email, $password)
{
    return empty($email) || empty($password);
}

function loginUser($con, $email, $password)
{
    $emailExists = emailExists($con, $email);

    if ($emailExists === false) {

        header("location: login.php?error=wrongemail");
        exit();
    }
    $s = "SELECT * FROM `users` WHERE `Email` = '$email' && `Password` = '$password';";

    $result = mysqli_query($con, $s);

    $num = mysqli_num_rows($result);

    if ($num === 0) {
        header("location: login.php?error=profiledoesntexist");
        exit();
    } else {
        session_start();
        $_SESSION["userid"] = $emailExists["Id"];
        $_SESSION["useremail"] = $emailExists["Email"];
        $_SESSION["usertype"] = $emailExists["Choice"];
        $_SESSION["userName"] = $emailExists["Name"];


        header("location: homePage.php");
        exit();
    }

}

function addProduct($con, $userId, $productType, $productName, $productPrice, $img)
{
    $sql = "INSERT INTO `items` (`userId`, `type`, `productName`, `productPrice`,`image`) VALUES (?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($con);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: neProduct.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssss", $userId, $productType, $productName, $productPrice, $img);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: neProduct.php");

    exit();
}

function updateUser($con, $name, $email, $phone, $address,$userId) {
    $sql = "UPDATE users SET `Name` = '".$name."', Email = '".$email."', `Phone` = '".$phone."', `address` = '".$address."' where Id = ".$userId;
    mysqli_query($con,$sql);

    header("location: profile.php");
    exit();
}

function updatePassword($con,$password,$newPassword,$userId) {
    $sql = "SELECT * FROM `users` WHERE `Id` = ?;";
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: profile.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    
    $resultData =mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
    
    if($resultData['Password'] == $password) {
        $sql = "UPDATE `users` SET `Password` = '".$newPassword."' where Id = ".$userId;
        mysqli_query($con,$sql);
    }else {
        header("location: profile.php?error=woldpass");
        exit();
    }

}