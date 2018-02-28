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

$type = $row['Type'];

$output = "<div id=\"form_wrapper\">
    <form class=\"form - horizontal\" action=\"../update/UpdateAllergy.php\" method=\"POST\" id=\"form2\">

        <h1>Update $type's Information:</h1>
        <br />
        <div class=\"row\">
    
            <div class=\"form-group\">
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"name\">Allergy Name:</label>
                    <input id=\"name\" class=\"form-control\" value='".$row['Type']."' placeholder=\"Class Name\" type=\"text\" name=\"name\">
                </div>                 
            </div>
        </div>
    
        <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

    </form>

</div>";

echo $output;


?>
