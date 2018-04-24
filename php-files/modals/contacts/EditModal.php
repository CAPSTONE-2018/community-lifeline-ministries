<?php
include("../../../db/config.php");
$contactId = $_POST['contactId'];

$queryForContact = "SELECT * FROM Contacts WHERE Id = '$contactId';";
$contactInfoResults = mysqli_query($db, $queryForContact);
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

    $response = '
<div class="container-fluid">'; ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-content">
                        <div class="header">Guardian Info</div>
                        <h4 class="heading"><i class="fa fa-graduation-cap"></i> Student Contact</h4>
                        <div class="blue-line-color"></div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input type="text" class="mdl-textfield__input" id="student" readonly>
                                    <input type="hidden" name="student">
                                    <i class="mdl-icon-toggle__label fa fa-sort-down"></i>
                                    <label for="student" class="mdl-textfield__label">Student</label>
                                    <ul for="student" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <?php
                                        while ($studentsRow = mysqli_fetch_assoc($studentsResult)) {
                                            $studentId = $studentsRow['Id'];
                                            $studentNameInDropDown = $studentsRow['First_Name'] . ' ' . $studentsRow['Last_Name'];
                                            echo "<li class='mdl-menu__item' data-val='" . $studentsRow['Id'] . "' value=" . $studentsRow['Id'] . ">" . $studentNameInDropDown . "</li>";
                                        }

                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="relationToStudent" class="mdl-textfield__input"
                                           name="relationToStudent" type="text"/>
                                    <label class="mdl-textfield__label"
                                           for="relationToStudent">Relation to Student</label>
                                </div>
                            </div>
                        </div>

                        <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
                        <div class="blue-line-color"></div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input type="text" class="mdl-textfield__input" id="contactPrefix" readonly>
                                    <input type="hidden" name="contactPrefix">
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
                                           name="contactFirstName" type="text" readonly />
                                    <label class="mdl-textfield__label" for="contactFirstName"><?php echo $firstName; ?></label>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactLastName" class="mdl-textfield__input" name="contactLastName"
                                           type="text" readonly/>
                                    <label class="mdl-textfield__label" for="contactLastName"><?php echo $lastName; ?></label>
                                    <span class="mdl-textfield__error">Invalid Last Name Entered</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="primaryPhone" class="mdl-textfield__input"
                                           name="primaryPhone" type="text" readonly/>
                                    <label class="mdl-textfield__label" for="primaryPhone"><?php echo $primaryPhone; ?></label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="secondaryPhone" class="mdl-textfield__input" name="secondaryPhone"
                                           type="text" readonly/>
                                    <label class="mdl-textfield__label" for="secondaryPhone"><?php echo $secondaryPhone; ?></label>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactEmail" class="mdl-textfield__input" name="contactEmail"
                                           type="text" readonly/>
                                    <label class="mdl-textfield__label" for="contactEmail"><?php echo $email; ?></label>
                                </div>
                            </div>
                        </div>

                        <h4 class="heading"><i class="fa fa-home"></i>Address</h4>
                        <div class="blue-line-color"></div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactAddressOne" class="mdl-textfield__input"
                                           name="contactAddressOne" type="text" readonly/>
                                    <label class="mdl-textfield__label" for="contactAddressOne"><?php echo $addressOne; ?></label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactAddressTwo" class="mdl-textfield__input"
                                           name="contactAddressTwo" type="text" readonly/>
                                    <label class="mdl-textfield__label" for="contactAddressTwo"><?php echo $addressTwo; ?></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactCity" class="mdl-textfield__input" name="contactCity"
                                           type="text" readonly/>
                                    <label class="mdl-textfield__label" for="contactCity"><?php echo $city; ?></label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                    <input type="text" value="" class="mdl-textfield__input"
                                           id="contactState" readonly>
                                    <input type="hidden" value="" name="contactState">
                                    <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                    <label for="contactState" class="mdl-textfield__label">State</label>
                                    <ul id="contactState" class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                        <?php echo stateDropdown(); ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                    <input id="contactZip" class="mdl-textfield__input" name="contactZip"
                                           type="text" readonly/>
                                    <label class="mdl-textfield__label" for="contactZip"><?php echo $zip; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>

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

    <script type="text/javascript">
        var footer = "<div class='form-group'>" +
            "<button type='button' onclick='routeToHomePage()' class='btn btn-secondary' data-dismiss='modal'>Home Page</button>" +
            "<button type='button' onclick='routeToEditProgram(<?php echo $programId; ?>)'>Edit Program</button>" +
            "</div>";

        $('.modal-footer').html(footer);

        function routeToEditProgram(programId) {
            window.location = '../../php-files/edit/EditProgram.php?programId=' + programId;
        }
    </script>
    </div>

<?php } ?>