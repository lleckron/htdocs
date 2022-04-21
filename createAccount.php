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
    <form class="registerLayout" method="post" action="accountCreated.php">
        <div>
            <p> <label>First Name: </label>
            <input type="text" name="firstName" id="firstName" required />
            </p>
        </div>
        <div>
            <p> <label>Last Name: </label>
            <input type="text" name="lastName" id="lastName" required />
            </p>
        </div>
        <div>
            <p> <label>Date of Birth: </label>
            <input type="date" name="dob" id="dob"  required />
            </p>
        </div>
        <div>
            <p> <label>Email: </label>
            <input type="email" name="email" id="email" placeholder="example@gmail.com" oninput="confirmEmailDetails();" required />
            </p>
        </div>
        <div>
            <p><span> <label>Confirm Email: </label>
            <input type="email" name="confirmEmail" id="confirmEmail" placeholder="example@gmail.com" oninput="confirmEmailDetails();" required />
            </span>
            <span id="emailMessage"></span></p>
        </div>
        <div>
            <p><span> <label>Username: </label>
            <input type="text" name="username" id="username" oninput="confirmUserDetails();" required />
            </span>
            <span id="usernameMessage"></span></p>
        </div>
        <div>
            <p><span> <label>Password: </label>
            <input type="password" name="password" id="password" oninput="confirmPasswordDetails();" required />
            </span>
            <span id="passwordMessage"></span></p>
        </div>
        <div>
            <p> <label>Confirm Password: </label>
            <input type="password" name="confirmPassword" id="confirmPassword" oninput="confirmPasswordDetails();" required />
            </p>
        </div>
        <div>
            <input type="submit" name="submit" id="submit" value="Create Account" disabled />
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
    <?php 
    require("includes/footer.php");
    ?>
</html>