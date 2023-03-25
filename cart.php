<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include_once 'header.php';
    include_once 'dbConnect.php';
    include_once 'functions.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_SESSION["userid"];
        $sql = "SELECT GROUP_CONCAT(i.productName separator '; ') products,sum(i.productPrice*c.quantity) sum, i.userId,c.cartProdID FROM `cart` c JOIN `items` i on i.Id = c.itemId JOIN `users` u ON u.Id = i.userId where c.userID = ".$userId." group by c.userID";
        $res = mysqli_query($con,$sql);
        
        while ($row = mysqli_fetch_array($res)) {
        $insert = "INSERT INTO cartpurchase(merchant,buyer,purchasePrice,orderedProducts) VALUES(".$row['userId'].",".$userId.",".$row['sum'].",'".$row['products']."')";
        mysqli_query($con,$insert);
        $delete = "DELETE FROM cart where userID =".$userId;
        mysqli_query($con,$delete);
        }

        header("location: cart.php");
    }
    
    if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "0") {
    echo '<form method="post" action="cart.php">';
    echo '<button type="submit" id="cart-button">Направи поръчка</button>';
    echo '</form>';
    }
    ?>
    <table id="table">
        <tr>
            <th>Продукт</th>
            <?php
            if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "0")
            echo '<th>Брой</th>';
            else
            echo '<th>Адрес</th>';
            ?>
            <th>Продавач</th>
            <th>Цена(Общо)</th>
        </tr>
        <?php
        if (isset($_SESSION["userid"])) {
            if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "0") {
            $userId = $_SESSION["userid"];
            $sql = "SELECT * FROM `cart` c JOIN `items` i on i.Id = c.itemId JOIN `users` u ON u.Id = i.userId where c.userID =" . $userId;
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo '<td>'.$row['productName'].'</td>';
                echo '<td>'.$row['quantity'].'</td>';
                echo '<td>Име: '.$row['Name'].'/Номер: '.$row['Phone'].'/Email: '.$row['Email'].'</td>';
                echo '<td>'.$row['productPrice']*$row['quantity'].'лв</td>';
                echo "</tr>";
            }
            }else if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "1") {
                $userId = $_SESSION["userid"];
                $sql = "SELECT * FROM `cartpurchase` c JOIN users u ON c.buyer = u.Id where c.merchant =" . $userId;
                $result = mysqli_query($con, $sql);
    
                while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo '<td>'.$row['orderedProducts'].'</td>';
                    echo '<td>'.$row['address'].'</td>';
                    echo '<td>Име: '.$row['Name'].'/Номер: '.$row['Phone'].'/Email: '.$row['Email'].'</td>';
                    echo '<td>'.$row['purchasePrice'].'лв</td>';
                    echo "</tr>";
                }
            }
        }
        ?>
    </table>
</body>

</html>