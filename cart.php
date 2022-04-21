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
		<h2>Your Cart</h2>
    </div>
    <?php
    require("includes/connect2db.inc.php");
    $sql = "SELECT Product_Name,sum(Quantity) as q_sum FROM CART WHERE Customer_Id LIKE '".$_SESSION['username']."_%' GROUP BY Product_Name";
    $result = mysqli_query($connection, $sql) or die(mysql_error($connection));
    $total = 0;
    if(mysqli_num_rows($result) > 0) {
        echo "<table class=\"products\">";
        echo "<thead>";
        echo "<tr>";
        echo "<td>Name</td>";
        echo "<td>Quantity</td>";
        echo "<td>Unit Price</td>";
        echo "<td>Subtotal</td>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        while ($resultArray = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$resultArray['Product_Name']."</td>";
            echo "<td>".$resultArray['q_sum']."</td>";
            $product_name = $resultArray['Product_Name'];
            $q_sum = $resultArray['q_sum'];

            $sql_2 = "SELECT Product_Type FROM CART WHERE Product_Name = '". $product_name."'";
            $result_2 = mysqli_query($connection, $sql_2) or die(mysql_error($connection));
            $row = mysqli_fetch_row($result_2);
            $product_type = $row[0];

            $sql_3 = "SELECT Price FROM ".$product_type." WHERE Name = '".$product_name."'";
            $result_3 = mysqli_query($connection, $sql_3) or die(mysql_error($connection));
            while ($resultArray_3 = mysqli_fetch_array($result_3)){
                $unit_price = strval($resultArray_3['Price']);
                $sub_total = $q_sum * $unit_price ;
            }
            $total = $total + $sub_total;
            $_SESSION['Order_Total'] = $total;
            echo "<td>$".$unit_price."</td>";
            echo "<td>$".strval($sub_total)."</td>";
            echo "</tr>";
        }
        echo"</tbody>";
        echo"</table>";
        echo "<div>";
        echo "<p><b>Your total is: $".$total.".</b></p>";
        echo "</div>";
        echo "<div>"; 
        echo "<p><a href=\"checkout.php\">Click here</a> to proceed to checkout</p>";
        echo "</div>";
        echo "<form method=\"post\" action=\"cart.php\">";
        echo "<input type=\"submit\" name=\"clearCart\" id=\"clearCart\" value=\"Clear Cart\" />";
        echo "</form>";
    } else {
        echo "<div>";
        echo "<p><b>Your cart is empty! <a href=\"shopping/shopping.php\">Click here</a> to start shopping</p>";
        echo "</div>";
    }
    if(isset($_POST['clearCart'])) {
        $sql = "DELETE FROM CART WHERE Customer_Id LIKE '".$_SESSION['username']."_%'";
        $result = mysqli_query($connection, $sql) or die(mysql_error($connection));
        header("location:cart.php");
        echo "<p class=\"correct\">Cart successfully cleared</p>";
        }
    ?>
</div>
</body>
    <?php 
    require("includes/footer.php");
    ?>
</html>