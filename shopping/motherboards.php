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
		<h2>Motherboards</h2>
	</div>
    <table class="products">
    <thead>
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Socket</td>
            <td>Form Factor</td>
            <td>Memory Max</td>
            <td>Memory Slots</td>
            <td>Color</td>
            <td>Price</td>
        </tr>
    </thead>
    <tbody>
        <?php
        require("../includes/connect2db.inc.php");
        $sql = "SELECT * FROM MOTHERBOARDS";
        $result = mysqli_query($connection,$sql) or die(mysql_error($connection));
            while ($resultArray = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td><img alt=\"Product Image\" src=\"data:image/jpeg;base64,".base64_encode($resultArray['Image'])."\"/></td>";
                echo "<td><a href=\"item.php?product=".$resultArray['Name']."&type=MOTHERBOARDS\">".$resultArray['Name']."</td></a>";
                echo "<td>".$resultArray['Socket']."</td>";
                echo "<td>".$resultArray['Form_Factor']."</td>";
                echo "<td>".$resultArray['Memory_Max']." GB</td>";
                echo "<td>".$resultArray['Memory_Slots']."</td>";
                echo "<td>".$resultArray['Color']."</td>";
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