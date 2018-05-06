<?php
include("../../../db/config.php");

$programId = $_POST['programId'];

$queryForVolunteers = "SELECT Volunteer_Employees.First_Name, Volunteer_Employees.Last_Name, Volunteer_Employees.Primary_Phone, Volunteer_Employees.Email,
                        Volunteer_Employees.Address_One, Volunteer_Employees.Address_Two, Volunteer_Employees.City, Volunteer_Employees.State, 
                        Volunteer_Employees.Zip, Volunteer_To_Programs.Active_Id FROM Volunteer_Employees 
                        JOIN Volunteer_To_Programs ON Volunteer_Employees.Id = Volunteer_To_Programs.Volunteer_Id
                        WHERE Volunteer_To_Programs.Program_Id = '$programId' AND Volunteer_To_Programs.Active_Id = 1;";

$volunteerResults = mysqli_query($db, $queryForVolunteers);
$response = '';
$dynamicRowId = 0;

while ($volunteerRow = mysqli_fetch_assoc($volunteerResults)) {
    $dynamicRowId++;
    $volunteerName = $volunteerRow['First_Name'] . " " . $volunteerRow['Last_Name'];
    $volunteerPhone = $volunteerRow['Primary_Phone'];
    $volunteerEmail = $volunteerRow['Email'];
    $volunteerAddressOne = $volunteerRow['Address_One'];
    $volunteerAddressTwo = $volunteerRow['Address_Two'];
    $volunteerCity = $volunteerRow['City'];
    $volunteerState = $volunteerRow['State'];
    $volunteerZip = $volunteerRow['Zip'];
    ?>
    <div class="contact-modal">
        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="volunteerName" class="mdl-textfield__input" readonly
                           value="<?php echo $volunteerName; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="volunteerName">Contact Name</label>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-phone"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="volunteerPrimaryPhone" class="mdl-textfield__input" readonly
                           value="<?php echo $volunteerPhone; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="volunteerPrimaryPhone">Primary Phone</label>
                </div>
            </div>
        </div>

        <p>
            <button class="btn btn-outline" type="button" data-toggle="collapse"
                    aria-controls="collapseAddress<?php echo $dynamicRowId; ?>"
                    data-target="#collapseAddress<?php echo $dynamicRowId; ?>"
            >
                View Address Info <i class="fa fa-toggle-down"></i>
            </button>
        </p>

        <div class="collapse" id="collapseAddress<?php echo $dynamicRowId; ?>">
            <div class="row form-group">
                <div class="col-2 text-center mt-auto mb-auto">
                    <i class="fa fa-envelope"></i>
                </div>
                <div class="col-10">
                    <div class="is-dirty mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerContactEmail" class="mdl-textfield__input" readonly="readonly"
                               value="<?php echo $volunteerEmail; ?>"
                               type="email"/>
                        <label class="mdl-textfield__label" for="volunteerContactEmail">Contact Email</label>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-2 text-center mt-auto mb-auto">
                    <i class="fa fa-address-book-o"></i>
                </div>
                <div class="col-10">
                    <div class="">
                        <?php echo $volunteerAddressOne . " " . $volunteerAddressTwo; ?>
                    </div>
                    <div class="">
                        <?php echo $volunteerCity . ", " . $volunteerState; ?>
                    </div>
                    <div class="">
                        <?php echo $volunteerZip; ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
<?php } ?>