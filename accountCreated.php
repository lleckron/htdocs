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
        <h2>Account Registration</h2>
    </div>
    <div>
    <?php
    require("includes/connect2db.inc.php"); 
    $fname = $connection->real_escape_string($_POST['firstName']);
    $lname = $connection->real_escape_string($_POST['lastName']);
    $dob = $connection->real_escape_string($_POST['dob']);
    $email = $connection->real_escape_string($_POST['email']);
    $username = $connection->real_escape_string($_POST['username']);
    $pw = $connection->real_escape_string($_POST['password']);
    $salt = (int)date("s");
    $pepper = substr($email,0,3);
    $hash = hash('sha256',$salt . $pw . $pepper);
    $sql = "INSERT INTO USER VALUES ('$username','$hash','$email','$fname','$lname','$dob','$salt','$pepper')";
    if($connection->query($sql) == true) {
        echo "<h2>Account Successfully Created</h2>";
        echo "<p>Account successfully created. Navigate to the <a href=\"login.php\">login page</a> to finish things up.</p>";
    } else {
        echo "<p>There was an issue creating your account. Please check your internet connection or <a href=\"createAccount.php\">try again.</a></p>";
        echo "Error: " . $connection -> error;
    }
    $connection->close();
?>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
    <?php 
    require("includes/footer.php");
    ?>
</html>