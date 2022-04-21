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

<!--oninput="confirmPasswordDetails();"
<span id="usernameMessage"></span>
These are for javascript validation of the input. 
Create new functions and insert oninput as input attribute.
span one goes after input tag.-->
<div class="container">
    <div class="heading">
        <h2>New Processor</h2>
    </div>
    <form class="registerLayout" method="post" action="newProcessor.php" enctype="multipart/form-data">
        <div>
            <p> <label>Item Name: </label>
            <input type="text" name="name" id="name" required />
            </p>
        </div>
        <div>
            <p> <label>Cores: </label>
            <input type="number" min=0 name="cores" id="cores" />
            </p>
        </div>
        <div>
            <p> <label>Clock Speed: </label>
            <input type="number" step="0.1" min=0 name="clockSpeed" id="clockSpeed"  />
            </p>
        </div>
        <div>
            <p> <label>Boost Speed: </label>
            <input type="number" step="0.1" min=0 name="boostSpeed" id="boostSpeed"  />
            </p>
        </div>
        <div>
            <p> <label>TDP: </label>
            <input type="number" name="tdp" id="tdp"  />
            </p>
        </div>
        <div>
            <p> <label>Integrated Graphics: </label>
            <input type="text" name="intGraphics" id="intGraphics"  />
            </p>
        </div>
        <div>
            <p> <label>SMT: </label>
            <input type="text" placeholder="Yes or No" name="smt" id="smt"  />
            </p>
        </div>
        <div>
            <p> <label>Price: </label>
            <input type="number" step="0.01" min=0 name="price" id="price"  />
            </p>
        </div>
        <div>
            <p> <label>Image: </label>
            <input type="file" accept="image/*" name="image" id="image"  />
            </p>
        </div>
        <div><p>
            <input type="submit" name="processorSubmit" id="processorSubmit" value="Create Processor" />
            </p>
        </div>
    </form>
    <?php 
    require("../includes/connect2db.inc.php");
    if (isset($_POST['processorSubmit'])){
    $name = $connection->real_escape_string($_POST['name']);
    $cores = $connection->real_escape_string($_POST['cores']);
    $clockSpeed = $connection->real_escape_string($_POST['clockSpeed']);
    $boostSpeed = $connection->real_escape_string($_POST['boostSpeed']);
    $tdp = $connection->real_escape_string($_POST['tdp']);
    $intGraphics = $connection->real_escape_string($_POST['intGraphics']);
    $smt = $connection->real_escape_string($_POST['smt']);
    $price = $connection->real_escape_string($_POST['price']);
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql = "INSERT INTO PROCESSORS VALUES ('$name','$image','$cores','$clockSpeed','$boostSpeed','$tdp','$intGraphics','$smt','$price')";

    if($connection->query($sql) == true) {
        echo "<div";
        echo "<h3>Processor Successfully Created</h3>";
        echo "<p>Navigate to the <a href=\"productInsertion.php\">Add Products</a> page to add more products.</p>";
        echo "</div>";
    }else {
        echo "<p>There was an issue entering the data into the database. Please check your internet connection or <a href=\"productInsertion.php\">try again.</a></p>";
        echo "Error: " . $connection -> error;
    }
    $connection->close();
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
<?php 
    require("../includes/directoriesFooter.php");
    ?>
</html>