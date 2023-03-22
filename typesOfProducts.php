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
    
    if(isset($_GET["error"])){
        if($_GET["error"] == "T"){
            echo "<p class='merrors'>Ти си търговец, за да пазаруваш трябва да си купувач!</p>";
        }else if($_GET["error"] == "notlogged"){
            echo "<p class='merrors'>За да пазаруваш трябва да имаш профил като купувач!</p>";
            echo "<a class='regbtn' href='register.php'>Регистрирай се!</a>";
        }
    }

    if(isset($_GET["type"])){
        if($_GET["type"] == "fruit"){
            
            $query = "SELECT * FROM `items` WHERE `type`= 'fruit' ORDER BY `items`.`productPrice` ASC;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

        }else if($_GET["type"] == "vegi"){
            
            $query = " SELECT * FROM `items` WHERE `type`= 'vegi' ORDER BY `items`.`productPrice` ASC;;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

        }else if($_GET["type"] == "meat"){
           
            $query = " SELECT * FROM `items` WHERE `type`= 'meat' ORDER BY `items`.`productPrice` ASC;;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

        }else if($_GET["type"] == "fish"){
            
            $query = " SELECT * FROM `items` WHERE `type`= 'fish' ORDER BY `items`.`productPrice` ASC;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}
            
        }else if($_GET["type"] == "milkP"){
            
            $query = " SELECT * FROM `items` WHERE `type`= 'milkP' ORDER BY `items`.`productPrice` ASC;;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

        }
        else if($_GET["type"] == "drinks"){
            
            $query = " SELECT * FROM `items` WHERE `type`= 'drinks' ORDER BY `items`.`productPrice` ASC;;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

    }
        else if($_GET["type"] == "salami"){
            $query = " SELECT * FROM `items` WHERE `type`= 'salami' ORDER BY `items`.`productPrice` ASC;;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

    }
        else if($_GET["type"] == "deli"){
            $query = " SELECT * FROM `items` WHERE `type`= 'deli' ORDER BY `items`.`productPrice` ASC;;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

    }
        else if($_GET["type"] == "frozen"){
            $query = " SELECT * FROM `items` WHERE `type`= 'frozen' ORDER BY `items`.`productPrice` ASC;;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

    }
        else if($_GET["type"] == "bio"){
            $query = " SELECT * FROM `items` WHERE `type`= 'bio' ORDER BY `items`.`productPrice` ASC;;";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);
        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}

    }
        else if($_GET["type"] == "all"){
            $query = " SELECT * FROM `items` ORDER BY `items`.`productPrice` ASC";

        $result = mysqli_query($con, $query);
        $resultCheck = mysqli_num_rows($result);

        echo "<div class='filter-container'>";
        echo "<div class='filter'>";
        echo "<form action='filterProd.php' method='post'>";
        echo "<label for='typeOfProd'>Вид продукт: </label><select name='typeOfProd' class='typeOfProd'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select>";
        echo "</div>";
        echo "<div class='filter-button'>";
        echo "<input type='submit' name='submit' value='Филтрирай'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";

        if($resultCheck > 0){
            while ($row = mysqli_fetch_assoc($result)){
                
                echo "<div class='addedProduct'>";
                echo "<form action='checkout.php' method='post'>";
                echo "<ul class='addedProducts'>";
                echo "<li><p>Добави продукт</p></li>";
                echo "<div>";
                echo "<li class='prodN'>" . $row['productName'] . "</li>";
                echo "<select name='prodN' class='flipID'><option value='" . $row['productName'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                echo "<select name='prodP' class='flipID'><option value='" . $row['productPrice'] . "'></select>";
                echo "</div>";
                echo "<div>";
                echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                echo "<select name='merchName' class='flipID'><option value='" . $row['userName'] . "'></select>";
                echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                echo "</div>";
                echo "<div class='addButton'>";
                echo "<li><input type='submit' name='buyProduct' value='Купи'></li>";
                echo "</div>";
                echo "</ul>";
                echo "</form>";
                echo "</div>";
}}
    }
    }
    ?>
    </body>




</html>