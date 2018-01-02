<?php

//connect to database
include("../db/config.php");

$output = "";
$id = intval($_POST['classid']);

session_start();

$_SESSION['classId'] = $id;



$query = "SELECT * FROM Class WHERE Id ='".$id."' ;";
$query2 = "SELECT * FROM Schedule WHERE Class_Id ='".$id."' ;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_array($result2);



$monselected = "";
$tueselected = "";
$wedselected = "";
$thurselected = "";
$friselected = "";
$satselected = "";
$sunselected = "";


if ($row2['Day'] == "Monday"){
    $monselected = "selected=\"selected\"";
}
if ($row2['Day'] == "Tuesday"){
    $tueselected = "selected=\"selected\"";
}
if ($row2['Day'] == "Wednesday"){
    $wedselected = "selected=\"selected\"";
}
if ($row2['Day'] == "Thursday"){
    $thurselected = "selected=\"selected\"";
}
if ($row2['Day'] == "Friday"){
    $friselected = "selected=\"selected\"";
}
if ($row2['Day'] == "Saturday"){
    $satselected = "selected=\"selected\"";
}
if ($row2['Day'] == "Sunday"){
    $sunselected = "selected=\"selected\"";
}


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

                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"roomnum\">Room Number:</label>
                                <input id=\"roomnum\" class=\"form-control\" value='".$row2['Room_Number']."' placeholder=\"Room Number\" type=\"text\" name=\"rnum\">
                            </div>
                        </div>
                    </div>


                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"day\">Day:</label>
                                <select id=\"day\" class=\"form-control\" name=\"day\">
                                    <option value=\"Monday\" ". $monselected .">Monday</option>
                                    <option value=\"Tuesday\" ". $tueselected .">Tuesday</option>
                                    <option value=\"Wednesday\" ". $wedselected .">Wednesday</option>
                                    <option value=\"Thursday\" ". $thurselected .">Thursday</option>
                                    <option value=\"Friday\" ". $friselected .">Friday</option>
                                    <option value=\"Saturday\" ". $satselected .">Saturday</option>
                                    <option value=\"Sunday\" ". $sunselected .">Sunday</option>
                                </select>
                            </div>
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"stime\">Start Time:</label>
                                <input id=\"stime\" class=\"form-control\" value='".$row2['Start_Time']."' placeholder=\"Start Time\" type=\"text\" name=\"stime\">
                            </div>
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"etime\">End Time:</label>
                                <input id=\"etime\" class=\"form-control\" value='".$row2['End_Time']."' placeholder=\"End Time\" type=\"text\" name=\"etime\">
                            </div>
                        </div>

                    </div>



                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

                </form>

            </div>";

echo $output;


?>
