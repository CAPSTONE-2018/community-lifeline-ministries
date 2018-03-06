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

$output = "<div class=\"container\">
    <div id=\"form_wrapper\">
        <form class=\"form-horizontal\" action=\"../add/AddMedicalConcern.php\" method=\"POST\" id=\"form2\">
            <h1>Update $nameToDisplay's Information:</h1>
            <br/>
            <div class=\"row\">
                <div class=\"form-group\">
                    <div class=\"col-lg-6\">
                        <label class=\"control-label\" for=\"allergyName\">Name:</label>
                        <input id=\"allergyName\" class=\"form-control\" value=$nameToDisplay type=\"text\"
                               name=\"name\">
                    </div>
                    <div class=\"col-lg-6\">
                        <label class=\"control-label\" for=\"allergyType\">Type:</label>
                        <input id=\"allergyType\" class=\"form-control\" value=$typeToDisplay type=\"text\"
                               name=\"type\">
                    </div>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"form-group\">
                    <div class=\"col-lg-11\">

                        <label class=\"control-label\" for=\"allergyNote\">Note:</label>
                        <textarea id=\"allergyNote\" class=\"form-control\" value=$noteToDisplay name=\"note\"
                                  rows=\"4\" cols=\"50\">
                        </textarea>
                    </div>
                </div>
            </div>
            <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>
        </form>
    </div>
</div>";

echo $output;


?>
