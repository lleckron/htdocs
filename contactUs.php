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
        <h2>Contact Us</h2>
        <p>Describe your problem in as much detail as possible. An email will be sent to our tech team, who will respond as fast as possible.</p>
    </div>
    <div>
        <form action="contactUs.php" method="post">
        <p> <label>Specific problem: </label>
            <input type="text" name="subject" id="subject" required />
        </p>
        <p> <label>Describe the problem: </label>
            <textarea name="body" style="overflow:auto;resize:none;" rows="12" cols="75" maxlength="255" required></textarea>
        </p>
        <div>
            <input type="submit" name="submit" value="Submit" />
        </div>
        </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $to = "cs420homework5@gmail.com";
            $subject = $_POST['subject'];
            $body = $_SESSION['email'] . "\n" . $_POST['body'];
            $headers;
            if(isset($_SESSION['username'])){
                $headers = "From: " . $_SESSION['email'];
            } else {
                $headers = "From: guest@guest.guest";
            }
            mail($to,$subject,$body,$headers);
            echo "<p>An email has been sent. Please check your email shortly for a response.";
        }
    ?>
</div>
</body>
    <?php 
    require("includes/footer.php");
    ?>
</html>