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
$id = intval($_POST['sid']);

session_start();

$_SESSION['studentId'] = $id;



$query = "SELECT * FROM Student WHERE Id ='".$id."' ;";
$query2 = "SELECT * FROM Allergy WHERE Student_Id ='".$id."' ;";

$result = mysqli_query($db, $query);
$row = mysqli_fetch_array($result);

$result2 = mysqli_query($db, $query2);
$row2 = mysqli_fetch_array($result2);

$maleSelected = "";
$femaleSelected = "";

if ($row['Gender'] == "M"){
    $maleSelected = "selected=\"selected\"";
}else{
    $femaleSelected = "selected=\"selected\"";
}

$gemsSelected = "";
$thunderSelected = "";

if ($row['Program'] == "G.E.M.S"){
    $gemsSelected = "selected=\"selected\"";
}else{
    $thunderSelected = "selected=\"selected\"";
}

$permYes = "";
$permNo = "";

if ($row['Permission_Slip'] == 1){
    $permYes = "selected=\"selected\"";
}else{
    $permNo = "selected=\"selected\"";
}

$bcYes = "";
$bcNo = "";

if ($row['Birth_Certificate'] == 1){
    $bcYes = "selected=\"selected\"";
}else{
    $bcNo = "selected=\"selected\"";
}

$rdleYes = "";
$rdleNo = "";

if ($row['Reduced_Lunch_Eligible'] == 1){
    $rdleYes = "selected=\"selected\"";
}else{
    $rdleNo = "selected=\"selected\"";
}

$iepYes = "";
$iepNo = "";

if ($row['IEP'] == 1){
    $iepYes = "selected=\"selected\"";
}else{
    $iepNo = "selected=\"selected\"";
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

                <form class=\"form-horizontal\" action=\"StudentUpdated.php\" method=\"POST\" id=\"form2\">

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
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"dob\">Date of Birth:</label>
                                <input id=\"dob\" class=\"form-control\" value='".$row['Birth_Date']."' placeholder=\"YYYY/MM/DD\" type=\"text\" name=\"dob\">
                            </div>
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"ethnic\">Ethnicity:</label>
                                <input id=\"ethnic\" class=\"form-control\" value='".$row['Ethnicity']."' placeholder=\"Ethnicity\" type=\"text\" name=\"ethnicity\">
                            </div>
                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"gend\">Gender:</label>
                                    <select id=\"gend\" class=\"form-control\" name=\"gender\">
                                        <option value=\"M\" ". $maleSelected .">Male</option>
                                        <option value=\"F\" ". $femaleSelected .">Female</option>
                                    </select>
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

                            <div class=\"col-lg-8\">
                                <label class=\"control-label\" for=\"sschool\">School:</label>
                                <input id=\"sschool\" class=\"form-control\" value='".$row['School']."' placeholder=\"School\" type=\"text\" name=\"school\">
                            </div>

                            <div class=\"col-lg-4\">
                                <label class=\"control-label\" for=\"sprogramname\">Program Name:</label>
                                <select id=\"sprogramname\" class=\"form-control\" name=\"program\">
                                    <option value=\"G.E.M.S\" ". $gemsSelected .">G.E.M.S</option>
                                    <option value=\"Sons of Thunder\" ". $thunderSelected .">Sons of Thunder</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">

                        <div class=\"form-group\">

                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"spermission\">Permission Slip on File:</label>
                                <select id=\"spermission\" class=\"form-control\" name=\"permission_slip\">
                                    <option value=\"1\" ". $permYes .">Yes</option>
                                    <option value=\"0\" ". $permNo .">No</option>
                                </select>
                            </div>

                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"sbirthcert\">Birth Certificate on File:</label>
                                <select id=\"sbirthcert\" class=\"form-control\" name=\"birth_certificate\">
                                    <option value=\"1\" ". $bcYes .">Yes</option>
                                    <option value=\"0\" ". $bcNo .">No</option>
                                </select>
                            </div>


                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"sreducedlunch\">Reduced Lunch Eligible:</label>
                                <select id=\"sreducedlunch\" class=\"form-control\" name=\"reduced_lunch_eligible\">
                                    <option value=\"1\" ". $rdleYes .">Yes</option>
                                    <option value=\"0\" ". $rdleNo .">No</option>
                                </select>
                            </div>

                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"siep\">Immediate Emotional Problem:</label>
                                <select id=\"siep\" class=\"form-control\" name=\"iep\">
                                    <option value=\"1\" ". $iepYes .">Yes</option>
                                    <option value=\"0\" ". $iepNo .">No</option>
                                </select>
                            </div>

                        </div>

                    </div>

                    <br />

                    <h1>Allergies:</h1>
                    <br />

                    <div class=\"row\">

                        <div class=\"form-group\">

                            <div class=\"col-lg-3\">
                                <label class=\"control-label\" for=\"satype\">Type:</label>
                                <input id=\"satype\" class=\"form-control\" value='". $row2['Type'] ."' placeholder=\"Allergy Type\" type=\"text\" name=\"atype\">
                            </div>
                            <div class=\"col-lg-9\">
                                <label class=\"control-label\" for=\"sanote\">Note:</label>
                                <input id=\"sanote\" class=\"form-control\" value='". $row2['Note'] ."' placeholder=\"Allergy Note\" type=\"text\" name=\"anote\">
                            </div>

                        </div>
                    </div>

                    <input id=\"submit\" class=\"btn btn-primary btn-lg btn-block\" type=\"submit\" value=\"Submit\"><br><br>

                </form>

            </div>";

echo $output;




?>