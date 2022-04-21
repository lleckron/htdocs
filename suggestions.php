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
        <h2>Suggestions</h2>
        <p>Enter your suggestions here. Any feedback is greatly appreciated.</p>
    </div>
    <div>
    <form action="suggestions.php" method="post">
        <div>
        <?php
        if(isset($_SESSION['username'])){
            $un = $_SESSION['username'];
            echo "<input type=\"text\" name=\"username\" value=\"$un\" readonly/>";
        } else {
            echo "<input type=\"text\" name=\"username\" value=\"Guest\" readonly/>";
        }
        ?>
        </div>
        <div>
            <textarea name="suggestion" style="overflow:auto;resize:none;" rows="12" cols="75" maxlength="255"></textarea>
        </div>
        <div>
            <input type="submit" name="submit" value="Submit" />
        </div>
    </form>
    </div>
    <?php
    if(isset($_POST['submit'])) {
        require("includes/connect2db.inc.php"); 
        $username = $_POST['username'];
        $suggestion = $_POST['suggestion'];
        $sql = "INSERT INTO SUGGESTIONS(Username,Suggestion) VALUES ('$username','$suggestion')";
        if($connection->query($sql) == true) {
            echo "<p class=\"correct\">Suggestion successfully submitted. Thank you!</p>";
        } else {
            echo "<p>There was an issue submitting your suggestion. Please check your connection.</p>";
            echo "Error: " . $connection -> error;
        }
    $connection->close();
    }
    ?>
</div>
</body>
    <?php 
    require("includes/footer.php");
    ?>
</html>