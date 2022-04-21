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
		<h2>User Feedback</h2>
    </div>
    <table class="products">
    <thead>
        <td>Username</td>
        <td>Feedback</td>
    </thead>
    <tbody>
    <?php
        require("../includes/connect2db.inc.php");
        $sql = "SELECT Username,Suggestion FROM Suggestions";
        $result = mysqli_query($connection, $sql) or die(mysql_error($connection));
        while ($resultArray = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>".$resultArray['Username']."</td>";
            echo "<td>".$resultArray['Suggestion']."</td>";
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