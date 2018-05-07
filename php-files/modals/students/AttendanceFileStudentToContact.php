<?php
include("../../../db/config.php");

$studentId = $_POST['studentId'];

$queryForContacts = "SELECT Contacts.Id, Contacts.First_Name, Contacts.Last_Name, Contacts.Primary_Phone, Contacts.Email, Contacts.Address_One, Contacts.Address_Two,
              Contacts.City, Contacts.State, Contacts.Zip FROM Contacts
            JOIN Student_To_Contacts ON Contacts.Id = Student_To_Contacts.Contact_Id
            WHERE Student_To_Contacts.Student_Id = '$studentId' AND Student_To_Contacts.Active_Id = 1;";
$studentContactResults = mysqli_query($db, $queryForContacts);
$dynamicRowId = 0;

while ($contactRow = mysqli_fetch_assoc($studentContactResults)) {
    $dynamicRowId++;
    $contactId = $contactRow['Id'];
    $contactName = $contactRow['First_Name'] . " " . $contactRow['Last_Name'];
    $contactPhone = $contactRow['Primary_Phone'];
    $contactEmail = $contactRow['Email'];
    $contactAddressOne = $contactRow['Address_One'];
    $contactAddressTwo = $contactRow['Address_Two'];
    $contactCity = $contactRow['City'];
    $contactState = $contactRow['State'];
    $contactZip = $contactRow['Zip'];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="contactName" class="mdl-textfield__input" readonly
                           value="<?php echo $contactName; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="contactName">Contact Name</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-phone"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="contactPrimaryPhone" class="mdl-textfield__input" readonly
                           value="<?php echo $contactPhone; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="contactPrimaryPhone">Primary Phone</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-envelope"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="contactEmail" class="mdl-textfield__input" readonly="readonly"
                           value="<?php echo $contactEmail; ?>"
                           type="email"/>
                    <label class="mdl-textfield__label" for="contactEmail">Contact Email</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <button class="btn btn-outline" type="button" data-toggle="collapse"
                        aria-controls="collapseAddress<?php echo $dynamicRowId; ?>"
                        data-target="#collapseAddress<?php echo $dynamicRowId; ?>"
                >
                    View Address Info <i class="fa fa-toggle-down"></i>
                </button>
            </div>
        </div>

        <div class="collapse" id="collapseAddress<?php echo $dynamicRowId; ?>">
            <div class="row form-group">
                <div class="col-2 text-center mt-auto mb-auto">
                    <i class="fa fa-address-book-o"></i>
                </div>
                <div class="col-10">
                    <div class="">
                        <?php echo $contactAddressOne . " " . $contactAddressTwo; ?>
                    </div>
                    <div class="">
                        <?php echo $contactCity . ", " . $contactState; ?>
                    </div>
                    <div class="">
                        <?php echo $contactZip; ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
<?php } ?>