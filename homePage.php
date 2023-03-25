<!DOCTYPE html>
<html lang="en">

    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
<?php
include_once 'header.php';
?>
<div class="container">
  <input type="checkbox" id="check">
  <div class="login form">
    <header>Търсачка</header>
    <form action="searchProducts.php" method="get">
      <input name="name" type="text" placeholder="Name">
      <input name="minPrice" type="number" placeholder="min price">
      <input name="maxPrice" type="number" placeholder="min price">
      <select name="type">
          <option value="">Изберете вид</option>
          <option value="piston">Бутало</option>
          <option value="pads">Накладки</option>
          <option value="clutch">Съединител</option>
      </select>
      <input style="background-color: #6B728E" type="submit" name="submit" class="button" value="Търси">
    </form>
</div>
</div>
</body>
</html>