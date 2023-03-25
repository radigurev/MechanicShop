<?php

session_start();
?>

<header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
  <link href="navbar.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <header>
        <nav>
            <a href="homePage.php"><img src="photos/logo.png" class="logo"></img> </a>
            
            <ul class="nav-links">
            
            <?php
            
// if(isset($_SESSION["useremail"])){
//     if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "K"){
//         echo "<li><a href='myprofile.php'>Профил</a></li>";
//         echo "<li><a href='checkout.php'>Кошница</a></li>";
//         echo "<li><a class='products-link' href='typesOfProducts.php?type=all'>Продукти</a></li>";
//         echo "<li><a href='logout.php'>Изход</a></li>";
//     }else if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "T"){
//         echo "<li><a href='myprofile.php?profile=add'>Профил</a></li>";
//         echo "<li><a class='products-link' href='typesOfProducts.php?type=all'>Продукти</a></li>";
//         echo "<li><a href='logout.php'>Изход</a></li>";
//     }else if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "D"){
//         echo "<li><a href='myprofile.php'>Профил</a></li>";
//         echo "<li><a class='products-link' href='typesOfProducts.php?type=all'>Продукти</a></li>";
//         echo "<li><a href='logout.php'>Изход</a></li>";
//     }
// }else{
//     echo "<li><a class='loginbtn' href='login.php'>Вход</a></li>";
//     echo "<li><a href='register.php'>Регистрация</a></li>";
//     echo "<li><a class='products-link' href='typesOfProducts.php?type=all'>Продукти</a></li>";
// }

?>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <div class="product-nav">
        <ul class="product-links">

        <li><a href="typesOfProducts.php?type=fruit">Плодове</a></li>
        <li><a href="typesOfProducts.php?type=vegi">Зеленчуци</a></li>
        <li><a href="typesOfProducts.php?type=meat">Месо</a></li>
        <li><a href="typesOfProducts.php?type=fish">Риба</a></li>
        <li><a href="typesOfProducts.php?type=milkP">Млечни </a></li>
        <li><a href="typesOfProducts.php?type=drinks">Напитки</a></li>
        <li><a href="typesOfProducts.php?type=salami">Колбаси</a></li>
        <li><a href="typesOfProducts.php?type=deli">Деликатеси</a></li>
        <li><a href="typesOfProducts.php?type=frozen">Замразени </a></li>
        <li><a href="typesOfProducts.php?type=bio">Био</a></li>

        </ul>
        </div>
        <script src="burger.js"></script>
        <script src="script.js"></script> -->
        <nav class="navbar navbar-expand-lg navbar-dark">
<div class="container-fluid">
	<a class="navbar-brand" href="#"><i class="fa-solid fa-gear fa-2xl"></i></a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="main_nav">
		<ul class="navbar-nav">
			<li class="nav-item active"> <a class="nav-link" href="homePage.php">Home </a> </li>
			<?php
				if(isset($_SESSION["useremail"])){
					if(isset($_SESSION['usertype']) && trim($_SESSION['usertype']) == "1") {
						echo "<li class='nav-item active'> <a class='nav-link' href='neProduct.php'>Add Product</a></li>";
					}
				}
				?>
			<li class="nav-item dropdown has-megamenu">
				<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"> Mega menu  </a>
				<div class="dropdown-menu megamenu" role="menu">
					<div class="row g-3">
						<div class="col-lg-3 col-6">
							<div class="col-megamenu">
								<h6 class="title">Title Menu One</h6>
								<ul class="list-unstyled">
									<li><a href="typesOfProducts.php?type=clutch">Съединител</a></li>
									<li><a href="typesOfProducts.php?type=piston">Бутало</a></li>
									<li><a href="typesOfProducts.php?type=pads">Накладки</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
								</ul>
							</div>  <!-- col-megamenu.// -->
						</div><!-- end col-3 -->
						<div class="col-lg-3 col-6">
							<div class="col-megamenu">
								<h6 class="title">Title Menu Two</h6>
								<ul class="list-unstyled">
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
								</ul>
							</div>  <!-- col-megamenu.// -->
						</div><!-- end col-3 -->
						<div class="col-lg-3 col-6">
							<div class="col-megamenu">
								<h6 class="title">Title Menu Three</h6>
								<ul class="list-unstyled">
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
								</ul>
							</div>  <!-- col-megamenu.// -->
						</div>    
						<div class="col-lg-3 col-6">
							<div class="col-megamenu">
								<h6 class="title">Title Menu Four</h6>
								<ul class="list-unstyled">
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
									<li><a href="#">Custom Menu</a></li>
								</ul>
							</div>  <!-- col-megamenu.// -->
						</div><!-- end col-3 -->
					</div><!-- end row --> 
				</div> <!-- dropdown-mega-menu.// -->
			</li>
		</ul>
		<ul class="navbar-nav ms-auto">
      <?php if(empty($_SESSION["useremail"])){ 
        echo "<li class='nav-item'><a class='nav-link' href='login.php'>Вход</a></li>";
        echo "<li class='nav-item'><a class='nav-link' href='register.php'>Регистрация</a></li>";
      }
        ?>
		</ul>
	</div> <!-- navbar-collapse.// -->
</div> <!-- container-fluid.// -->
</nav>
    </header> 

