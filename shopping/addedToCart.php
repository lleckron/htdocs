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
		<h2>Add to Cart</h2>
	</div>
    <?php
        require("../includes/connect2db.inc.php");
        $customer_id = $_SESSION['id'];
        $product_name = $_POST['product_name'];
        $product_type = $_POST['product_type'];
        $quantity = $_POST['numOfItem'];
        $sql = "INSERT INTO CART(Customer_Id,Product_Name,Product_Type,Quantity) VALUES ('$customer_id','$product_name','$product_type','$quantity')";
        if($connection->query($sql) == true) {
            echo "<p class=\"correct\">Product successfully added to cart.</p>";
            echo "<p><a href=\"../cart.php\">View your cart</a></p>";
        } else {
            echo "There was an error adding this product to your cart. Please contact our help desk for assistance.";
        }
        $connection->close();
    ?>
</div>
</body>
    <?php 
    require("../includes/directoriesFooter.php");
    ?>
</html>