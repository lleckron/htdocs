<?php
echo "<header>";
echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark \">";
   echo "<a href=\"../index.html.php\" class=\"navbar-brand\"><b>Website</b></a>";
   echo "<div class=\"collapse navbar-collapse\">";
        echo "<ul class=\"navbar-nav\">";
            echo "<li class=\"nav-item\">";
               echo "<a href=\"../index.html.php\" class=\"nav-link\">Home</a>";
            echo "</li>";
            if (isset($_SESSION['username'])){
                echo "<li class=\"nav-item\">";
                    echo "<a href=\"../shopping/shopping.php\" class=\"nav-link\">Shop</a>";
                echo "</li>";
                echo "<li class=\"nav-item\">";
                    echo "<a href=\"../cart.php\" class=\"nav-link\">Cart</a>";
                echo "</li>";
                echo "<li class=\"nav-item\">";
                    echo "<a href=\"../orderHistory.php\" class=\"nav-link\">Order History</a>";
                echo "</li>";
                echo "<li class=\"nav-item\">";
                    echo "<a href=\"../logout.php\" class=\"nav-link\">Log Out</a>";
                echo "</li>";
            }else{
                echo "<li class=\"nav-item active\">";
                    echo "<a href=\"../createAccount.php\" class=\"nav-link\">Create Account</a>";
                echo "</li>";
                echo "<li class=\"nav-item\">";
                    echo "<a href=\"../login.php\" class=\"nav-link\">Log In</a>";
                echo "</li>";
            }
            if($_SESSION['username'] === 'administrator') {
                echo "<li class=\"nav-item\">";
                    echo "<a href=\"../admin/adminPage.php\" class=\"nav-link\">Admin Page</a>";
                echo "</li>";
            }
            if (isset($_COOKIE['User'])){
                echo "<li class=\"nav-item\">";
                    echo "<p class=\"nav-link\">Welcome, " . $_SESSION['username'] . "</p>";
                echo "</li>";
            }
        echo "</ul>";
    echo "</div>";
echo "</nav>";
echo "</header>";
?>