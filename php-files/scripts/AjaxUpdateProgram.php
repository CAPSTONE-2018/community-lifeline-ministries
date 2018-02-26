<?php

//connect to database
include("../../db/config.php");

$output = "";
$id = intval($_POST['programid']);
session_start();
$_SESSION['programid'] = $id;

$query = "SELECT * FROM Programs WHERE Id =$id;";

$query2 = "SELECT * FROM Volunteer_To_Programs WHERE Program_Id =$id;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_array($result2);

$output = "<div id=\"form_wrapper\">
    <form class=\"form - horizontal\" action=\"../update/UpdateProgram.php\" method=\"POST\" id=\"form2\">

        <h1>Update \"" .$row['Program_Name']."'s Information:</h1>
        <br />
        <div class=\"row\">
    
            <div class=\"form-group\">
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"name\">Program Name:</label>
                    <input id=\"name\" class=\"form-control\" value='".$row['Program_Name']."' placeholder=\"Program Name\" type=\"text\" name=\"programname\">
                </div>                 
            </div>
        </div>
        
        <div class=\"row\">
    
            <div class=\"form-group\">
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"name\">Volunteer ID (need to query for name):</label>
                    <input id=\"name\" class=\"form-control\" value='".$row2['Volunteer_Id']."' placeholder=\"Class Name\" type=\"text\" name=\"name\">
                </div>                 
            </div>
        </div>
    
        <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

    </form>

</div>";

echo $output;


?>
