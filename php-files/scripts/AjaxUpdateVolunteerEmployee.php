<?php

include("States.php");

//Connect to database
include("../../db/config.php");

$output = "";
$id = intval($_POST['volunteerId']);

session_start();
$_SESSION['volunteerId'] = $id;

$query = "SELECT * FROM Volunteer_Employees WHERE Id ='".$id."' ;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);
$volunteerSelected = "";
$employeeSelected = "";

if ($row['Type'] == "Volunteer"){
    $volunteerSelected = "selected=\"selected\"";
}else{
    $employeeSelected = "selected=\"selected\"";
}


$isActiveVolunteer = "";
$isNotActiveVolunteer = "";

if ($row['Active_Volunteer'] == 1) {
    $isActiveVolunteer = "selected=\"selected\"";
} else {
    $isNotActiveVolunteer = "selected=\"selected\"";
}

$stateSelect = stateDropdown($row['State']);

$output = "<div id=\"form_wrapper\">

                <form class=\"form-horizontal\" action=\"../update/UpdateVolunteerEmployee.php\" method=\"POST\" id=\"form2\">

                    <h1>Update ".$row['First_Name']." ".$row["Last_Name"]."'s Information:</h1>
                    <br />
                    
                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"prefix\">Prefix:</label>
                                <input id=\"prefix\" class=\"form-control\" value='".$row['Prefix']."' placeholder=\"First\" type=\"text\"
                                       pattern=\"^[A-Z](([ \.]|(\, )|(\. ))?[a-zA-Z]+)*\.?$\" onkeypress=\"return supressEnter()\" name=\"prefix\">
                            </div>
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"suffix\">Suffix:</label>
                                <input id=\"suffix\" class=\"form-control\" value='".$row['Suffix']."' placeholder=\"Last\" type=\"text\"
                                       pattern=\"^[A-Z](([ \.]|(\, )|(\. ))?[a-zA-Z]+)*\.?$\" onkeypress=\"return supressEnter()\" name=\"suffix\">
                            </div>
                             <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"middleName\">Middle Name:</label>
                                <input id=\"middleName\" class=\"form-control\" value='".$row['Middle_Name']."' placeholder=\"Last\" type=\"text\"
                                       pattern=\"^[A-Z]([ \-']?[a-zA-Z]+)*$\" onkeypress=\"return supressEnter()\" name=\"middleName\">
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"firstName\">First Name:</label>
                                <input id=\"firstName\" class=\"form-control\" value='".$row['First_Name']."' placeholder=\"First\" type=\"text\"
                                       pattern=\"^[A-Z]([ \-']?[a-zA-Z]+)*$\" onkeypress=\"return supressEnter()\" name=\"firstName\">
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"lastName\">Last Name:</label>
                                <input id=\"lastName\" class=\"form-control\" value='".$row['Last_Name']."' placeholder=\"Last\" type=\"text\"
                                       pattern=\"^[A-Z]([ \-']?[a-zA-Z]+)*$\" onkeypress=\"return supressEnter()\" name=\"lastName\">
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"primaryPhone\">Primary Number:</label>
                                <input id=\"primaryPhone\" class=\"form-control\" value='".$row['Primary_Phone']."' placeholder=\"Primary Number\" type=\"text\"
                                       pattern=\"[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$\" onkeypress=\"return supressEnter()\" name=\"primaryPhone\">
                            </div>

                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"secondaryPhone\">Secondary Number:</label>
                                <input id=\"secondaryPhone\" class=\"form-control\" value='".$row['Secondary_Phone']."' placeholder=\"Secondary Number\" type=\"text\"
                                       pattern=\"^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$\" onkeyparess=\"return supressEnter()\" name=\"secondaryPhone\">
                            </div>

                        </div>
                    </div>




                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"addressOne\">Address:</label>
                                <input id=\"addressOne\" class=\"form-control\" value='".$row['Address_One']."' placeholder=\"Address\" type=\"text\"
                                       pattern=\"^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z0-9]+)*\.?$\" onkeypress=\"return supressEnter()\" name=\"addressOne\">
                            </div>
                            
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"addressTwo\">Apt/Suite:</label>
                                <input id=\"addressTwo\" class=\"form-control\" value='".$row['Address_Two']."' placeholder=\"Address\" type=\"text\"
                                       pattern=\"^[a-zA-Z0-9]+(([ \-\.]|(\. ))[a-zA-Z0-9]+)*$\" onkeypress=\"return supressEnter()\" name=\"addressTwo\">
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"city\">City:</label>
                                <input id=\"city\" class=\"form-control\" value='".$row['City']."' placeholder=\"City\" type=\"text\"
                                       pattern=\"^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*\.?$\" onkeypress=\"return supressEnter()\" name=\"city\">
                            </div>
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"state\">State:</label>
                                $stateSelect
                            </div>
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"zip\">Zip Code:</label>
                                <input id=\"zip\" class=\"form-control\" value='".$row['Zip']."' placeholder=\"Zip Code\" type=\"text\"
                                       pattern=\"^[0-9]{5}(-[0-9]{4})?$\" onkeypress=\"return supressEnter()\" name=\"zip\">
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                    <div class=\"form-group\">
                        <div class=\"col-lg-4\">
                            <label class=\"control-label\" for=\"email\">Email:</label>
                            <input id=\"email\" class=\"form-control\" value='".$row['Email']."' placeholder=\"Email\" type=\"text\"
                                   pattern=\"^(?!\.).+@.+\..{2,5}$\" onkeypress=\"return supressEnter()\" name=\"email\">
                        </div>
                        <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"type\">Type:</label>
                                    <select id=\"type\" class=\"form-control\" name=\"type\">
                                        <option value=\"Volunteer\" ". $volunteerSelected .">Volunteer</option>
                                        <option value=\"Employee\" ". $employeeSelected .">Employee</option>
                                 </select>
                            </div>
                            <div class=\"col-lg-4\">
                    <label class=\"control-label\" for=\"activeFlag\">Active Employee?</label>
                    <select id=\"activeFlag\" class=\"form-control\" name=\"activeFlag\">
                        <option value=\"1\" " . $isActiveVolunteer . ">Yes</option>
                        <option value=\"0\" " . $isNotActiveVolunteer . ">No</option>
                    </select>
                </div>
                    </div>
                </div>

                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

                </form>
            </div>";
echo $output;

?>
