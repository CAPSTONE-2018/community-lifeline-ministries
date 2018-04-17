<?php

//connect to database
include("../../db/config.php");

$output = "";
$id = intval($_POST['classId']);

$query = "SELECT * FROM Classes WHERE Id =$id;";
$query2 = "SELECT * FROM Schedules WHERE Class_Id =$id;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_array($result2);

$classNameToDisplay = $row['Class_Name'];
$isActiveFlag = $row['Active_Class'];


$classIsActive = "";
$classIsNotActive = "";

if ($row['Active_Class'] == 1) {
    $classIsActive = "selected=\"selected\"";
} else {
    $classIsNotActive = "selected=\"selected\"";
}

$output = " value='" .$row['Class_Name']."' placeholder=\"Class Name\" type=\"text\" name=\"name\">
                </div>  
                               
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"activeFlag\">Active Class?</label>
                    <select id=\"activeFlag\" class=\"form-control\" name=\"activeFlag\">
                        <option value=\"1\" ".$classIsActive.">Yes</option>
                        <option value=\"0\" ".$classIsNotActive.">No</option>
                    </select>
                </div>
            </div>
        </div>
        <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>
    </form>
</div>";

echo $output;
?>