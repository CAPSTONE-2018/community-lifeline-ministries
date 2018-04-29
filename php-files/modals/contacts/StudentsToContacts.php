<?php
include("../../../db/config.php");

$contactId = $_POST['contactId'];

$queryForStudents = "SELECT Students.First_Name, Students.Last_Name, Student_To_Contacts.Relationship FROM Students JOIN Student_To_Contacts ON Students.Id = Student_To_Contacts.Student_Id
WHERE Student_To_Contacts.Contact_Id = '$contactId';";

$studentToContactResults = mysqli_query($db, $queryForStudents);
$dynamicRowId = 0;

while ($studentContactsRow = mysqli_fetch_assoc($studentToContactResults)) {
    $dynamicRowId++;
    $studentName = $studentContactsRow['First_Name'] . ' ' . $studentContactsRow['Last_Name'];
    $relationship = $studentContactsRow['Relationship'];
    ?>

    <div class="contact-modal">
        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="contactName" class="mdl-textfield__input" readonly
                           value="<?php echo $studentName; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="contactName">Student Name</label>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-phone"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="contactPrimaryPhone" class="mdl-textfield__input" readonly
                           value="<?php echo $relationship; ?>"
                           type="text"/>
                    <label class="mdl-textfield__label" for="primaryPhone">Relationship to Student</label>
                </div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-2 text-center mt-auto mb-auto">
                <i class="fa fa-envelope"></i>
            </div>
            <div class="col-10">
                <div class="is-focused mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="floatingContactEmail" class="mdl-textfield__input" readonly
                           value="<?php echo $contactEmail; ?>"
                           type="email"/>
                    <label class="mdl-textfield__label" for="contactEmail">Contact Email</label>
                </div>
            </div>
        </div>

        <p>
            <button class="btn btn-outline" type="button" data-toggle="collapse"
                    aria-controls="collapseAddress<?php echo $dynamicRowId; ?>"
                    data-target="#collapseAddress<?php echo $dynamicRowId; ?>">
                View Program Info <i class="fa fa-toggle-down"></i>
            </button>
        </p>

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



<?php }