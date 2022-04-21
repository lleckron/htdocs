<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="scripts.js"></script>

</head> 
<body>
    <?php 
    require("includes/header.php");
    ?>

<div class="container">
    <div class="heading">
        <h2>Checkout</h2>
    </div>
    <?php
        require("includes/connect2db.inc.php");
        $cid = $_SESSION['id'];
        $fn = $_POST['firstName'];
        $ln = $_POST['lastName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $total = $_SESSION['Order_Total'];
        $sql = "INSERT INTO ORDERS(First_Name,Last_Name,Email,Address,City,State,Zip,Order_Total,Customer_Id) VALUES ('$fn','$ln','$email','$address','$city','$state','$zip','$total','$cid')";
        if($connection->query($sql) == true) {
            echo "<p class=\"correct\"><b>Order successfully placed</b></p>";
            echo "<p>Thank you for shopping with us</p>";
            $sql = "DELETE FROM CART WHERE Customer_Id LIKE '".$_SESSION['username']."_%'";
            $result = mysqli_query($connection, $sql) or die(mysql_error($connection));
            $_SESSION['Order_Total'] = [];
        } else {
            echo "<p>There was an issue submitting your suggestion. Please check your connection.</p>";
            echo "Error: " . $connection -> error;
        }
        $connection->close();
    ?>
</div>
</body>
    <?php 
    require("includes/footer.php");
    ?>
</html>