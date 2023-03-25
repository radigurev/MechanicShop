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

    if (isset($_SESSION["userid"])) {
        $userId = $_SESSION["userid"];
        $sql = "SELECT * FROM users where Id =" . $userId;
        $result = mysqli_query($con, $sql);
        $currentUser = mysqli_fetch_assoc($result);
    }
    ?>
    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Профил</header>
            <form action="updateProfile.php" method="post">
                <input type="text" name="user" value="<?php echo $currentUser['Name'] ?>" placeholder="username">
                <input type="text" name="email" value="<?php echo $currentUser['Email'] ?>" placeholder="email">
                <input type="text" name="number" value="<?php echo $currentUser['Phone'] ?>" placeholder="phone">
                <input type="text" name="address" value="<?php echo $currentUser['address'] ?>" placeholder="address">
                <input type="password" name="oldPassword" placeholder="Old Password">
                <input type="password" name="newPassword" placeholder="New Passowrd">
                <input type="password" name="confirmPassword" placeholder="Confirm Password">
                <input type="submit" class="button" value="Промени">
            </form>
            <?php if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Попълнете всички полета!</p>";
                }else if ($_GET["error"] == "oldpass") {
                    echo "<p>Попълнете поле за стара парола!</p>";
                }else if ($_GET["error"] == "newpass") {
                    echo "<p>Попълнете поле за нова парола!</p>";
                }else if ($_GET["error"] == "nonmatch") {
                    echo "<p>Паролите не съвпадат!</p>";
                }else if ($_GET["error"] == "woldpass") {
                    echo "<p>Грешна стара парола!</p>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>