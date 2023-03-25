<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <?php
    include_once 'header.php';
    ?>
     <div class="bg-image"></div>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>New Product</header>
      <form action="addProduct.php" method="post">
        <input name="name" type="text" placeholder="Name">
        <input name="price" type="number" placeholder="Price">
        <input name="image" type="text" placeholder="Image">
        <select name="type">
            <option value="">Изберете вид</option>
            <option value="piston">Бутало</option>
            <option value="pads">Накладки</option>
            <option value="clutch">Съединител</option>
        </select>
        <input style="background-color: #6B728E" type="submit" name="submit" class="button" value="Submit">
        <?php
        if(isset($_GET["error"])){
            echo "<p>Попълнете всики полета!</p>";
        }
        ?>
      </form>
 </div>
  </div>
</body>
</html>