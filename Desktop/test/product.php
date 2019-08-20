<?php

		require_once "classes/classItems.php";
		include "classes/classUser.php";
		$id = $_GET["id"];
		$items = new items;
		$loginid = $_SESSION["loginid"];
		$result = $items->specificSearchItem($id);
		$result2 = $items->getCartQuantity($loginid);
	
?>



<!DOCTYPE html>
<html lang="en">
<head>
<title>Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Wish shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/product.css">
<link rel="stylesheet" type="text/css" href="styles/product_responsive.css">
</head>
<body>

<div class="super_container">
	
	<!-- Header -->

	<header class="header">
		<div class="header_inner d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="index.php">NEIGHBOR HOOD</a></div>
			<nav class="main_nav">
				<ul>
					<li><a href="index.php">home</a></li>
					<li><a href="categories.php">items</a></li>
					<li><a href="contact.php">contact</a></li>
					<li><a href="logout.php">logout</a></li>
				</ul>
			</nav>
			<div class="header_content ml-auto">
				<div class="search header_search">
					<form action="index.php">
						<input type="search" class="search_input" required="required">
						<button type="submit" id="search_button" class="search_button"><img src="images/magnifying-glass.svg" alt=""></button>
					</form>
				</div>
				<div class="shopping">
					<!-- Cart -->
					<a href="cart.php">
						<div class="cart">
							<img src="images/shopping-bag.svg" alt="">
							<div class="cart_num_container">
								<div class="cart_num_inner">
									<div class="cart_num"><?php echo $result2 ?></div>
								</div>
							</div>
						</div>
					</a>

			<div class="burger_container d-flex flex-column align-items-center justify-content-around menu_mm"><div></div><div></div><div></div></div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>
		<div class="logo menu_mm"><a href="index.php">NEIGHBOR HOOD</a></div>
		<div class="search">
			<form action="#">
				<input type="search" class="search_input menu_mm" required="required">
				<button type="submit" id="search_button_menu" class="search_button menu_mm"><img class="menu_mm" src="images/magnifying-glass.svg" alt=""></button>
			</form>
		</div>
		<nav class="menu_nav">
			<ul class="menu_mm">
				<li class="menu_mm"><a href="index.php">home</a></li>
				<li class="menu_mm"><a href="categoryies.php">items</a></li>
				<li class="menu_mm"><a href="cantact.php">contact</a></li>
				<li class="menu_mm"><a href="logout.php">logout</a></li>
			</ul>
		</nav>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/product.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_container">
						<div class="home_content">
							<div class="home_title">Man</div>
							<div class="breadcrumbs">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li>Man</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product -->

	<div class="product">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="current_page">
						<!-- <ul>
							<li><a href="categories.php">Woman's Fashion</a></li>
							<li><a href="categories.php">Swimsuits</a></li>
							<li>2 Piece Swimsuits</li>
						</ul> -->
					</div>
				</div>
			</div>
			<div class="row product_row">

				<!-- Product Image -->
				<div class="col-12">
					<div class="product_image">
					
						<?php foreach($result as $row){ ?>	
						<div class="product_image_large"><img src="images/<?php echo $row["itemimage"]?>" alt=""></div>
						<div class="product_image_thumbnails d-flex flex-row align-items-start justify-content-start">
							<!-- <div class="product_image_thumbnail" style="background-image:url(images/product_image_1.jpg)" data-image="images/product_image_1.jpg"></div>
							<div class="product_image_thumbnail" style="background-image:url(images/product_image_2.jpg)" data-image="images/product_image_2.jpg"></div>
							<div class="product_image_thumbnail" style="background-image:url(images/product_image_4.jpg)" data-image="images/product_image_4.jpg"></div> -->
						</div>
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-12">
					<div class="product_content">
						<div class="product_name"><?php echo $row["itemname"]?></div>
						<div class="product_price"><?php echo $row["itemprice"]?></div>
						<!-- <div class="rating rating_4" data-rating="4">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div> -->
						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="in_stock in_stock_true"></div>
							<span><?php if($row["itemstock"] >= 0){
								 echo $row["itemstock"];
							}else{ echo "SOLD OUT";
							}?></span>
						</div>
						<div class="product_text">
							<p><?php echo $row["itemcomment"]?></p>
						</div>
						<?php }?>
						<!-- Product Quantity -->
						<div class="product_quantity_container">
							<span>Quantity</span><br><br>
							<form action="UserAction.php" method="post">
								<input type="number" name="quantity" required="required">
						</div>
						<!-- Product Size -->
						<div class="product_size_container">
							<span>Size</span>
							<div class="product_size">
								<ul class="d-flex flex-row align-items-start justify-content-start">
									<?php echo $row["itemsize"]?>
								</ul>
							</div><br><br>
								<input type="hidden" name="loginid" value="<?php echo $loginid ?>">
								<input type="hidden" name="price" value="<?php echo $row["itemprice"] ?>">
								<input type="hidden" name="itemid" value="<?php echo $row["itemid"] ?>">
								<input type="submit" name="putitem" value="Add to Cart" class="w-50 btn-primary " style="height:46px; font-size: 30px;">
							</form>
						</div>
					</div>
				</div>
			</div>

			

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="footer_logo"><a href="index.php">NEIGHBOR HOOD</a></div>
					<nav class="footer_nav">
						<ul>
							<li><a href="index.php">home</a></li>
							<li><a href="categories.php">items</a></li>
							<li><a href="contact.php">contact</a></li>
							<li><a href="logout.php">logout</a></li>
						</ul>
					</nav>
					<div class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>NEIGHBOR　HOOD CO. LTD, ALL RIGHTS RESERVED <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/product_custom.js"></script>
</body>
</html>