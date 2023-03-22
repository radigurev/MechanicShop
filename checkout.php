<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>MYWEBSHIT</title> 

    </head>
<?php

include_once 'header.php';
include_once 'dbConnect.php';
include_once 'functions.php';
?>
    <body>
        <?php
        if(isset($_SESSION["useremail"])){
        if(isset($_POST["buyProduct"])){
                
            if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "K"){
            
                $prodID= $_SESSION["userid"];
                $prodN= $_POST['prodN'];
                $prodP= $_POST['prodP'];
                $merchName= $_POST['merchName'];

                addToCart($con, $merchName, $prodN, $prodP, $prodID);
            }
            
            if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "T"){
                header("location: typesOfProducts.php?error=T");
                exit();
            }
        }
    }else{
        header("location: typesOfProducts.php?error=notlogged");
                exit();
    }
        ?>

        <?php
        $userID= $_SESSION["userid"];
        $query = "SELECT * FROM `cart` WHERE `userID`=$userID;";
        $sum=0;
        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                $sum += $row['productPrice'];
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" .  $row['productName'] .  "</li>";

                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";

                echo "</div>";
                echo "<select name='cartProdID' class='flipID'><option value='" . $row['cartProdID'] . "'></select>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='deleteFromCart' value='Премахни'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}

echo "<div class='cartBuy'>";
echo "<form action='checkout.php' method='post'>";
echo "<select name='delivery' class='delivery'><option value='Лично Взимане'>Взимане от място</option><option value='Доставка'>Доставяне на място</option></select>";
echo "<select name='adress' class='flipID'><option value='Ще си го вземе.'></select>";
if(isset($_POST["getDelivSum"])){
        $deliveryType = $_POST["delivery"];
        if($deliveryType == "Доставка"){

        echo "<input type='text' name='adress' class='delivery' placeholder='Въведете адрес' required>";

}
}

echo "<h3>Цена на всичко: " . $sum . " лв.</h3>";
echo "<div class='priceBTN'>";
echo "<input type='submit' name='getDelivSum' value='Пресметни цена'>";
echo "</div>";
echo "<div class='buyBtn'>";
echo "<input type='submit' name='buyFromCart' value='Поръчай'>";
echo "</div>";
echo "</form>";
echo "</div>";

}else{
    echo "<p class='cartprod'>Добавете продукти!</p>";
}
if(isset($_POST["buyFromCart"])){
    $wayOfDelivery = $_POST['delivery'];
    $address = $_POST['adress'];
    $purchasePrice = $sum;
    $sqliii = "INSERT INTO  `cartpurchase` (merchantName, buyerName, orderedProducts) VALUES ('new','order','bruv')";
    if(mysqli_query($con, $sqliii)){
        $last_id = mysqli_insert_id($con); 
        
    }
    $SQL = "INSERT INTO  `cartpurchase` (order_id, merchantName, buyerName, orderedProducts) SELECT $last_id, userName, userID, productName FROM `cart` WHERE  `userID` = $userID;";
    $sql = "UPDATE `cartpurchase` SET `wayOfDelivery` ='$wayOfDelivery', `address` ='$address', `purchasePrice` = '$purchasePrice' WHERE `purchasePrice` = 0;";

    // $squery = "DELETE FROM `cart` WHERE `userID` = $userID;";

    $othrSTMT = mysqli_query($con, $SQL);
    $STMT=mysqli_query($con, $sql);
    
    // $query = mysqli_query($con, $squery);

    header("location: checkout.php");
        exit();

}

if(isset($_POST["deleteFromCart"])){
    $prdID = $_POST['cartProdID'];
    $sqli = "DELETE FROM `cart` WHERE `cartProdID` = ?;";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $sqli)){
        header("location: checkout.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $prdID);
    mysqli_stmt_execute($stmt);

    header("location: checkout.php");
        exit();
}

        ?>

    </body>




</html>