<?php
include("States.php");

//Connect to database
include("../../db/config.php");

$output = "";
$id = intval($_POST['contactId']);

session_start();

$_SESSION['contactId'] = $id;


$query = "SELECT * FROM Contacts WHERE Id ='" . $id . "' ;";


$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$stateSelect = stateDropdown($row['State']);
$isActiveFlag = $row['Active_Contact'];


$isActiveContact = "";
$isNotActiveContact = "";

if ($row['Active_Contact'] == 1) {
    $isActiveContact = "selected=\"selected\"";
} else {
    $isNotActiveContact = "selected=\"selected\"";
}


$output = "<div id=\"form_wrapper\">
    <form class=\"form-horizontal\" action=\"../update/UpdateContact.php\" method=\"POST\" id=\"form2\">
        <h1>Update " . $row['First_Name'] . " " . $row["Last_Name"] . "'s Information:</h1>
        <br/>
        <div class=\"row\">
            <div class=\"form-group\">
                <div class=\"col-lg-3\">
                    <label class=\"control-label\" for=\"prefix\">Prefix:</label>
                    <input id=\"prefix\" class=\"form-control\" value='" . $row['Prefix'] . "' placeholder=\"First\" type=\"text\" name=\"prefix\">
                </div>
                <div class=\"col-lg-3\">
                    <label class=\"control-label\" for=\"suffix\">Suffix:</label>
                    <input id=\"suffix\" class=\"form-control\" value='" . $row['Suffix'] . "' placeholder=\"Suffix\" type=\"text\" name=\"suffix\">
                </div>
                <div class=\"col-lg-3\">
                    <label class=\"control-label\" for=\"middleName\">Middle Name:</label>
                    <input id=\"middleName\" class=\"form-control\" value='" . $row['Middle_Name'] . "' placeholder=\"Middle Name\" type=\"text\" name=\"middleName\">
                </div>
                
                <div class=\"col-lg-3\">
                    <label class=\"control-label\" for=\"activeFlag\">Active Contact?</label>
                    <select id=\"activeFlag\" class=\"form-control\" name=\"activeFlag\">
                        <option value=\"1\" " . $isActiveContact . ">Yes</option>
                        <option value=\"0\" " . $isNotActiveContact . ">No</option>
                    </select>
                </div>
            </div>
        </div>

        <div class=\"row\">

            <div class=\"form-group\">
                <div class=\"col-lg-4\">
                    <label class=\"control-label\" for=\"firstName\">First Name:</label>
                    <input id=\"firstName\" class=\"form-control\" value='" . $row['First_Name'] . "' placeholder=\"First\" type=\"text\" name=\"firstName\">
                </div>
                <div class=\"col-lg-4\">
                    <label class=\"control-label\" for=\"lastName\">Last Name:</label>
                    <input id=\"lastName\" class=\"form-control\" value='" . $row['Last_Name'] . "' placeholder=\"Last\" type=\"text\" name=\"lastName\">
                </div>            
                <div class=\"col-lg-4\">
                    <label class=\"control-label\" for=\"middleName\">Middle Name:</label>
                    <input id=\"middleName\" class=\"form-control\" value='" . $row['Middle_Name'] . "' placeholder=\"Middle Name\" type=\"text\" name=\"middleName\">
                </div>
            </div>
        </div>


        <div class=\"row\">
            <div class=\"form-group\">
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"primaryPhone\">Primary Phone Number:</label>
                    <input id=\"primaryPhone\" class=\"form-control\" value='" . $row['Primary_Phone'] . "' placeholder=\"Primary Number\" type=\"text\" name=\"primaryPhone\">
                </div>

                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"secondaryPhone\">Secondary Phone Number:</label>
                    <input id=\"secondaryPhone\" class=\"form-control\" value='" . $row['Secondary_Phone'] . "' placeholder=\"Secondary Number\" type=\"text\" name=\"secondaryPhone\">       
                </div>

            </div>
        </div>

        <div class=\"row\">
            <div class=\"form-group\">
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"addressOne\">Address:</label>
                    <input id=\"addressOne\" class=\"form-control\" value='" . $row['Address_One'] . "' placeholder=\"Address\" type=\"text\" name=\"addressOne\">
                </div>
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"addressTwo\">Apt/Suite:</label>
                    <input id=\"addressTwo\" class=\"form-control\" value='" . $row['Address_Two'] . "' placeholder=\"Apt/Suite\" type=\"text\" name=\"addressTwo\">
                </div>
            </div>

            <div class=\"form-group\">
                <div class=\"col-lg-4\">
                    <label class=\"control-label\" for=\"city\">City:</label>
                    <input id=\"city\" class=\"form-control\" value='" . $row['City'] . "' placeholder=\"City\" type=\"text\" name=\"city\">
                </div>

                <div class=\"col-lg-4\">
                    <label class=\"control-label\" for=\"state\">State:</label>
                    $stateSelect
                </div>

                <div class=\"col-lg-4\">
                    <label class=\"control-label\" for=\"zip\">Zip Code:</label>
                    <input id=\"zip\" class=\"form-control\" value='" . $row['Zip'] . "' placeholder=\"Zip Code\" type=\"text\" name=\"zip\">
                </div>
            </div>
        </div>

        <div class=\"row\">

            <div class=\"form-group\">
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"email\">Email:</label>
                    <input id=\"email\" class=\"form-control\" value='" . $row['Email'] . "' placeholder=\"Email\" type=\"text\" name=\"email\">
                </div>
                <div class=\"col-lg-6\">
                    <label class=\"control-label\" for=\"relationship\">Relationship:</label>
                </div>
            </div>
        </div>


        <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>
    </form>
</div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            ";
echo $output;


?>
