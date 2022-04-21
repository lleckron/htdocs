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
    require("../includes/connect2db.inc.php");
    $product = $_GET['product'];
    $type = $_GET['type'];
    ?>
<div class="container">
    <table class="product">
    <thead>
        <tr>
        <?php
        if($type == 'MOTHERBOARDS'){
            echo "<td>Image</td>";
            echo "<td>Name</td>";
            echo "<td>Socket</td>";
            echo "<td>Form Factor</td>";
            echo "<td>Memory Max</td>";
            echo "<td>Memory Slots</td>";
            echo "<td>Color</td>";
            echo "<td>Price</td>";
        } else if ($type == 'PROCESSORS'){
            echo "<td>Image</td>";
            echo "<td>Name</td>";
            echo "<td>Cores</td>";
            echo "<td>Clock Speed</td>";
            echo "<td>Boosted Speed</td>";
            echo "<td>TDP</td>";
            echo "<td>Integrated Graphics</td>";
            echo "<td>SMT</td>";
            echo "<td>Price</td>";
        } else {
            echo "<td>Image</td>";
            echo "<td>Name</td>";
            echo "<td>Chipset</td>";
            echo "<td>Memory</td>";
            echo "<td>Core Clock</td>";
            echo "<td>Boost Clock</td>";
            echo "<td>Color</td>";
            echo "<td>Length</td>";
            echo "<td>Price</td>";
        }
        ?>
        </tr>
    </thead>
    <tbody>
    <?php
        $sql = "SELECT * FROM $type WHERE Name = '$product'";
        $result = mysqli_query($connection,$sql) or die(mysql_error($connection));
        if ($type == 'MOTHERBOARDS'){
            while ($resultArray = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td><img alt=\"Product Image\" src=\"data:image/jpeg;base64,".base64_encode($resultArray['Image'])."\"/></td>";
                echo "<td>".$resultArray['Name']."</td>";
                echo "<td>".$resultArray['Socket']."</td>";
                echo "<td>".$resultArray['Form_Factor']."</td>";
                echo "<td>".$resultArray['Memory_Max']." GB</td>";
                echo "<td>".$resultArray['Memory_Slots']."</td>";
                echo "<td>".$resultArray['Color']."</td>";
                echo "<td>$".$resultArray['Price']."</td>";
                echo "</tr>";
            }
        } else if ($type == 'PROCESSORS'){
            while ($resultArray = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td><img alt=\"Product Image\" src=\"data:image/jpeg;base64,".base64_encode($resultArray['Image'])."\"/></td>";
                echo "<td>".$resultArray['Name']."</td>";
                echo "<td>".$resultArray['Cores']."</td>";
                echo "<td>".$resultArray['Clock_Speed']." GHz</td>";
                echo "<td>".$resultArray['Boost_Speed']." GHz</td>";
                echo "<td>".$resultArray['TDP']." W</td>";
                echo "<td>".$resultArray['Integrated_Graphics']."</td>";
                echo "<td>".$resultArray['SMT']."</td>";
                echo "<td>$".$resultArray['Price']."</td>";
                echo "</tr>";
            }
        } else {
            while ($resultArray = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td><img alt=\"Product Image\" src=\"data:image/jpeg;base64,".base64_encode($resultArray['Image'])."\"/></td>";
                echo "<td>".$resultArray['Name']."</td>";
                echo "<td>".$resultArray['Chipset']."</td>";
                echo "<td>".$resultArray['Memory']." GB</td>";
                echo "<td>".$resultArray['Core_Clock']." MHz</td>";
                echo "<td>".$resultArray['Boost_Clock']." MHz</td>";
                echo "<td>".$resultArray['Color']."</td>";
                echo "<td>".$resultArray['Length']." mm</td>";
                echo "<td>$".$resultArray['Price']."</td>";
                echo "</tr>";
            }
        }
    ?>
    </tbody>
    </table>
    <form method='post' action="addedToCart.php">
    <p> Quantity:  
	    <select name="numOfItem">
		    <option selected ='selected'> 1</option>
		    <option > 2 </option>
		    <option > 3 </option>
		    <option > 4 </option>
		    <option > 5 </option>
	    </select>
    </p>
    <input name='product_name' type="hidden" value ='<?php echo $product;?>'/> 
    <input name='product_type' type="hidden" value ='<?php echo $type;?>'/> 
    <input type = "submit" value = "Add to Cart" />
    </form>
</div>
</body>
    <?php 
    require("../includes/directoriesFooter.php");
    ?>
</html>