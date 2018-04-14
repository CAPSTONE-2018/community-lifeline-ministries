<?php
include("../scripts/header.php");
include("../../db/config.php");
$queryForMedicalConcernTypes = "SELECT Id, Type, Note FROM Medical_Concern_Types;";
$medicalConcernTypesResult = mysqli_query($db, $queryForMedicalConcernTypes);
//$medicalConcernTypeRow = mysqli_fetch_array($medicalConcernTypesResult);
$queryForExistingContacts = "SELECT DISTINCT Id, First_Name, Last_Name FROM Contacts";
$existingContactsResult = mysqli_query($db, $queryForExistingContacts);
//$dynamicRowId = 0;

?>
<link rel="stylesheet" href="../../css/form-styles.css"/>
<link rel="stylesheet" href="../../css/toggle-switch.css"/>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#studentInfo" data-toggle="tab">Student Info</a>
                            </li>
                            <li>
                                <a href="#studentMedicalConcerns" data-toggle="tab">Medical Concerns</a>
                            </li>
                            <li>
                                <a href="#studentContact" data-toggle="tab">Student Contact</a>
                            </li>
                        </ul>
                    </div>

                    <form class="form-horizontal" action="../add/AddStudent.php" method="POST" name="newStudentForm"
                          id="newStudentForm">
                        <div class="form-content">
                            <div class="tab-content">
                                <div class="tab-pane active " id="studentInfo">
                                    <div class="header">Add Student Info</div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-user"></i> Personal Info</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="firstName" class="mdl-textfield__input"
                                                       name="studentFirstName" type="text"
						       pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                                <label class="mdl-textfield__label" for="firstName">First Name</label>
                                                <span class="mdl-textfield__error">Invalid First Name Data Entred</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="lastName" class="mdl-textfield__input" name="studentLastName"
                                                       type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                                <label class="mdl-textfield__label" for="lastName">Last Name</label>
                                                <span class="mdl-textfield__error">Invalide Last Name Data Entered</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="middleName" class="mdl-textfield__input"
                                                       name="studentMiddleName" type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                                <label class="mdl-textfield__label" for="middleName">Middle Name</label>
                                                <span class="mdl-textfield__error">Invalid Middle Name Data Entered</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="suffix" class="mdl-textfield__input" name="studentSuffix"
                                                       type="text" pattern="^[A-Z](([ \.]|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                                                <label class="mdl-textfield__label" for="suffix">Suffix</label>
                                                <span class="mdl-textfield__error">Invalid Suffix Data Entered</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="dob" class="mdl-textfield__input" name="dob" type="text"
						 pattern="^((0[1-9])|(1[0-2]))\/((0[1-9])|([1-2][0-9])|(3[0-1]))\?[1-9][0-9]{3}$"/>
                                                <label class="mdl-textfield__label" for="dob">D.O.B.</label>
                                                <span class="mdl-textfield__error">Invalid D.O.B. Data Entered</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="ethnicity" class="mdl-textfield__input" name="ethnicity"
                                                       type="text" pattern="^[A-Z](([ \-|(\, )])?[a-zA-Z]+)*$"/>
                                                <label class="mdl-textfield__label" for="ethnicity">Ethnicity</label>
                                                <span class="mdl-textfield__error">Invalid Ethnicity Data Entered</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="" class="mdl-textfield__input" id="gender" readonly>
                                                <input type="hidden" value="" name="gender">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="gender" class="mdl-textfield__label">Gender</label>
                                                <ul for="gender" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="M">Male</li>
                                                    <li class="mdl-menu__item" data-val="F">Female</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-home"></i> Address</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentAddressOne" class="mdl-textfield__input"
                                                       name="studentAddressOne" type="text"
						       pattern="^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z0-9]+)*\.?$"/>
                                                <label class="mdl-textfield__label"
                                                       for="studentAddressOne">Address</label>
                                                <span class="mdl-textfield__error">Invalid Address Data Entered</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentAddressTwo" class="mdl-textfield__input"
                                                       name="studentAddressTwo" type="text" pattern="^[a-zA-Z0-9]+(([\- \.]|(\. ))[a-zA-Z0-9]+)*$"/>
                                                <label class="mdl-textfield__label"
                                                       for="studentAddressTwo">Apt/Suite</label>
                                                <span class="mdl-textfield__error">Invalid Apt/Suite Data Entered</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentCity" class="mdl-textfield__input" name="studentCity"
                                                       type="text" pattern="^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                                                <label class="mdl-textfield__label" for="studentCity">City</label>
                                                <span class="mdl-textfield__error">Invalid City Data Entered</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="" class="mdl-textfield__input"
                                                       id="studentState" readonly>
                                                <input type="hidden" value="" name="studentState">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="studentState" class="mdl-textfield__label">State</label>
                                                <ul id="studentState"
                                                    class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <?php include("../scripts/States.php");
                                                    echo stateDropdown("studentState")
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentZip" class="mdl-textfield__input" name="studentZip"
                                                       type="text" pattern="^[0-9]{5}(-[0-9]{4})?$"/>
                                                <label class="mdl-textfield__label" for="studentZip">Zip Code</label>
                                                <span class="mdl-textfield__error">Invalid Zip Code Data Entered</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-file"></i> Documents</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-10">

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentSchool" class="mdl-textfield__input"
                                                       name="studentSchool" type="text"/>
                                                <label class="mdl-textfield__label" for="studentSchool">School Currently
                                                    Attending</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="toggle-title">Reduced Lunch Eligible</div>
                                            <ul class="tg-list">
                                                <div class="toggle-side-label">No</div>
                                                <li class="tg-list-item">
                                                    <input class="tgl tgl-flat" id="cb1"
                                                           name="reducedLunchEligibilityCheckbox"
                                                           type="checkbox"
                                                    />
                                                    <label class="tgl-btn" for="cb1"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="toggle-title">Permission Slip On File</div>
                                            <ul class="tg-list">
                                                <div class="toggle-side-label">No</div>
                                                <li class="tg-list-item">
                                                    <input class="tgl tgl-flat" id="cb2" name="permissionSlipCheckbox"
                                                           type="checkbox"/>
                                                    <label class="tgl-btn" for="cb2"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="toggle-title">Birth Certificate on
                                                File
                                            </div>
                                            <ul class="tg-list">
                                                <div class="toggle-side-label">No</div>
                                                <li class="tg-list-item">
                                                    <input class="tgl tgl-flat" id="cb3" name="birthCertificateCheckbox"
                                                           type="checkbox"/>
                                                    <label class="tgl-btn" for="cb3"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="toggle-title">Immediate Emotional Problem</div>
                                            <ul class="tg-list">
                                                <div class="toggle-side-label">No</div>
                                                <li class="tg-list-item">
                                                    <input class="tgl tgl-flat" id="cb4" name="iepCheckbox" type="checkbox"/>
                                                    <label class="tgl-btn" for="cb4"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Medical concern tab-->
                                <div class="tab-pane" id="studentMedicalConcerns">
                                    <div class="header">Add Medical Info</div>
                                    <div>
                                        <h4 class="heading"><i class="glyphicon glyphicon-alert"></i> Medical Concerns</h4>
                                        <!--Create button to add another medical condition field-->
                                        <button type="button" id="add-new-medical-concern-button">Add</button>
                                    </div>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="medicalConcernName" class="mdl-textfield__input"
                                                       name="medicalConcernName" type="text"/>
                                                <label class="mdl-textfield__label"
                                                       for="medicalConcernName">Name</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" class="mdl-textfield__input" id="medicalConcernType" readonly>
                                                <input type="hidden" name="medicalConcernType">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="medicalConcernType" class="mdl-textfield__label">Type</label>
                                                <ul for="medicalConcernType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <?php
                                                    while ($medicalConcernTypeRow = mysqli_fetch_assoc($medicalConcernTypesResult)) {
                                                        echo "<li class='mdl-menu__item' data-val='" . $medicalConcernTypeRow['Id'] . "' value=" . $medicalConcernTypeRow['Id'] . ">" . $medicalConcernTypeRow['Type'] . "</li>";
                                                    }

                                                    ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <textarea id="medicalConcernNote" class="mdl-textfield__input"
                                                          name="medicalConcernNote" type="text">
                                                </textarea>
                                                <label class="mdl-textfield__label"
                                                       for="medicalConcernNote">Note</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new-medical-concern-layer"></div>
                                </div>
                                <!--Ends the medical concern portion-->

                                <div class="tab-pane" id="studentContact">

                                    <div class="header">Add Contact Info</div>

                                    <h4 class="heading"><i class="glyphicon glyphicon-earphone"></i> Student Contact Information</h4>
                                    <!--Create button to add another contact drop down-->
                                    <button type="button" id="add-new-contact-dropdown-button">Add</button>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text"
                                                       id="studentContact"
                                                       class="mdl-textfield__input"
                                                       readonly>
                                                <input type="hidden" name="studentContact">
                                                <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
                                                <label for="studentContact" class="mdl-textfield__label">Select From Existing Contact</label>
                                                <ul for="studentContact" class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <?php
                                                    while ($existingContactsRow = mysqli_fetch_assoc($existingContactsResult)) {
                                                        $contactNameToDisplay = $existingContactsRow['First_Name'] . " " . $existingContactsRow['Last_Name'];
                                                        echo "<li class='mdl-menu__item' value=" . $existingContactsRow['Id'] . ">" . $contactNameToDisplay . "</li>";
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <button type="button" id="create-new-contact-button"
                                                    class="btn btn-outline-primary">Add New Contact
                                            </button>
                                        </div>

                                        <div class="row col-sm-12 add-new-contact-dropdown">

                                        </div>

                                        <div id="show-new-contact-form" class="col-sm-12"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card-footer">
                        <div class="right-align">
                            <!--   Button trigger modal -->
                            <button id="buttonTrigger" type="button" class="btn btn-right btn-primary"
                                    data-toggle="modal" data-target="#exampleModalCenter">
                                Verify Info
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="card-body" id="modalBody">

                    </div>
                </div>

            </div>
            x
            <div class="modal-footer">
                <div class="right-align">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="formSubmitButton" form="newStudentForm" class="btn btn-primary">Submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../js/new-student-scripts/ToggleSwitchValues.js"></script>
<?php include("../scripts/footer.php"); ?>
<script src="../../js/input-styling.min.js"></script>
<script>
    $(document).ready(function () {
        $('#create-new-contact-button').click(function () {
            $.ajax({
                url: "../scripts/AjaxDynamicStudentContact.php",
                method: "GET",
                success: function (output) {
                    $('#show-new-contact-form').slideDown().html(output);
                }
            })
        });
    });
</script>

<script>
    var dynamicMedicalConcernId = 0;
    $(document).ready(function () {
        $('#add-new-medical-concern-button').click(function () {
            dynamicMedicalConcernId++;
            $.ajax({
                url: "../scripts/AjaxDynamicMedicalConcern.php",
                method: "POST",
                data: {dynamicMedicalConcernId: dynamicMedicalConcernId},
                success: function (output) {
                    $('.new-medical-concern-layer').slideDown().append(output);
                }
            })
        });
    });
</script>

<script type="text/javascript">
    var dynamicContactId = 0;
    $(document).ready(function () {
        $('#add-new-contact-dropdown-button').click(function () {
            dynamicContactId++;
            $.ajax({
                url: "../scripts/AjaxDynamicContactDropdown.php",
                method: "POST",
                data: {dynamicContactId: dynamicContactId},
                success: function (output) {
                    $('.add-new-contact-dropdown').slideDown().append(output);
                }
            })
        });
    });
</script>
<script src="../../js/new-student-scripts/NewStudentModal.js"></script>
<script type="text/javascript" src="../../js/MdlSelect.js"></script>
<!--<script src="../../js/new-student-scripts/NewStudentMed.js"></script>-->
