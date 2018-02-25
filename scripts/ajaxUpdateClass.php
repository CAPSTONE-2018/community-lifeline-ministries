<?php

//connect to database
include("../db/config.php");

$output = "";
$id = intval($_POST['classid']);

session_start();

$_SESSION['classId'] = $id;



$query = "SELECT * FROM Classes WHERE Id =$id;";
$query2 = "SELECT * FROM Schedule WHERE Class_Id =$id;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_array($result2);





$output = "<div id=\"form_wrapper\">

                <form class=\"form-horizontal\" action=\"updateClass.php\" method=\"POST\" id=\"form2\">

                    <h1>Update ".$row['Class_Name']."'s Information:</h1>
                    <br />

                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"name\">Class Name:</label>
                                <input id=\"name\" class=\"form-control\" value='".$row['Class_Name']."' placeholder=\"Class Name\" type=\"text\" name=\"name\">
                            </div>                 
                        </div>
                    </div>
                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

                </form>

            </div>";

echo $output;


?>
