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


$isActiveContact = "";
$isNotActiveContact = "";

if ($row['Active_Volunteer'] == 1) {
    $isActiveContact = "selected=\"selected\"";
} else {
    $isNotActiveContact = "selected=\"selected\"";
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
                                <input id=\"prefix\" class=\"form-control\" value='".$row['Prefix']."' placeholder=\"First\" type=\"text\" name=\"prefix\">
                            </div>
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"suffix\">Suffix:</label>
                                <input id=\"suffix\" class=\"form-control\" value='".$row['Suffix']."' placeholder=\"Last\" type=\"text\" name=\"suffix\">
                            </div>
                             <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"middleName\">Middle Name:</label>
                                <input id=\"middleName\" class=\"form-control\" value='".$row['Middle_Name']."' placeholder=\"Last\" type=\"text\" name=\"middleName\">
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"firstName\">First Name:</label>
                                <input id=\"firstName\" class=\"form-control\" value='".$row['First_Name']."' placeholder=\"First\" type=\"text\" name=\"firstName\">
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"lastName\">Last Name:</label>
                                <input id=\"lastName\" class=\"form-control\" value='".$row['Last_Name']."' placeholder=\"Last\" type=\"text\" name=\"lastName\">
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"primaryPhone\">Primary Number:</label>
                                <input id=\"primaryPhone\" class=\"form-control\" value='".$row['Primary_Phone']."' placeholder=\"Primary Number\" type=\"text\" name=\"primaryPhone\">
                            </div>

                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"secondaryPhone\">Secondary Number:</label>
                                <input id=\"secondaryPhone\" class=\"form-control\" value='".$row['Secondary_Phone']."' placeholder=\"Secondary Number\" type=\"text\" name=\"secondaryPhone\">
                            </div>

                        </div>
                    </div>




                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"addressOne\">Address:</label>
                                <input id=\"addressOne\" class=\"form-control\" value='".$row['Address_One']."' placeholder=\"Address\" type=\"text\" name=\"addressOne\">
                            </div>
                            
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"address\">Apt/Suite:</label>
                                <input id=\"address\" class=\"form-control\" value='".$row['Address_Two']."' placeholder=\"Address\" type=\"text\" name=\"address\">
                            </div>
                        </div>
                        
                        <div class=\"form-group\">
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"city\">City:</label>
                                <input id=\"city\" class=\"form-control\" value='".$row['City']."' placeholder=\"City\" type=\"text\" name=\"city\">
                            </div>
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"state\">State:</label>
                                $stateSelect
                            </div>
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"zip\">Zip Code:</label>
                                <input id=\"zip\" class=\"form-control\" value='".$row['Zip']."' placeholder=\"Zip Code\" type=\"text\" name=\"zip\">
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                    <div class=\"form-group\">
                        <div class=\"col-lg-4\">
                            <label class=\"control-label\" for=\"email\">Email:</label>
                            <input id=\"email\" class=\"form-control\" value='".$row['Email']."' placeholder=\"Email\" type=\"text\" name=\"email\">
                        </div>
                        <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"type\">Type:</label>
                                    <select id=\"type\" class=\"form-control\" name=\"type\">
                                        <option value=\"Volunteer\" ". $volunteerSelected .">Volunteer</option>
                                        <option value=\"Employee\" ". $employeeSelected .">Employee</option>
                                 </select>
                            </div>
                            <div class=\"col-lg-4\">
                    <label class=\"control-label\" for=\"activeFlag\">Active Contact?</label>
                    <select id=\"activeFlag\" class=\"form-control\" name=\"activeFlag\">
                        <option value=\"1\" " . $isActiveContact . ">Yes</option>
                        <option value=\"0\" " . $isNotActiveContact . ">No</option>
                    </select>
                </div>
                    </div>
                </div>

                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

                </form>
            </div>";
echo $output;

?>
