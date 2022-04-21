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
<div class="heading"><h2>Processors</h2></div><table class="products"><thead>
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Cores</td>
            <td>Clock Speed</td>
            <td>Boosted Speed</td>
            <td>TDP</td>
            <td>Integrated Graphics</td>
            <td>SMT</td>
            <td>Price</td>
        </tr>
    </thead>
    <tbody>
        <?php
            require("../includes/connect2db.inc.php");
            $sql = "SELECT * FROM PROCESSORS";
            $result = mysqli_query($connection,$sql) or die(mysql_error($connection));
            while ($resultArray = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td><img src=\"".$resultArray['Image']."\" alt=\"Product Image\"></td>";
                echo "<td><a href=\"item.php?product=".$resultArray['Name']."&type=PROCESSORS\">".$resultArray['Name']."</td></a>";
                echo "<td>".$resultArray['Cores']."</td>";
                echo "<td>".$resultArray['Clock_Speed']." GHz</td>";
                echo "<td>".$resultArray['Boost_Speed']." GHz</td>";
                echo "<td>".$resultArray['TDP']."</td> W";
                echo "<td>".$resultArray['Integrated_Graphics']."</td>";
                echo "<td>".$resultArray['SMT']."</td>";
                echo "<td>$".$resultArray['Price']."</td>";
                echo "</tr>";
            }
        ?>
    </tbody>
    </table>
</div>	
</body>
    <?php 
    require("../includes/directoriesFooter.php");
    ?>
</html>