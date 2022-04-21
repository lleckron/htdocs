<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../scripts.js"></script>
</head>
<body>
	<?php 
    require("../includes/directoriesHeader.php");
    ?>
<div class="container">
    <div class="heading">
		<h2>Products</h2>
	</div>
	<ul class="products-list">
		<li><div class="shoppingBackground">
			<a class="tile" href="motherboards.php">
				<img alt="motherboards" src="../images/motherboard.jpg">
				<div class="product_name">Motherboards</div>
			</a></div>
		</li>
		<li><div class="shoppingBackground">
			<a class="tile" href="processors.php">
				<img alt="motherboards" src="../images/processor.jpg">
				<div class="product_name">Processors</div>
			</a></div>
		</li>
		<li><div class="shoppingBackground">
			<a class="tile" href="videocards.php">
				<img alt="motherboards" src="../images/videocard.jpg">
				<div class="product_name">Video Cards</div>
			</a></div>
		</li>
	</ul>
</div>	
</body>
	<?php 
    require("../includes/directoriesFooter.php");
    ?>
</html>