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
    <section class="wrapper">
        <div class="container-fostrap">
            <div class="content">
                <div class="container" style="box-shadow: none;background-color:transparent;">
                    <div class="row">
                        <?php
                        $results_per_page = 3;

                        if (isset($_GET["type"])) {
                            if ($_GET["type"] == "filtered") {
                                $type = $_GET['ptype'];
                                $productName = $_GET['name'];
                                $minPrice = $_GET['minPrice'];
                                $maxPrice = $_GET['maxPrice'];
                                $isAdded = false;
                                $query = "SELECT * FROM `items` WHERE ";
                                if (!empty($type)) {
                                    $query .= "type ='" . $type . "' ";
                                    $isAdded = true;
                                }
                                if (!empty($productName)) {
                                    if($isAdded)
                                    $query .= "and ";
                                    $query .= "`productName` like '%" . $productName . "%' ";
                                }
                                if (!empty($minPrice)) {
                                    if($isAdded)
                                    $query .= "and ";

                                    $query .= "`productPrice` >=" . $minPrice . " ";
                                }
                                if (!empty($maxPrice)) {
                                    if($isAdded)
                                    $query .= "and ";
                                    $query .= "`productPrice` <=" . $maxPrice . " ";
                                }
                                $result = mysqli_query($con, $query);

                                $number_of_results = mysqli_num_rows($result);

                                if (empty($_GET['page'])) {
                                    $page = 1;
                                } else {
                                    $page = $_GET['page'];
                                }

                                $this_page_first_result = ($page - 1) * $results_per_page;
                                $query2 = $query;
                                $query2 .= " LIMIT " . $this_page_first_result . ',' . $results_per_page;
                                $result = mysqli_query($con, $query2);

                                while ($row = mysqli_fetch_array($result)) {
                                    echo '<div class="col-xs-12 col-sm-4">';
                                    echo '<div class="card">';
                                    echo '<img class="img-card" src=' . $row['image'] . ' />';
                                    echo '<div class="card-content">';
                                    echo '<h4 class="card-title">';
                                    echo '</h4>';
                                    echo '<p class="">';
                                    echo $row['productName'];
                                    echo '</p>';
                                    echo '<p class="">';
                                    echo 'Цена:' . $row['productPrice'] . 'лв';
                                    echo '</p>';
                                    echo '</div>';
                                    echo '<div class="card-read-more">';
                                    if (empty($_SESSION["useremail"])) {
                                        echo '<a href="login.php" class="btn btn-link btn-block">';
                                        echo 'Добави в количка';
                                        echo '</a>';
                                    } else if (isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "1" && $_SESSION["userid"] == $row['userId']) {
                                        echo '<a href="delPRod.php?ProductId=' . $row['Id'] . '&type=' . $row['type'] . '" class="btn btn-link btn-block">';
                                        echo 'Изтрии';
                                        echo '</a>';
                                    } else if (isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "0") {
                                        echo '<a href="addToCart.php?item=' . $row['Id'] . '&type=' . $row['type'] . '&page=' . $page . '" class="btn btn-link btn-block">';
                                        echo 'Добави в количка';
                                        echo '</a>';
                                    }
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }

                                $number_of_pages = ceil($number_of_results / $results_per_page);
                                echo "<div stlye='float: left;'>";
                                for ($page = 1; $page <= $number_of_pages; $page++) {
                                    echo '<a style="text-decoration:none;" href="typesOfProducts.php?type=filtered&name='.$productName.'&minPrice='.$minPrice.'&maxPrice='.$maxPrice.'&ptype='.$type.'&page='.$page.'">' . $page . ' </a>';
                                }
                                echo "</div>";
                            }
                             else {
                                if (isset($_GET["type"])) {
                                    $type = $_GET["type"];
                                    $query = "SELECT * FROM `items` WHERE `type`= '$type' ORDER BY `items`.`productPrice` ASC;";
                                    $result = mysqli_query($con, $query);

                                    $number_of_results = mysqli_num_rows($result);

                                    if (empty($_GET['page'])) {
                                        $page = 1;
                                    } else {
                                        $page = $_GET['page'];
                                    }

                                    $this_page_first_result = ($page - 1) * $results_per_page;

                                    $query = "SELECT * FROM `items` WHERE `type`= '$type' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                                    $result = mysqli_query($con, $query);

                                    while ($row = mysqli_fetch_array($result)) {
                                        echo '<div class="col-xs-12 col-sm-4">';
                                        echo '<div class="card">';
                                        echo '<img class="img-card" src=' . $row['image'] . ' />';
                                        echo '<div class="card-content">';
                                        echo '<h4 class="card-title">';
                                        echo '</h4>';
                                        echo '<p class="">';
                                        echo $row['productName'];
                                        echo '</p>';
                                        echo '<p class="">';
                                        echo 'Цена:' . $row['productPrice'] . 'лв';
                                        echo '</p>';
                                        echo '</div>';
                                        echo '<div class="card-read-more">';
                                        if (empty($_SESSION["useremail"])) {
                                            echo '<a href="login.php" class="btn btn-link btn-block">';
                                            echo 'Добави в количка';
                                            echo '</a>';
                                        } else if (isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "1" && $_SESSION["userid"] == $row['userId']) {
                                            echo '<a href="delPRod.php?ProductId=' . $row['Id'] . '&type=' . $row['type'] . '" class="btn btn-link btn-block">';
                                            echo 'Изтрии';
                                            echo '</a>';
                                        } else if (isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "0") {
                                            echo '<a href="addToCart.php?item=' . $row['Id'] . '&type=' . $row['type'] . '&page=' . $page . '" class="btn btn-link btn-block">';
                                            echo 'Добави в количка';
                                            echo '</a>';
                                        }
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        // echo '</div>';
                                    }

                                    $number_of_pages = ceil($number_of_results / $results_per_page);
                                    echo "<div stlye='float: left;'>";
                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                        echo '<a style="text-decoration:none;" href="typesOfProducts.php?type=' . $type . '&page=' . $page . '">' . $page . ' </a>';
                                    }
                                    echo "</div>";
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
</body>




</html>