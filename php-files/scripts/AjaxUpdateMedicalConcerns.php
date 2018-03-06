<?php

//connect to database
include("../../db/config.php");

$output = "";
$id = intval($_POST['allergyId']);

session_start();

$_SESSION['allergyId'] = $id;
$query = "SELECT * FROM Allergies WHERE Id =$id;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$typeToDisplay = $row['Type'];
$nameToDisplay = $row['Name'];
$noteToDisplay = $row['Note'];

$output = "><br><br>

    </form>

</div>";

echo $output;


?>
