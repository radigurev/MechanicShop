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
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="loginValidation.php" method="post">
        <input name="email" type="text" placeholder="Enter your email">
        <input name="password" type="password" placeholder="Enter your password">
        <input style="background-color: #6B728E" type="submit" name="submit" class="button" value="Login">
      </form>

    <?php  if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Попълнете всики полета!</p>";
        }else if($_GET["error"] == "wrongemail"){
            echo "<p>Грешен имейл!</p>";
        }else if($_GET["error"] == "wrongpassword"){
            echo "<p>Грешна парола!</p>";
    }
}
?>
    </div>
  </div>
</body>

</html>