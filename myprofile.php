<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <?php

include_once 'header.php';
include_once 'dbConnect.php';
include_once 'functions.php';

?>
<body>

 
    <?php
            
        if(isset($_SESSION["useremail"])){
                if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "T"){
                    echo "<ul class='sidebar'>";
                    echo "<li><a href='myprofile.php?profile=orders'>Поръчки</a></li>";
                    echo "<li><a href='myprofile.php?profile=add'>Добави Продукт</a></li>";
                    echo "</ul>";

                }}
        
    ?>
            
            
                <?php
            
            if(isset($_SESSION["useremail"])){
                     if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "T"){
                         if($_GET["profile"] == "add"){
                        echo "<div class='addProduct'>";
                        echo "<form action='addProduct.php' method='post'>";
                        echo "<ul class='addProducts'>";
                        echo "<li><p>Добави продукт</p></li>";
                        echo "<div>";
                        echo "<li class='ptype'><label for='productType'>Вид продукт: </label><select name='productType' id='productType'><option value='fruit'>Плод</option><option value='vegi'>Зеленчук</option><option value='meat'>Месо</option><option value='fish'>Риба</option><option value='milkP'>Млечни</option><option value='drinks'>Напитки</option><option value='salami'>Колбаси</option><option value='deli'>Деликатеси</option><option value='frozen'>Замразени</option><option value='bio'>Био</option></select></li>";
                        echo "</div>";
                        echo "<div>";
                        echo "<li><input type='text' name='productName' placeholder='Име на продукта' required></li>";
                        echo "</div>";
                        echo "<div>";
                        echo "<li><input type='text' name='productPrice' placeholder='Цена на продукта' required></li>";
                        echo "</div>";
                        echo "<div class='addButton'>";
                        echo "<li><input type='submit' name='addSubmit' value='Добави'></li>";
                        echo "</div>";
                        echo "</ul>";
                        echo "</form>";
                        echo "</div>";
                        if(isset($_SESSION['userid'])){
                            $id = (int) $_SESSION['userid'];
                            $query = " SELECT * FROM `items` WHERE `id`= $id;";

                            $result = mysqli_query($con, $query);
                            $resultCheck = mysqli_num_rows($result);

                            if($resultCheck > 0){
                                while ($row = mysqli_fetch_assoc($result)){
                                    
                                    echo "<div class='addedProduct'>";
                                    echo "<form action='delPRod.php' method='post'>";
                                    echo "<ul class='addedProducts'>";
                                    echo "<li><p>Добави продукт</p></li>";
                                    echo "<li class='prodN'>" .  $row['productName'] .  "</li>";
                                    echo "<li class='prodP'>" . $row['productPrice'] . " лв." . "</li>";
                                    echo "<li class='merchant'> От " . $row['userName'] . "</li>";
                                    echo "<select name='prodID' class='flipID'><option value='" . $row['flipID'] . "'></select>";
                                    echo "<div class='addButton'>";
                                    echo "<li><input type='submit' name='deletes' value='Изтрий'></li>";
                                    echo "</div>";
                                    echo "</ul>";
                                    echo "</form>";
                                    echo "</div>";
                                                                 
        }
                                    
    }
    
}}if($_GET["profile"] == "orders"){
    $name = (string) $_SESSION["userName"];
    $query = "SELECT * FROM `cartpurchase` WHERE `merchantName`='$name' ORDER BY `cartpurchase`.`order_id` ASC;";
    $result = mysqli_query($con, $query);
    $resultCheck = mysqli_num_rows($result);
    echo "<table class='content-table'>";
    echo"<thead>";
            echo "<tr>";
                echo "<td>ПРОДУКТИ: </td>";
                echo "<td>НАЧИН НА ДОСТАВКА: </td>";
                echo "<td>АДРЕС: </td>";
                echo "<td>ОБЩА ЦЕНА НА ПОКУПКА: </td>";
                echo "<td>НОМЕР НА ПОКУПКА: </td>";
                echo "</tr>";
                echo"</thead>";
                echo"<tbody>";
    if($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            
                echo "<tr>";
                echo "<td>". $row['orderedProducts'] ."</td>";
                echo "<td>". $row['wayOfDelivery'] ."</td>";
                echo "<td>". $row['address'] ."</td>";
                echo "<td>". $row['purchasePrice'] ."лв.</td>";
                echo "<td>". $row['order_id'] ."</td>";
                echo "</tr>";

                
        }}
        echo"</tbody>";
        echo "</table>";
}} 
if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "K"){
    if(isset($_SESSION['userid'])){
        $id = (int) $_SESSION['userid'];
        $query = " SELECT * FROM `cartpurchase` WHERE `buyerName`= $id ORDER BY `cartpurchase`.`order_id` ASC;";

        $result = mysqli_query($con, $query);
    $resultCheck = mysqli_num_rows($result);
    echo "<table class='content-table'>";
    echo"<thead>";
            echo "<tr>";
                echo "<td>ПРОДАВАЧ: </td>";
                echo "<td>ПРОДУКТИ: </td>";
                echo "<td>НАЧИН НА ДОСТАВКА: </td>";
                echo "<td>АДРЕС: </td>";
                echo "<td>ОБЩА ЦЕНА НА ПОКУПКА: </td>";
                echo "<td>НОМЕР НА ПОКУПКА: </td>";
                echo "</tr>";
                echo"</thead>";
                echo"<tbody>";
    if($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            
                echo "<tr>";
                echo "<td>". $row['merchantName'] ."</td>";
                echo "<td>". $row['orderedProducts'] ."</td>";
                echo "<td>". $row['wayOfDelivery'] ."</td>";
                echo "<td>". $row['address'] ."</td>";
                echo "<td>". $row['purchasePrice'] ."лв.</td>";
                echo "<td>". $row['order_id'] ."</td>";
                echo "</tr>";

                
        }}
        echo"</tbody>";
        echo "</table>";
}







}}
        ?>             
</body>