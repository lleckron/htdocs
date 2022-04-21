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
        <div class="heading"><h2>Users</h2></div>
    <?php
    require("../includes/connect2db.inc.php");
    $sql = "SELECT username, first_name, last_name, email FROM USER";
    $result = mysqli_query($connection,$sql);
    $rowcount = mysqli_num_rows($result);
    echo "Total number of Users: ".$rowcount; 
    echo "<table class=\"products\">\n";
    echo "<thead>";
    echo "<tr>";
    echo "<td>Username</td>";
    echo "<td>First Name</td>";
    echo "<td>Last Name</td>";
    echo "<td>Email</td>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
	while ($row = mysqli_fetch_row($result)) {
        $user = $row[0];
        $fname = $row[1];
        $lname = $row[2];
        $email = $row[3];
		echo "<tr>";
		echo "<td>$user</td>";
        echo "<td>$fname</td>";
        echo "<td>$lname</td>";
        echo "<td>$email</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>\n";
    ?>
    </div>
</body>
    <?php 
    require("../includes/directoriesFooter.php");
    ?>
</html>