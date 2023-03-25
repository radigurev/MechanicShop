<?php
    $productType = $_GET['type'];
    $productName = $_GET['name'];
    $minPrice = $_GET['minPrice'];
    $maxPrice = $_GET['maxPrice'];

    header('location: typesOfProducts.php?type=filtered&name='.$productName.'&minPrice='.$minPrice.'&maxPrice='.$maxPrice.'&ptype='.$productType);
    exit();
?>