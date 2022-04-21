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
        <h2>Log In</h2>
    </div>
    <form class="loginLayout" method="post" action="login.php">
        <div>
            <p> <label>Username: </label>
                <input type="text" name="signInUsername" id="signInUsername" required />
            </p>
        </div>
        <div>
            <p> <label>Password: </label>
                <input type="password" name="signInPassword" id="signInPassword" required />
            </p>
        </div>
        <div>
            <input type="submit" name="signInSubmit" id="signInSubmit" value="Log In" />
        </div>
    </form>
    <?php
    require("includes/connect2db.inc.php"); 
    if (isset($_POST['signInSubmit'])){
        $signInUsername = $_POST['signInUsername'];
        $signInPassword = $_POST['signInPassword'];
        $sql = "SELECT username,password,email,salt,pepper FROM USER WHERE username = '$signInUsername'";
        if(!$connection->query($sql) == true) {
            echo "<p>There was an error logging in.</p>";
        } else {
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_row($result);
            $un = $row[0];
            $pw = $row[1];
            $email = $row[2];
            $salt = $row[3];
            $pepper = $row[4];
            $connection->close();
            $hash = hash('sha256',$salt . $signInPassword . $pepper);
            if ($pw == $hash) {
                $_SESSION['username'] = $un;
                $_SESSION['email'] = $email;
                $current_date = date('Y_m_d');
                $_SESSION['id'] = $_SESSION['username'] . "_" . $current_date;
                setcookie("User", "userCookie", time()+3600);
                header("Location: index.html.php");
            } else {
                echo "<p class=\"incorrect\">Username or password is incorrect. Please try again.</p>";
            }
        }
    }
    ?>
</div>

</body>
    <?php 
    require("includes/footer.php");
    ?>
</html>