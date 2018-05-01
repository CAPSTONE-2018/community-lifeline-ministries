<?php

//connect to database
include("../../db/config.php");

$output = "";
$id = intval($_POST['medicalConcernId']);

session_start();

$_SESSION['medicalConcernId'] = $id;
$query = "SELECT * FROM Medical_Concerns WHERE Id =$id;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$typeToDisplay = $row['Type'];
$nameToDisplay = $row['Name'];
$noteToDisplay = $row['Note'];

$output = "><br><br>
        </form>
    </div>
</div>\"";

echo $output;


?>
