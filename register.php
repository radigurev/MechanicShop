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

?>

<body>
<div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="#">
        <input type="text" placeholder="Enter your email">
        <input type="password" placeholder="Enter your password">
        <input type="button" class="button" value="Login">
      </form>
    </div>
  </div>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Попълнете всички полета!</p>";
            } else if ($_GET["error"] == "invalidemail") {
                echo "<p>Невалиден имейл!</p>";
            } else if ($_GET["error"] == "existingemail") {
                echo "<p>Този имейл вече съществува!</p>";
            } else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Нещо се обърка!</p>";
            } else if ($_GET["error"] == "none") {
                echo "<p>Поздравления създадохте своя профил!</p>";
            }
        }
        ?>
</body>



</html>