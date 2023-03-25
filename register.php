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

?>

<body>
<div class="bg-image"></div>

    <div class="container">
        <input type="checkbox" id="check">
        <div class="login form">
            <header>Register</header>
            <form action="registration.php" method="post">
                <input type="text" name="user" placeholder="username">
                <input type="text" name="email" placeholder="email">
                <input type="text" name="number" placeholder="phone">
                <input type="password" name="password" placeholder="password">
                <div class="toggle-button-cover">
                    <div class="button-cover">
                        <div class="button r" id="button-1">
                            <input id="checkbox" name="choice" type="checkbox" class="checkbox" />
                            <div class="knobs"></div>
                            <div class="layer"></div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <p id="text"> Клиент</p>
                <input type="submit" class="button" value="Регистрация">
            </form>
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
        </div>
    </div>
</body>

<script>
    var text = document.getElementById('text');
    var check = document.querySelector("input[name=choice]");

    check.addEventListener('change', function () {
        if (this.checked) {
            text.innerText = "Търговец";
        } else {
            text.innerText = "Клиент";
        }
    });
</script>

</html>