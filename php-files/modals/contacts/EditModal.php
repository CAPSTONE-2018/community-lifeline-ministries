<?php
include("../../../db/config.php");
include("../../scripts/States.php");
$contactId = $_POST['contactId'];

$queryForContact = "SELECT * FROM Contacts WHERE Id = '$contactId';";
$queryForStudentContact = "SELECT Student_To_Contacts.Student_Id, Student_To_Contacts.Relationship, Students.First_Name, Students.Last_Name 
                            FROM Student_To_Contacts JOIN Students on Students.Id = Student_To_Contacts.Id 
                            WHERE Student_To_Contacts.Contact_Id = '$contactId';";
$contactInfoResults = mysqli_query($db, $queryForContact);
$studentInfoResults = mysqli_query($db, $queryForStudentContact);
$response = '';

while ($contactInfoRow = mysqli_fetch_assoc($contactInfoResults)) {
    $dynamicRowId++;
    $firstName = $contactInfoRow['First_Name'];
    $lastName = $contactInfoRow['Last_Name'];
    $prefix = $contactInfoRow['Prefix'];
    $middleName = $contactInfoRow['Middle_Name'];
    $suffix = $contactInfoRow['Suffix'];
    $primaryPhone = $contactInfoRow['Primary_Phone'];
    $secondaryPhone = $contactInfoRow['Secondary_Phone'];
    $addressOne = $contactInfoRow['Address_One'];
    $addressTwo = $contactInfoRow['Address_Two'];
    $city = $contactInfoRow['City'];
    $state = $contactInfoRow['State'];
    $zip = $contactInfoRow['Zip'];
    $email = $contactInfoRow['Email'];

    $studentInfoRow = mysqli_fetch_assoc($studentInfoResults);
    $relationship = $studentInfoRow['Relationship'];
    $studentName = $studentInfoRow['First_Name'] . ' ' . $studentInfoRow['Last_Name'];
    $studentId = $studentInfoRow['Student_Id'];

    if ($state == 'IL') {
        $selectedState = 'Illinois';
    }
    ?>
    <div>
        <form name="editContactForm" id="editContactForm">
            <div class="card">

                <h4 class="heading m-4"><i class="fa fa-graduation-cap"></i> Student Contact</h4>
                <div class="edit-blue-line-color"></div>
                <div class="form-group">
                    <input type="hidden" name="contactId" value="<?php echo $contactId; ?>"/>
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" value="<?php echo $studentName; ?>" class="mdl-textfield__input" id="student" readonly/>
                            <input type="hidden" value="<?php echo $studentId; ?>" name="student"/>
                            <i class="mdl-icon-toggle__label fa fa-sort-down"></i>
                            <label for="student" class="mdl-textfield__label">Student</label>
                            <ul for="student" class="mdl-menu mdl-menu--bottom-left mdl-js-menu"></ul>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="relationToStudent" value="<?php echo $relationship; ?>" class="mdl-textfield__input"
                                   name="relationToStudent" type="text"/>
                            <label class="mdl-textfield__label"
                                   for="relationToStudent">Relation to Student</label>
                        </div>
                    </div>
                </div>

                <h4 class="heading m-4"><i class="fa fa-user"></i> Personal Info</h4>
                <div class="edit-blue-line-color"></div>
                <div class="form-group">
                    <div class="col-sm-2">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" id="contactPrefix"
                                   value="<?php echo $prefix; ?>"/>
                            <input type="hidden" name="contactPrefix"/>
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="contactPrefix" class="mdl-textfield__label">Prefix</label>
                            <ul for="contactPrefix" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" data-val="Mr.">Mr.</li>
                                <li class="mdl-menu__item" data-val="Ms.">Ms.</li>
                                <li class="mdl-menu__item" data-val="Mrs.">Mrs.</li>
                                <li class="mdl-menu__item" data-val="Dr.">Dr.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactFirstName" class="mdl-textfield__input"
                                   name="contactFirstName" type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                   value="<?php echo $firstName; ?>"/>
                            <label class="mdl-textfield__label" for="contactFirstName">First Name</label>
                            <span class="mdl-textfield__error">Invalid First Name Enterd</span>
                        </div>
                    </div>

                    <div class="col-sm-5">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactLastName" class="mdl-textfield__input"
                                   name="contactLastName" type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                   value="<?php echo $lastName; ?>"/>
                            <label class="mdl-textfield__label" for="contactLastName">Last Name</label>
                            <span class="mdl-textfield__error">Invalid Last Name Entered</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="primaryPhone" class="mdl-textfield__input"
                                   name="primaryPhone" type="text"
                                   pattern="^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$"
                                   value="<?php echo $primaryPhone; ?>"/>
                            <label class="mdl-textfield__label"
                                   for="primaryPhone">Primary Phone</label>
                            <span class="mdl-textfield__error">Invalid Phone Number Entered</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="secondaryPhone" class="mdl-textfield__input"
                                   name="secondaryPhone" type="text"
                                   pattern="^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$"
                                   value="<?php echo $secondaryPhone; ?>"/>
                            <label class="mdl-textfield__label" for="secondaryPhone">Secondary Phone</label>
                            <span class="mdl-textfield__error">Invalid Phone Number Entered</span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactEmail" class="mdl-textfield__input"
                                   name="contactEmail" type="text" pattern="^(?!\.).+@.+\..{2,5}$"
                                   value="<?php echo $email; ?>"/>
                            <label class="mdl-textfield__label" for="contactEmail">Email</label>
                            <span class="mdl-textfield__error">Invalid Email Entered</span>
                        </div>
                    </div>
                </div>

                <h4 class="heading m-4"><i class="fa fa-home"></i>Address</h4>
                <div class="edit-blue-line-color"></div>
                <div class="form-group">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactAddressOne" class="mdl-textfield__input"
                                   name="contactAddressOne" type="text"
                                   pattern="^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z0-9]+)*\.?$"
                                   value="<? echo $addressOne; ?>"/>
                            <label class="mdl-textfield__label"
                                   for="contactAddressOne">Address One</label>
                            <span class="mdl-textfield__error">Invalid Address Entered</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactAddressTwo" class="mdl-textfield__input"
                                   name="contactAddressTwo" type="text"
                                   pattern="^[a-zA-Z0-9]+(([\- \.]|[(\. ))[a-zA-Z0-9]+)*$"
                                   value="<?php echo $addressTwo; ?>"/>
                            <label class="mdl-textfield__label"
                                   for="contactAddressTwo">Apt/Suite</label>
                            <span class="mdl-textfield__error">Invalid Apt/Suite Entered</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactCity" class="mdl-textfield__input" name="contactCity"
                                   type="text" pattern="^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*$"
                                   value="<?php echo $city; ?>"/>
                            <label class="mdl-textfield__label" for="contactCity">City</label>
                            <span class="mdl-textfield__error">Invalid City Entered</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactZip" class="mdl-textfield__input" name="contactZip"
                                   type="text" pattern="^[0-9]{5}(-[0-9]{4})?$"
                                   value="<?php echo $zip; ?>"/>
                            <label class="mdl-textfield__label" for="contactZip">Zip Code</label>
                            <span class="mdl-textfield__error">Invalid Zip Code Entered</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" value="<?php echo $selectedState; ?>" class="mdl-textfield__input"
                                   id="contactState" readonly>
                            <input type="hidden" value="<?php echo $state; ?>" name="contactState">
                            <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                            <label for="contactState" class="mdl-textfield__label">State</label>
                            <ul id="contactState" class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php echo stateDropdown(); ?>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <input type="button" onclick="sendEditContactForm()" value="Submit" class="btn btn-primary btn-lg btn-block"/>
                </div>

            </div>
        </form>
    </div>
<?php } ?>

<script type="text/javascript">
    function sendEditContactForm() {
        var serializedForm = $('#editContactForm').serialize();
        launchContactConfirmationModal(serializedForm);
    }
</script>
