<?php
include("../scripts/header.php");
include("../scripts/States.php");
include("../../db/config.php");
$queryForMedicalConcernTypes = "SELECT Id, Type, Note FROM Medical_Concern_Types;";
$medicalConcernTypesResult = mysqli_query($db, $queryForMedicalConcernTypes);
$queryForPrograms = "SELECT Id, Program_Name FROM Programs";
//$medicalConcernTypeRow = mysqli_fetch_array($medicalConcernTypesResult);
$queryForExistingContacts = "SELECT DISTINCT Id, First_Name, Last_Name FROM Contacts";
$existingContactsResult = mysqli_query($db, $queryForExistingContacts);
$existingProgramResults = mysqli_query($db, $queryForPrograms);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
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

                    <form class="form-horizontal" method="POST" name="newStudentForm" id="newStudentForm">
                        <div class="form-content">
                            <div class="tab-content">
                                <div class="tab-pane active " id="studentInfo">
                                    <div class="header"><i class="fa fa-graduation-cap"></i> Student Info</div>

                                    <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="firstName" class="mdl-textfield__input"
                                                       name="studentFirstName" type="text"
                                                       onkeypress="return suppressEnter()"
                                                       pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                                <label class="mdl-textfield__label" for="firstName">First Name</label>
                                                <span class="mdl-textfield__error">Invalid First Name Data Entered</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="lastName" class="mdl-textfield__input" name="studentLastName"
                                                       type="text" onkeypress="return suppressEnter()"
                                                       pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                                <label class="mdl-textfield__label" for="lastName">Last Name</label>
                                                <span class="mdl-textfield__error">Invalid Last Name Data Entered</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="middleName" class="mdl-textfield__input"
                                                       name="studentMiddleName" type="text"
                                                       pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                                <label class="mdl-textfield__label" for="middleName">Middle Name</label>
                                                <span class="mdl-textfield__error">Invalid Middle Name Data Entered</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="suffix" class="mdl-textfield__input" name="studentSuffix"
                                                       type="text" onkeypress="return suppressEnter()"
                                                       pattern="^[A-Z](([ \.]|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                                                <label class="mdl-textfield__label" for="suffix">Suffix</label>
                                                <span class="mdl-textfield__error">Invalid Suffix Data Entered</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="dob" class="mdl-textfield__input" name="dob" type="text"
                                                       onkeypress="return suppressEnter()"
                                                       pattern="^((0[1-9])|(1[0-2]))\/((0[1-9])|([1-2][0-9])|(3[0-1]))\/[1-9][0-9]{3}$"/>
                                                <label class="mdl-textfield__label" for="dob">D.O.B.</label>
                                                <span class="mdl-textfield__error">Invalid D.O.B. Data Entered</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="ethnicity" class="mdl-textfield__input" name="ethnicity"
                                                       type="text" onkeypress="return suppressEnter()"
                                                       pattern="^[A-Z](([ \-|(\, )])?[a-zA-Z]+)*$"/>
                                                <label class="mdl-textfield__label" for="ethnicity">Ethnicity</label>
                                                <span class="mdl-textfield__error">Invalid Ethnicity Data Entered</span>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" class="mdl-textfield__input" id="gender"
                                                       readonly>
                                                <input type="hidden" name="gender">
                                                <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                                                <label for="gender" class="mdl-textfield__label">Gender</label>
                                                <ul for="gender" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <li class="mdl-menu__item" data-val="M">Male</li>
                                                    <li class="mdl-menu__item" data-val="F">Female</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="fa fa-home"></i> Address</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentAddressOne" class="mdl-textfield__input"
                                                       name="studentAddressOne" type="text"
                                                       onkeypress="return suppressEnter()"
                                                       pattern="^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z0-9]+)*\.?$"/>
                                                <label class="mdl-textfield__label"
                                                       for="studentAddressOne">Address</label>
                                                <span class="mdl-textfield__error">Invalid Address Data Entered</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentAddressTwo" class="mdl-textfield__input"
                                                       name="studentAddressTwo" type="text"
                                                       onkeypress="return suppressEnter()"
                                                       pattern="^[a-zA-Z0-9]+(([\- \.]|(\. ))[a-zA-Z0-9]+)*$"/>
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
                                                       type="text" onkeypress="return suppressEnter()"
                                                       pattern="^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                                                <label class="mdl-textfield__label" for="studentCity">City</label>
                                                <span class="mdl-textfield__error">Invalid City Data Entered</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" value="" class="mdl-textfield__input"
                                                       id="studentState" readonly>
                                                <input type="hidden" value="" name="studentState">
                                                <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                                <label for="studentState" class="mdl-textfield__label">State</label>
                                                <ul id="studentState"
                                                    class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <?php echo stateDropdown(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">

                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentZip" class="mdl-textfield__input" name="studentZip"
                                                       type="text" onkeypress="return suppressEnter()"
                                                       pattern="^[0-9]{5}(-[0-9]{4})?$"/>
                                                <label class="mdl-textfield__label" for="studentZip">Zip Code</label>
                                                <span class="mdl-textfield__error">Invalid Zip Code Data Entered</span>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="heading"><i class="fa fa-file"></i> Documents</h4>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="studentSchool" class="mdl-textfield__input"
                                                       name="studentSchool" type="text"
                                                       onkeypress="return suppressEnter()"/>
                                                <label class="mdl-textfield__label" for="studentSchool">School Currently
                                                    Attending</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" class="mdl-textfield__input" id="programToEnroll"
                                                       readonly>
                                                <input type="hidden" name="programToEnroll">
                                                <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                                                <label for="programToEnroll" class="mdl-textfield__label">Program to
                                                    Enroll</label>
                                                <ul for="programToEnroll"
                                                    class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <?php while ($existingProgramsRow = mysqli_fetch_assoc($existingProgramResults)) { ?>
                                                        <li class="mdl-menu__item"
                                                            data-val="<?php echo $existingProgramsRow['Id']; ?>"><?php echo $existingProgramsRow['Program_Name']; ?></li>
                                                        <?php
                                                    } ?>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">

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
                                                    <input class="tgl tgl-flat" id="cb2"
                                                           name="permissionSlipCheckbox"
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
                                                    <input class="tgl tgl-flat" id="cb3"
                                                           name="birthCertificateCheckbox"
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
                                                    <input class="tgl tgl-flat" id="cb4" name="iepCheckbox"
                                                           type="checkbox"/>
                                                    <label class="tgl-btn" for="cb4"></label>
                                                </li>
                                                <div class="toggle-side-label">Yes</div>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Medical concern tab-->
                                <div class="tab-pane" id="studentMedicalConcerns">
                                    <div class="header"><i class="fa fa-warning"></i> Medical Info</div>
                                    <div>
                                        <!--Create button to add another medical condition field-->
                                        <button type="button" id="add-new-medical-concern-button"
                                                class="add-new-medical-concern-button">Add Medical Concern</button>
                                    </div>
                                    <div class="blue-line-color"></div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                <input id="medicalConcernName" class="mdl-textfield__input"
                                                       name="medicalConcernName" type="text"
                                                       onkeypress="return suppressEnter()"/>
                                                <label class="mdl-textfield__label"
                                                       for="medicalConcernName">Name</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text" class="mdl-textfield__input"
                                                       id="medicalConcernType"
                                                       readonly>
                                                <input type="hidden" name="medicalConcernType">
                                                <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                                <label for="medicalConcernType"
                                                       class="mdl-textfield__label">Type</label>
                                                <ul for="medicalConcernType"
                                                    class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
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
                                                          name="medicalConcernNote" type="text"></textarea>
                                                <label class="mdl-textfield__label"
                                                       for="medicalConcernNote">Note</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="new-medical-concern-layer" class="new-medical-concern-layer"></div>
                                </div>
                                <!--Ends the medical concern portion-->

                                <div class="tab-pane" id="studentContact">

                                    <div class="header"><i class="fa fa-address-book"></i> Contact Info</div>

                                    <div class="blue-line-color"></div>
                                    <h4 class="heading"></h4>
                                    <!--Create button to add another contact drop down-->
<!--                                    <div>
                                        <button type="button" id="add-new-contact-dropdown-button">Add Contact</button>
                                    </div>
-->

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                <input type="text"
                                                       id="studentContactDropdown"
                                                       class="mdl-textfield__input"
                                                       readonly>
                                                <input type="hidden" name="studentContactDropdown">
                                                <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                                <label for="studentContactDropdown" class="mdl-textfield__label">Select
                                                    From
                                                    Existing Contact</label>
                                                <ul for="studentContactDropdown"
                                                    class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                    <?php
                                                    while ($existingContactsRow = mysqli_fetch_assoc($existingContactsResult)) {
                                                        $contactNameToDisplay = $existingContactsRow['First_Name'] . " " . $existingContactsRow['Last_Name'];
                                                        echo "<li class='mdl-menu__item' value=" . $existingContactsRow['Id'] . ">" . $contactNameToDisplay . "</li>";
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 text-center">
                                            <div class="col-sm-12 m-auto">
                                                <button class="add-student-contact-button" type="button"
                                                        data-toggle="collapse"
                                                        data-target="#collapseContactOne" aria-expanded="false"
                                                        aria-controls="collapseContactOne">
                                                    Create New Contact
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="collapse" id="collapseContactOne">
                                            <div class="card card-body">
                                                <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
                                                <div class="blue-line-color"></div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div id="floatingFirstName"
                                                             class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                                            <input id="contactFirstName" class="mdl-textfield__input"
                                                                   name="contactFirstName"
                                                                   pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                                                   type="text" onkeypress="return suppressEnter()"/>
                                                            <label class="mdl-textfield__label" for="contactFirstName">First
                                                                Name</label>
                                                            <span class="mdl-textfield__error">Invalid First Name</span>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-6'>
                                                        <div id="floatingLastName"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactLastName' class='mdl-textfield__input'
                                                                   name='contactLastName' type='text'
                                                                   onkeypress="return suppressEnter()"
                                                                   pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                                                            <label class='mdl-textfield__label' for='contactLastName'>Last
                                                                Name</label>
                                                            <span class='mdl-textfield__error'>Invalid Last Name</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <div class='col-sm-6'>
                                                        <div id="floatingPrimaryPhone"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactPrimaryPhone'
                                                                   class='mdl-textfield__input'
                                                                   name='contactPrimaryPhone' type='text'
                                                                   onkeypress="return suppressEnter()"
                                                                   pattern="^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$"/>
                                                            <label class='mdl-textfield__label'
                                                                   for='contactPrimaryPhone'>Primary Phone</label>
                                                            <span class='mdl-textfield__error'>Invalid Primary Phone Number</span>
                                                        </div>
                                                    </div>

                                                    <div class='col-sm-6'>
                                                        <div id="floatingSecondaryPhone"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactSecondaryPhone'
                                                                   class='mdl-textfield__input'
                                                                   name='contactSecondaryPhone' type='text'
                                                                   onkeypress="return suppressEnter()"
                                                                   pattern="^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$"/>
                                                            <label class='mdl-textfield__label'
                                                                   for='contactSecondaryPhone'>Secondary Phone</label>
                                                            <span class='mdl-textfield__error'>Invalid Secondary Phone Number</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div id="floatingEmail"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactEmail' class='mdl-textfield__input'
                                                                   name='contactEmail' type='text'
                                                                   onkeypress="return suppressEnter()"
                                                                   pattern="^(?!\.)[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$"/>
                                                            <label class='mdl-textfield__label'
                                                                   for='contactEmail'>Email</label>
                                                            <span class='mdl-textfield__error'>Invalid Email</span>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div id="floatingRelationship"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactRelationToStudent'
                                                                   class='mdl-textfield__input'
                                                                   name='contactRelationToStudent' type='text'
                                                                   onkeypress="return suppressEnter()"/>
                                                            <label class='mdl-textfield__label'
                                                                   for='contactRelationToStudent'>Relationship To
                                                                Student</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4 class='heading'><i class='fa fa-home'></i> Address
                                                </h4>
                                                <div class='blue-line-color'></div>
                                                <div class='form-group'>
                                                    <div class='col-sm-6'>
                                                        <div id="floatingAddressOne"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactAddressOne' class='mdl-textfield__input'
                                                                   name='contactAddressOne' type='text'
                                                                   onkeypress="return suppressEnter()"
                                                                   pattern="^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-ZZ0-9]+)*\.?$"/>
                                                            <label class='mdl-textfield__label' for='contactAddressOne'>Address</label>
                                                            <span class='mdl-textfield__error'>Invalid Address</span>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-6'>
                                                        <div id="floatingAddressTwo"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactAddressTwo' class='mdl-textfield__input'
                                                                   name='contactAddressTwo' type='text'
                                                                   onkeypress="return suppressEnter()"
                                                                   pattern="^[a-zA-Z0-9]+(([ \-\.]|(\. ))[a-zA-Z0-9]+)*$"/>
                                                            <label class='mdl-textfield__label' for='contactAddressTwo'>Apt/Suite</label>
                                                            <span class='mdl-textfield__error'>Invalid Apt or Suite</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='form-group'>
                                                    <div class='col-sm-4'>
                                                        <div id="floatingCity"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactCity' class='mdl-textfield__input'
                                                                   name='contactCity' type='text'
                                                                   onkeypress="return suppressEnter()"
                                                                   pattern="^[A-Z](([ \-\.\,']|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                                                            <label class='mdl-textfield__label'
                                                                   for='contactCity'>City</label>
                                                            <span class='mdl-textfield__error'>Invalid City</span>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-4'>
                                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                                            <input type="text" class="mdl-textfield__input"
                                                                   id="contactState" readonly>
                                                            <input type="hidden" name="contactState">
                                                            <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                                            <label for="contactState"
                                                                   class="mdl-textfield__label">State</label>
                                                            <ul id="contactState"
                                                                class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                                                <?php echo stateDropdown(); ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-4'>
                                                        <div id="floatingZipCode"
                                                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                                                            <input id='contactZip' class='mdl-textfield__input'
                                                                   name='contactZip' type='text'
                                                                   pattern="^[0-9]{5}(-[0-9]{4})?$"
                                                                   onkeypress="return suppressEnter()"/>
                                                            <label class='mdl-textfield__label' for='contactZip'>Zip
                                                                Code</label>
                                                            <span class='mdl-textfield__error'>Invalid Zip Code</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="card-footer">
                        <div class="right-align">
                            <button id="newStudentConfirmationButton" type="button" class="btn btn-right btn-primary"
                                    data-toggle="modal" data-target="#verifyEntryModal" onclick="launchConfirmStudentEntriesModal()">
                                Verify Info
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

    $(document).on('click', '.remove-medical-concern', function (event) {
        event.preventDefault();
        var button_id = this.id;
        $('#dynamic-medical-concern' + button_id).remove();
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

<!--<script src="../../js/new-student-scripts/NewStudentMed.js"></script>-->
<?php include("../scripts/footer.php"); ?>
