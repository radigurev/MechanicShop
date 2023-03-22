<?php

if(isset($_POST["submit"])){

$filteredType = $_POST['typeOfProd'];

if($filteredType == "fruit"){
    header("location: typesOfProducts.php?type=fruit");
    exit();
}
if($filteredType == "meat"){
    header("location: typesOfProducts.php?type=meat");
    exit();
}
if($filteredType == "vegi"){
    header("location: typesOfProducts.php?type=vegi");
    exit();
}
if($filteredType == "fish"){
    header("location: typesOfProducts.php?type=fish");
    exit();
}
if($filteredType == "milkP"){
    header("location: typesOfProducts.php?type=milkP");
    exit();
}
if($filteredType == "drinks"){
    header("location: typesOfProducts.php?type=drinks");
    exit();
}
if($filteredType == "salami"){
    header("location: typesOfProducts.php?type=salami");
    exit();
}
if($filteredType == "deli"){
    header("location: typesOfProducts.php?type=deli");
    exit();
}
if($filteredType == "bio"){
    header("location: typesOfProducts.php?type=bio");
    exit();
}
if($filteredType == "frozen"){
    header("location: typesOfProducts.php?type=frozen");
    exit();
}

}else{
    header("location: typesOfProducts.php?type=all");
    exit();
}