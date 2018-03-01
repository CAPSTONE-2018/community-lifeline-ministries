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

$output = "<div id=\"form_wrapper\">
    <form class=\"form - horizontal\" action=\"../update/UpdateAllergy.php\" method=\"POST\" id=\"form2\">

        <h1>Update $typeToDisplay's Information:</h1>
        <br />
        
        <div class=\"row\">
            <div class=\"form-group\">
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"allergyName\">Allergy Name:</label>
                    <input id=\"allergyName\" class=\"form-control\" value=\"$nameToDisplay\" placeholder=\"Allergy Name\" type=\"text\" name=\"allergyName\">
                </div>
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"allergyType\">Type:</label>
                    <input id=\"allergyType\" class=\"form-control\" value=\"$typeToDisplay\" placeholder=\"Allergy Type\" type=\"text\" name=\"allergyType\">
                </div>
            </div>
        </div>
        
        <div class=\"row\">
            <div class=\"form-group\">
                <div class=\"col-lg-11\">
                    <label class=\"control-label\" for=\"allergyNote\">Note:</label>
                    <textarea id=\"allergyNote\" class=\"form-control\" name=\"allergyNote\" rows=\"4\" cols=\"50\">{$noteToDisplay}</textarea>
                    </div>
                </div>
            </div>
           
        
        <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

    </form>

</div>";

echo $output;


?>
