<?php
//Setting up variable to use for mysqli function
$server = "localhost";
$user = "clm_user";
$psw = "dbuser";
$database = "community_lifeline";

//Connecting to database
$db = mysqli_connect($server, $user, $psw, $database);
if (!$db) {
    echo "Error - Could not connect to MySQL";
    exit;
}
$output = "";
$id = intval($_POST['vid']);

session_start();

$_SESSION['VolunteerEmployeeId'] = $id;



$query = "SELECT * FROM Volunteer_Employee WHERE Id ='".$id."' ;";


$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);



$volunteerSelected = "";
$employeeSelected = "";

if ($row['Type'] == "Volunteer"){
    $volunteerSelected = "selected=\"selected\"";
}else{
    $employeeSelected = "selected=\"selected\"";
}

$gemsSelected = "";
$thunderSelected = "";

if ($row['Program'] == "G.E.M.S"){
    $gemsSelected = "selected=\"selected\"";
}else{
    $thunderSelected = "selected=\"selected\"";
}


$alselected = "";
$akselected = "";
$azselected = "";
$arselected = "";
$caselected = "";
$coselected = "";
$ctselected = "";
$deselected = "";
$flselected = "";
$gaselected = "";
$hiselected = "";
$idselected = "";
$ilselected = "";
$inselected = "";
$iaselected = "";
$ksselected = "";
$kyselected = "";
$laselected = "";
$meselected = "";
$mdselected = "";
$maselected = "";
$miselected = "";
$mnselected = "";
$msselected = "";
$moselected = "";
$mtselected = "";
$neselected = "";
$nvselected = "";
$nhselected = "";
$njselected = "";
$nmselected = "";
$nyselected = "";
$ncselected = "";
$ndselected = "";
$ohselected = "";
$okselected = "";
$orselected = "";
$paselected = "";
$riselected = "";
$scselected = "";
$sdselected = "";
$tnselected = "";
$txselected = "";
$utselected = "";
$vtselected = "";
$vaselected = "";
$waselected = "";
$wvselected = "";
$wiselected = "";
$wyselected = "";

if ($row['State'] == "AL"){
    $alselected = "selected=\"selected\"";
}
if ($row['State'] == "AK"){
    $akselected = "selected=\"selected\"";
}
if ($row['State'] == "AZ"){
    $azselected = "selected=\"selected\"";
}
if ($row['State'] == "AR"){
    $arselected = "selected=\"selected\"";
}
if ($row['State'] == "CA"){
    $caselected = "selected=\"selected\"";
}
if ($row['State'] == "CO"){
    $coselected = "selected=\"selected\"";
}
if ($row['State'] == "CT"){
    $ctselected = "selected=\"selected\"";
}
if ($row['State'] == "DE"){
    $deselected = "selected=\"selected\"";
}
if ($row['State'] == "FL"){
    $flselected = "selected=\"selected\"";
}
if ($row['State'] == "GA"){
    $gaselected = "selected=\"selected\"";
}
if ($row['State'] == "HI"){
    $hiselected = "selected=\"selected\"";
}
if ($row['State'] == "ID"){
    $idselected = "selected=\"selected\"";
}
if ($row['State'] == "IL"){
    $ilselected = "selected=\"selected\"";
}
if ($row['State'] == "IN"){
    $inselected = "selected=\"selected\"";
}
if ($row['State'] == "IA"){
    $iaselected = "selected=\"selected\"";
}
if ($row['State'] == "KS"){
    $ksselected = "selected=\"selected\"";
}
if ($row['State'] == "KY"){
    $kyselected = "selected=\"selected\"";
}
if ($row['State'] == "LA"){
    $laselected = "selected=\"selected\"";
}
if ($row['State'] == "ME"){
    $meselected = "selected=\"selected\"";
}
if ($row['State'] == "MD"){
    $mdselected = "selected=\"selected\"";
}
if ($row['State'] == "MA"){
    $maselected = "selected=\"selected\"";
}
if ($row['State'] == "MI"){
    $miselected = "selected=\"selected\"";
}
if ($row['State'] == "MN"){
    $mnselected = "selected=\"selected\"";
}
if ($row['State'] == "MS"){
    $msselected = "selected=\"selected\"";
}
if ($row['State'] == "MO"){
    $moselected = "selected=\"selected\"";
}
if ($row['State'] == "MT"){
    $mtselected = "selected=\"selected\"";
}
if ($row['State'] == "NE"){
    $neselected = "selected=\"selected\"";
}
if ($row['State'] == "NV"){
    $nvselected = "selected=\"selected\"";
}
if ($row['State'] == "NH"){
    $nhselected = "selected=\"selected\"";
}
if ($row['State'] == "NJ"){
    $njselected = "selected=\"selected\"";
}
if ($row['State'] == "NM"){
    $nmselected = "selected=\"selected\"";
}
if ($row['State'] == "NY"){
    $nyselected = "selected=\"selected\"";
}
if ($row['State'] == "NC"){
    $ncselected = "selected=\"selected\"";
}
if ($row['State'] == "ND"){
    $ndselected = "selected=\"selected\"";
}
if ($row['State'] == "OH"){
    $ohselected = "selected=\"selected\"";
}
if ($row['State'] == "OK"){
    $okselected = "selected=\"selected\"";
}
if ($row['State'] == "OR"){
    $orselected = "selected=\"selected\"";
}
if ($row['State'] == "PA"){
    $paselected = "selected=\"selected\"";
}
if ($row['State'] == "RI"){
    $riselected = "selected=\"selected\"";
}
if ($row['State'] == "SC"){
    $scselected = "selected=\"selected\"";
}
if ($row['State'] == "SD"){
    $sdselected = "selected=\"selected\"";
}
if ($row['State'] == "TN"){
    $tnselected = "selected=\"selected\"";
}
if ($row['State'] == "TX"){
    $txselected = "selected=\"selected\"";
}
if ($row['State'] == "UT"){
    $utselected = "selected=\"selected\"";
}
if ($row['State'] == "VT"){
    $vtselected = "selected=\"selected\"";
}
if ($row['State'] == "VA"){
    $vaselected = "selected=\"selected\"";
}
if ($row['State'] == "WA"){
    $waselected = "selected=\"selected\"";
}
if ($row['State'] == "WV"){
    $wvselected = "selected=\"selected\"";
}
if ($row['State'] == "WI"){
    $wiselected = "selected=\"selected\"";
}
if ($row['State'] == "WY"){
    $wyselected = "selected=\"selected\"";
}

$output = "<div id=\"form_wrapper\">

                <form class=\"form-horizontal\" action=\"VolunteerEmployeeUpdated.php\" method=\"POST\" id=\"form2\">

                    <h1>Update ".$row['First_Name']." ".$row["Last_Name"]."'s Information:</h1>
                    <br />

                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"firstname\">First Name:</label>
                                <input id=\"firstname\" class=\"form-control\" value='".$row['First_Name']."' placeholder=\"First\" type=\"text\" name=\"fname\">
                            </div>
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"lastname\">Last Name:</label>
                                <input id=\"lastname\" class=\"form-control\" value='".$row['Last_Name']."' placeholder=\"Last\" type=\"text\" name=\"lname\">
                            </div>
                        </div>
                    </div>
                    
                    <div class=\"row\">
                        <div class=\"form-group\">
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"cellnum\">Cell Number:</label>
                                <input id=\"cellnum\" class=\"form-control\" value='".$row['Phone_Cell']."' placeholder=\"Cell Number\" type=\"text\" name=\"cellphone\">
                            </div>
    
                            <div class=\"col-lg-6\">
                                <label class=\"control-label\" for=\"homenum\">Home Number:</label>
                                <input id=\"homenum\" class=\"form-control\" value='".$row['Phone_Home']."' placeholder=\"Home Number\" type=\"text\" name=\"homephone\">
                            </div>
    
                        </div>
                    </div>


           

                    <div class=\"row\">

                        <div class=\"form-group\">
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"saddress\">Address:</label>
                                <input id=\"saddress\" class=\"form-control\" value='".$row['Address']."' placeholder=\"Address\" type=\"text\" name=\"address\">
                            </div>
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"scity\">City:</label>
                                <input id=\"scity\" class=\"form-control\" value='".$row['City']."' placeholder=\"City\" type=\"text\" name=\"city\">
                            </div>
                            <div class=\"col-lg-3\">
                                <!--<label class=\"control-label\" for=\"sstate\">State:</label>
                                <input id=\"sstate\" class=\"form-control\" placeholder=\"State\" type=\"text\" name=\"state\">-->
                                <label class=\"control-label\" for=\"sstate\">State:</label>
                                <select id=\"sstate\" class=\"form-control\" name=\"state\">
                                    <option value=\"AL\" ". $alselected .">Alabama</option>
                                    <option value=\"AK\" ". $akselected .">Alaska</option>
                                    <option value=\"AZ\" ". $azselected .">Arizona</option>
                                    <option value=\"AR\" ". $arselected .">Arkansas</option>
                                    <option value=\"CA\" ". $caselected .">California</option>
                                    <option value=\"CO\" ". $coselected .">Colorado</option>
                                    <option value=\"CT\" ". $ctselected .">Connecticut</option>
                                    <option value=\"DE\" ". $deselected .">Delaware</option>
                                    <option value=\"FL\" ". $flselected .">Florida</option>
                                    <option value=\"GA\" ". $gaselected .">Georgia</option>
                                    <option value=\"HI\" ". $hiselected .">Hawaii</option>
                                    <option value=\"ID\" ". $idselected .">Idaho</option>
                                    <option value=\"IL\" ". $ilselected .">Illinois</option>
                                    <option value=\"IN\" ". $inselected .">Indiana</option>
                                    <option value=\"IA\" ". $iaselected .">Iowa</option>
                                    <option value=\"KS\" ". $ksselected .">Kansas</option>
                                    <option value=\"KY\" ". $kyselected .">Kentucky</option>
                                    <option value=\"LA\" ". $laselected .">Louisiana</option>
                                    <option value=\"ME\" ". $meselected .">Maine</option>
                                    <option value=\"MD\" ". $mdselected .">Maryland</option>
                                    <option value=\"MA\" ". $maselected .">Massachusetts</option>
                                    <option value=\"MI\" ". $miselected .">Michigan</option>
                                    <option value=\"MN\" ". $mnselected .">Minnesota</option>
                                    <option value=\"MS\" ". $msselected .">Mississippi</option>
                                    <option value=\"MO\" ". $moselected .">Missouri</option>
                                    <option value=\"MT\" ". $mtselected .">Montana</option>
                                    <option value=\"NE\" ". $neselected .">Nebraska</option>
                                    <option value=\"NV\" ". $nvselected .">Nevada</option>
                                    <option value=\"NH\" ". $nhselected .">New Hampshire</option>
                                    <option value=\"NJ\" ". $njselected .">New Jersey</option>
                                    <option value=\"NM\" ". $nmselected .">New Mexico</option>
                                    <option value=\"NY\" ". $nyselected .">New York</option>
                                    <option value=\"NC\" ". $ncselected .">North Carolina</option>
                                    <option value=\"ND\" ". $ndselected .">North Dakota</option>
                                    <option value=\"OH\" ". $ohselected .">Ohio</option>
                                    <option value=\"OK\" ". $okselected .">Oklahoma</option>
                                    <option value=\"OR\" ". $orselected .">Oregon</option>
                                    <option value=\"PA\" ". $paselected .">Pennsylvania</option>
                                    <option value=\"RI\" ". $riselected .">Rhode Island</option>
                                    <option value=\"SC\" ". $scselected .">South Carolina</option>
                                    <option value=\"SD\" ". $sdselected .">South Dakota</option>
                                    <option value=\"TN\" ". $tnselected .">Tennessee</option>
                                    <option value=\"TX\" ". $txselected .">Texas</option>
                                    <option value=\"UT\" ". $utselected .">Utah</option>
                                    <option value=\"VT\" ". $vtselected .">Vermont</option>
                                    <option value=\"VA\" ". $vaselected .">Virginia</option>
                                    <option value=\"WA\" ". $waselected .">Washington</option>
                                    <option value=\"WV\" ". $wvselected .">West Virginia</option>
                                    <option value=\"WI\" ". $wiselected .">Wisconsin</option>
                                    <option value=\"WY\" ". $wyselected .">WYoming</option>
                                </select>
                            </div>
                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"szip\">Zip Code:</label>
                                <input id=\"szip\" class=\"form-control\" value='".$row['Zip']."' placeholder=\"Zip Code\" type=\"text\" name=\"zip\">
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
                                <label class=\"control-label\" for=\"program\">Program:</label>
                                    <select id=\"program\" class=\"form-control\" name=\"program\">
                                        <option value=\"G.E.M.S\" ". $gemsSelected .">G.E.M.S</option>
                                        <option value=\"Sons of Thunder\" ". $thunderSelected .">Sons of Thunder</option>
                                    </select>
                            </div>
                    </div>
                </div>

                    

                    

                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

                </form>

            </div>";

echo $output;




?>