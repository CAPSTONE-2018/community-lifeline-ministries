<?php

//connect to database
include("../db/config.php");

$output = "";
$id = intval($_POST['scoreid']);

session_start();

$_SESSION['testScoreId'] = $id;



$query = "SELECT * FROM Test_Score_To_Students WHERE Student_Id ='".$id."' ;";


$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);



$springselected = "";
$summerselected = "";
$fallselected = "";
$winterselected = "";


if ($row['Term'] == "Spring"){
    $springselected = "selected=\"selected\"";
}
if ($row['Term'] == "Summer"){
    $summerselected = "selected=\"selected\"";
}
if ($row['Term'] == "Fall"){
    $fallselected = "selected=\"selected\"";
}
if ($row['Term'] == "Winter"){
    $winterselected = "selected=\"selected\"";
}


$output = "<div id=\"form_wrapper\">

                <form class=\"form-horizontal\" action=\"updateTestScores.php\" method=\"POST\" id=\"form2\">

                    <h1>Update Test Score Information:</h1>
                    <br />

                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"term\">Term:</label>
                                <select id=\"term\" class=\"form-control\" name=\"term\">
                                    <option value=\"Spring\" ". $springselected .">Spring</option>
                                    <option value=\"Summer\" ". $summerselected .">Summer</option>
                                    <option value=\"Fall\" ". $fallselected .">Fall</option>
                                    <option value=\"Winter\" ". $winterselected .">Winter</option>
                                </select>
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"year\">Year:</label>
                                <input id=\"year\" class=\"form-control\" value='". $row['Year'] ."' placeholder=\"Year\" type=\"text\" name=\"year\">
                            </div>
                        </div>
                    </div>


                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"pre\">Pre-Test Score:</label>
                                <input id=\"pre\" class=\"form-control\" value='". $row['Pre_Test'] ."' placeholder=\"Pre-Test Score\" type=\"text\" name=\"pre_test\">
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"post\">Post-Test Score:</label>
                                <input id=\"post\" class=\"form-control\" value='". $row['Post_Test'] ."' placeholder=\"Post_Test Score\" type=\"text\" name=\"post_test\">
                            </div>
                        </div>

                    </div>



                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

                </form>

            </div>";

echo $output;




?>
