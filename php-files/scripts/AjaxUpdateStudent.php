<?php

include("States.php");

//Connect to database
include("../../db/config.php");
$output = "";
$id = intval($_POST['studentId']);
session_start();

$_SESSION['studentId'] = $id;


$query = "SELECT * FROM Students WHERE Id ='" . $id . "' ;";
$query2 = "SELECT * FROM Allergies WHERE Student_Id ='" . $id . "' ;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_array($result2);

$maleSelected = "";
$femaleSelected = "";

if ($row['Gender'] == "M") {
    $maleSelected = "selected=\"selected\"";
} else {
    $femaleSelected = "selected=\"selected\"";
}


$permYes = "";
$permNo = "";

if ($row['Permission_Slip'] == 1) {
    $permYes = "selected=\"selected\"";
} else {
    $permNo = "selected=\"selected\"";
}

$bcYes = "";
$bcNo = "";

if ($row['Birth_Certificate'] == 1) {
    $bcYes = "selected=\"selected\"";
} else {
    $bcNo = "selected=\"selected\"";
}

$rdleYes = "";
$rdleNo = "";

if ($row['Reduced_Lunch_Eligible'] == 1) {
    $rdleYes = "selected=\"selected\"";
} else {
    $rdleNo = "selected=\"selected\"";
}

$iepYes = "";
$iepNo = "";

if ($row['IEP'] == 1) {
    $iepYes = "selected=\"selected\"";
} else {
    $iepNo = "selected=\"selected\"";
}

$stateSelect = stateDropdown($row['State']);

$output = "<div id=\"form_wrapper\">

                <form class=\"form-horizontal\" action=\"../update/UpdateStudent.php\" method=\"POST\" id=\"form2\">

                    <h1>Update " . $row['First_Name'] . " " . $row["Last_Name"] . "'s Information:</h1>
                    <br />

                    <div class=\"row\">
                    <input type='hidden' value='".$row['Id']."' name=\"studentId\"/>

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"firstName\">First Name:</label>
                                <input id=\"firstName\" class=\"form-control\" value='" . $row['First_Name'] . "' placeholder=\"First\" type=\"text\"
                                       pattern=\"^[A-Z]([ \-']?[a-zA-Z]+)*$\" onkeypress=\"return supressEnter()\" name=\"firstName\">
                                <span class=\"mdl-textfield__error\">Invalid First Name Data Entered</span>
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"lastName\">Last Name:</label>
                                <input id=\"lastName\" class=\"form-control\" value='" . $row['Last_Name'] . "' placeholder=\"Last\" type=\"text\"
                                       pattern=\"^[A-Z]([ \-']?[a-zA-Z]+)*$\" onkeypress=\"return supressEnter()\" name=\"lastName\">
                                <span class=\"mdl-textfield__error\">Invalid Last Name Data Entered</span>
                            </div>
                        </div>
                    </div>

                  <div class=\"row\">
    
                    <div class=\"form-group\">
                        <div class=\"col-lg-6\">
                            <label class=\"control-label\" for=\"middleName\">Middle Name:</label>
                            <input id=\"middleName\" class=\"form-control\" value='" . $row['Middle_Name'] . "' placeholder=\"Middle\" type=\"text\"
                                   pattern=\"^[A-Z]([ \-']?[a-zA-Z]+)*$\" onkeypress=\"supressEnter()\" name=\"middleName\">
                            <span class=\"mdl-textfield__error\">Invalid Middle Name Data Entered</span>
                        </div>
                        <div class=\"col-lg-6\">
                            <label class=\"control-label\" for=\"suffix\">Suffix:</label>
                            <input id=\"suffix\" class=\"form-control\" value='" . $row['Suffix'] . "' placeholder=\"Suffix\" type=\"text\"
                                   pattern=\"^[A-Z](([ \.]|(\, )|(\. ))?[a-zA-Z]+)*\.?$\" onkeypress=\"return supressEnter()\" name=\"suffix\">
                            <span class=\"mdl-textfield__error\">Invalid Suffix Data Entered</span>
                        </div>
                    </div>
                  </div>

                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"dob\">Date of Birth:</label>
                                <input id=\"dob\" class=\"form-control\" value='" . $row['Birth_Date'] . "' placeholder=\"YYYY/MM/DD\" type=\"text\"
                                       pattern=\"^((0[1-9])|(1[0-2]))\/((0[1-9])|([1-2][0-9])|(3[0-1]))\/[1-9][0-9]{3}$\" onkeypress=\"return supressEnter()\" name=\"dob\">
                                <span class=\"mdl-textfield__error\">Invalid D.O.B. Data Entered</span>
                            </div>
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"ethnic\">Ethnicity:</label>
                                <input id=\"ethnic\" class=\"form-control\" value='" . $row['Ethnicity'] . "' placeholder=\"Ethnicity\" type=\"text\"
                                       pattern=\"^[A-Z](([ \-|(\, )])?[a-zA-Z]+)*$\" onkeypress=\"return supressEnter()\"  name=\"ethnicity\">
                                <span class=\"mdl-textfield__error\">Invalid Ethnicity Data Entered</span>
                            </div>
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"gend\">Gender:</label>
                                    <select id=\"gend\" class=\"form-control\" name=\"gender\">
                                        <option value=\"M\" " . $maleSelected . ">Male</option>
                                        <option value=\"F\" " . $femaleSelected . ">Female</option>
                                    </select>
                            </div>
                        </div>

                    </div>

                    <div class=\"row\">
                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"addressOne\">Address:</label>
                                <input id=\"addressOne\" class=\"form-control\" value='" . $row['Address_One'] . "' placeholder=\"Address\" type=\"text\"
                                       pattern=\"^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z0-9]+)*\.?$\" onkeypress=\"return supressEnter()\" name=\"addressOne\">
                                <span class=\"mdl-textfield__error\">Invalid Address Data Entered</span>
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"addressTwo\">Apt/Suite:</label>
                                <input id=\"addressTwo\" class=\"form-control\" value='" . $row['Address_Two'] . "' placeholder=\"Apt/Suite\" type=\"text\"
                                       pattern=\"^[a-zA-Z0-9]+(([ \-\.]|(\. ))[a-zA-Z0-9]+)*$\" onkeypress=\"return supressEnter()\" name=\"addressTwo\">
                                <span class=\"mdl-textfield__error\">Invalid Apt/Suite Data Entered</span>
                            </div>
                        </div>

                        <div class=\"form-group\">
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"city\">City:</label>
                                <input id=\"city\" class=\"form-control\" value='" . $row['City'] . "' placeholder=\"City\" type=\"text\"
                                       pattern=\"^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*\.?$\" onkeypress=\"return supressEnter()\" name=\"city\">
                                <span class=\"mdl-textfield__error\">Invalid City Data Entered</span>
                            </div>

                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"state\">State:</label>
                                $stateSelect
                            </div>

                        <div class=\"col-lg-4\">
                            <label class=\"control-label\" for=\"zip\">Zip Code:</label>
                            <input id=\"zip\" class=\"form-control\" value='" . $row['Zip'] . "' placeholder=\"Zip Code\" type=\"text\"
                                   pattern=\"^[0-9]{5}(-[0-9]{4})?$\" onkeypress=\"return supressEnter()\" name=\"zip\">
                            <span class=\"mdl-textfield__error\">Invalid Zip Code Data Entered</span>
                        </div>
                    </div>
                
                    <div class=\"row\">

                        <div class=\"form-group\">

                            <div class=\"col-lg-8\">
                                <label class=\"control-label\" for=\"school\">School:</label>
                                <input id=\"school\" class=\"form-control\" value='" . $row['School'] . "' placeholder=\"School\" type=\"text\"
                                       onkeypress=\"supressEnter()\" name=\"school\">
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">

                        <div class=\"form-group\">

                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"permissionSlip\">Permission Slip on File:</label>
                                <select id=\"permissionSlip\" class=\"form-control\" name=\"permissionSlip\">
                                    <option value=\"1\" " . $permYes . ">Yes</option>
                                    <option value=\"0\" " . $permNo . ">No</option>
                                </select>
                            </div>

                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"birthCertificate\">Birth Certificate on File:</label>
                                <select id=\"birthCertificate\" class=\"form-control\" name=\"birthCertificate\">
                                    <option value=\"1\" " . $bcYes . ">Yes</option>
                                    <option value=\"0\" " . $bcNo . ">No</option>
                                </select>
                            </div>


                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"reducedLunchEligibility\">Reduced Lunch Eligible:</label>
                                <select id=\"reducedLunchEligibility\" class=\"form-control\" name=\"reducedLunchEligibility\">
                                    <option value=\"1\" " . $rdleYes . ">Yes</option>
                                    <option value=\"0\" " . $rdleNo . ">No</option>
                                </select>
                            </div>

                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"iep\">Immediate Emotional Problem:</label>
                                <select id=\"iep\" class=\"form-control\" name=\"iep\">
                                    <option value=\"1\" " . $iepYes . ">Yes</option>
                                    <option value=\"0\" " . $iepNo . ">No</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <br />

                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

                </form>

            </div>";

echo $output;

?>
