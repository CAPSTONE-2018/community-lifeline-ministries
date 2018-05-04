<?php

//connect to database
include("../../db/config.php");

$output = "";
$id = intval($_POST['testScoreId']);
session_start();
$_SESSION['testScoreId'] = $id;

$query = "SELECT * FROM Student_Test_Scores WHERE Id ='".$id."' ;";

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

$output = " \"" . $springselected .">Spring</option>
                                    <option value=\"Summer\" ". $summerselected .">Summer</option>
                                    <option value=\"Fall\" ". $fallselected .">Fall</option>
                                    <option value=\"Winter\" ". $winterselected .">Winter</option>
                                </select>
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"year\">Year:</label>
                                <input id=\"year\" class=\"form-control\" value='". $row['School_Year'] ."' placeholder=\"Year\" type=\"text\" name=\"year\">
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"preTest\">Pre-Test Score:</label>
                                <input id=\"preTest\" class=\"form-control\" value='". $row['Pre_Test'] ."' placeholder=\"Pre-Test Score\" type=\"text\" name=\"preTest\">
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"postTest\">Post-Test Score:</label>
                                <input id=\"postTest\" class=\"form-control\" value='". $row['Post_Test'] ."' placeholder=\"Post_Test Score\" type=\"text\" name=\"postTest\">
                            </div>
                        </div>
                    </div>

                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>
                </form>
            </div>";
echo $output;

?>
