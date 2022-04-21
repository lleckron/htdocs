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
        <h2>Your Order History</h2>
    </div>
    <?php
    require("includes/connect2db.inc.php");
    $sql = "SELECT Customer_Id,First_Name,Last_Name,Email,Address,City,State,Zip,Order_Total FROM ORDERS WHERE Customer_Id LIKE '".$_SESSION['username']."_%'";
    $result = mysqli_query($connection, $sql) or die(mysql_error($connection));
    if(mysqli_num_rows($result) > 0) {
        echo "<table class=\"products\">";
        echo "<thead>";
        echo "<tr>";
        echo "<td>First Name</td>";
        echo "<td>Last Name</td>";
        echo "<td>Email</td>";
        echo "<td>Address</td>";
        echo "<td>City</td>";
        echo "<td>State</td>";
        echo "<td>Zip</td>";
        echo "<td>Order Total</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($resultArray = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$resultArray['First_Name']."</td>";
            echo "<td>".$resultArray['Last_Name']."</td>";
            echo "<td>".$resultArray['Email']."</td>";
            echo "<td>".$resultArray['Address']."</td>";
            echo "<td>".$resultArray['City']."</td>";
            echo "<td>".$resultArray['State']."</td>";
            echo "<td>".$resultArray['Zip']."</td>";
            echo "<td> $".$resultArray['Order_Total']."</td>";
            echo "</tr>";
        }
        echo"</tbody>";
        echo"</table>";
    } else {
        echo "<p>You do not have an order history.</p>";
    }

    ?>
</div>
</body>
    <?php 
    require("includes/footer.php");
    ?>
</html>