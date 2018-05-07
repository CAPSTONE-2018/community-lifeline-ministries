<?php
include("../app-shell/Header.php");
include("../app-shell/Sidebar.php");
include("../app-shell/EmptyModalShell.php");
include("../scripts/States.php");
include("../../db/config.php");
?>
<div id="showVolunteerEmployeeModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row col-12">
                    <h5 class="modal-title" id="wizard-title">Verify Volunteer Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div id="studentModalBody" class="modal-body">

                <div id="studentVerifyContent">
                    <div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#employeeInfoPanel" role="tab">
                                    Employee Info</a>
                            <li>
                        </ul>
                        <div class="tab-content mt-2">
                            <div class="tab-pane fade show active" id="employeeInfoPanel" role="tabpanel">
                                <div id="placeHolderForVerifyNewEmployeeInfo" class="form-group"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block btn-group-lg" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-block btn-group-lg" onclick="sendNewVolunteerEmployeeForm()">Submit New Volunteer</button>
            </div>
        </div>
    </div>
</div>

<div class="app-title">
    <div>
        <h3><i class="fa fa-plus"></i> Add New Employee</h3>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><a href="../index-login/Main-Menu.php"><i class="fa fa-home fa-lg"></i></a></li>
        <li class="breadcrumb-item"> New Employee</li>
    </ul>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-body">

            <div class="header"><i class="fa fa-star-o"></i> Volunteer / Employee Info</div>
            <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
            <div class="blue-line-color"></div>
            <form id="newVolunteerEmployeeForm" name="newVolunteerEmployeeForm">
                <div class="row">
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

                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactFirstName" class="mdl-textfield__input"
                                   name="contactFirstName" type="text"
                                   pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$" onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label" for="contactFirstName">First Name</label>
                            <span class="mdl-textfield__error">Invalid First Name Enterd</span>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactLastName" class="mdl-textfield__input" name="contactLastName"
                                   type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label" for="contactLastName">Last Name</label>
                            <span class="mdl-textfield__error">Invalid Last Name Entered</span>
                        </div>
                    </div>

                    <div class="col-sm-2">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="contactSuffix" class="mdl-textfield__input" name="contactSuffix"
                                   type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label" for="contactSuffix">Suffix</label>
                            <span class="mdl-textfield__error">Invalid Suffix Entered</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerPrimaryPhone" class="mdl-textfield__input"
                                   name="volunteerPrimaryPhone" type="text"
                                   pattern="^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label" for="volunteerPrimaryPhone">Primary
                                Phone</label>
                            <span class="mdl-textfield__error">Invalid Phone Number Entered</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerSecondaryPhone" class="mdl-textfield__input"
                                   name="volunteerSecondaryPhone"
                                   type="text" pattern="^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label" for="volunteerSecondaryPhone">Secondary
                                Phone</label>
                            <span class="mdl-textfield__error">Invalid Phone Number Entered</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerEmail" class="mdl-textfield__input" name="volunteerEmail"
                                   type="text" pattern="^(?!\.).+@.+\..{2,5}$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label" for="volunteerEmail">Email</label>
                            <span class="mdl-textfield__error">Invalid Email Entered</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" id="volunteerType" readonly>
                            <input type="hidden" name="volunteerType">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="volunteerType" class="mdl-textfield__label">Type</label>
                            <ul for="volunteerType" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" data-val="Volunteer">Volunteer</li>
                                <li class="mdl-menu__item" data-val="Employee">Employee</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" class="mdl-textfield__input" id="volunteerProgram" readonly>
                            <input type="hidden" name="volunteerProgram">
                            <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                            <label for="volunteerProgram" class="mdl-textfield__label">Program</label>
                            <ul for="volunteerProgram" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <li class="mdl-menu__item" data-val="3">Blessing Table</li>
                                <li class="mdl-menu__item" data-val="2">G.E.M.S</li>
                                <li class="mdl-menu__item" data-val="1">Sons of Thunder</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <h4 class="heading"><i class="fa fa-home"></i> Address</h4>
                <div class="blue-line-color"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerAddressOne" class="mdl-textfield__input"
                                   name="volunteerAddressOne" type="text"
                                   pattern="^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z0-9]+)*\.?$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label"
                                   for="volunteerAddressOne">Address</label>
                            <span class="mdl-textfield__error">Invalid Address Entered</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerAddressTwo" class="mdl-textfield__input"
                                   name="volunteerAddressTwo" type="text"
                                   pattern="^[a-zA-Z0-9]+(([\- \.]|[(\. ))[a-zA-Z0-9]+)*$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label"
                                   for="volunteerAddressTwo">Apt/Suite</label>
                            <span class="mdl-textfield__error">Invalid Apt/Suite Entered</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerCity" class="mdl-textfield__input" name="volunteerCity"
                                   type="text" pattern="^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label" for="volunteerCity">City</label>
                            <span class="mdl-textfield__error">Invalid City Entered</span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                            <input type="text" value="" class="mdl-textfield__input" id="volunteerState"
                                   readonly/>
                            <input type="hidden" value="" name="volunteerState"/>
                            <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                            <label for="volunteerState" class="mdl-textfield__label">State</label>
                            <ul id="volunteerState"
                                class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                                <?php echo stateDropdown(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerZip" class="mdl-textfield__input" name="volunteerZip"
                                   type="text" pattern="^[0-9]{5}(-[0-9]{4})?$"
                                   onkeypress="return suppressEnter()"/>
                            <label class="mdl-textfield__label" for="volunteerZip">Zip Code</label>
                            <span class="mdl-textfield__error">Invalid Zip Code Entered</span>
                        </div>
                    </div>
                </div>

                <h4 class="heading"><i class="fa fa-calendar"></i> Availability</h4>
                <div class="blue-line-color"></div>
                <table id="employeeAvailabilityTable" class="table table-hover table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th class="text-center text-muted small">Monday</th>
                        <th class="text-center text-muted small">Tuesday</th>
                        <th class="text-center text-muted small">Wednesday</th>
                        <th class="text-center text-muted small">Thursday</th>
                        <th class="text-center text-muted small">Friday</th>
                        <th class="text-center text-muted small">Saturday</th>
                        <th class="text-center text-muted small">Sunday</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td class="radio-input-wrapper align-middle text-center">
                            <label class="radio-label" for="mondayCheckBox">
                                <input type="checkbox" name="mondayCheckBox" value="1"
                                       id="mondayCheckBox"/>
                                <span class="custom-check-mark-new-volunteer-page blue-check"></span>
                            </label>
                        </td>
                        <td class="radio-input-wrapper align-middle text-center">
                            <label class="radio-label" for="tuesdayCheckBox">
                                <input type="checkbox" name="tuesdayCheckBox" value="1"
                                       id="tuesdayCheckBox"/>
                                <span class="custom-check-mark-new-volunteer-page blue-check"></span>
                            </label>
                        </td>
                        <td class="radio-input-wrapper align-middle text-center">
                            <label class="radio-label" for="wednesdayCheckBox">
                                <input type="checkbox" name="wednesdayCheckBox" value="1"
                                       id="wednesdayCheckBox"/>
                                <span class="custom-check-mark-new-volunteer-page blue-check"></span>
                            </label>
                        </td>
                        <td class="radio-input-wrapper align-middle text-center">
                            <label class="radio-label" for="thursdayCheckBox">
                                <input type="checkbox" name="thursdayCheckBox" value="1"
                                       id="thursdayCheckBox"/>
                                <span class="custom-check-mark-new-volunteer-page blue-check"></span>
                            </label>
                        </td>
                        <td class="radio-input-wrapper align-middle text-center">
                            <label class="radio-label" for="fridayCheckBox">
                                <input type="checkbox" name="fridayCheckBox" value="1"
                                       id="fridayCheckBox"/>
                                <span class="custom-check-mark-new-volunteer-page blue-check"></span>
                            </label>
                        </td>
                        <td class="radio-input-wrapper align-middle text-center">
                            <label class="radio-label" for="saturdayCheckBox">
                                <input type="checkbox" name="saturdayCheckBox" value="1"
                                       id="saturdayCheckBox"/>
                                <span class="custom-check-mark-new-volunteer-page blue-check"></span>
                            </label>
                        </td>
                        <td class="radio-input-wrapper align-middle text-center">
                            <label class="radio-label" for="sundayCheckBox">
                                <input type="checkbox" name="sundayCheckBox" value="1"
                                       id="sundayCheckBox"/>
                                <span class="custom-check-mark-new-volunteer-page blue-check"></span>
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <input id="submit" class="btn btn-primary btn-lg btn-block" type="button"
                       onclick="launchVerifyNewEmployeeInfoWizard()"
                       value="Submit"/><br><br>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $('#employeeAvailabilityTable').DataTable({
            paging: false,
            searching: false
        });
    } );
</script>


<script type="text/javascript">
    function sendNewVolunteerEmployeeForm() {

        var employeeForm = $('#newVolunteerEmployeeForm').serialize();
        $('#showVolunteerEmployeeModal').modal('hide');
        $.ajax({
            url: "/community-lifeline-ministries/php-files/mysql-statements/add/AddVolunteerEmployee.php",
            method: "POST",
            data: employeeForm,
            success: function (response) {
                if (response === 'fill-required-inputs') {
                    launchGenericRequiredInputsModal();
                }
                var parsedOutput = JSON.parse(response);
                var newVolunteerConfirmation = parsedOutput['volunteer-confirmation'];

                var modalMessage = "The Volunteer Was Added Successfully";
                var afterModalDisplaysRoute = "/community-lifeline-ministries/php-files/new/NewVolunteerEmployee.php";

                if (newVolunteerConfirmation === true) {
                    launchGenericSuccessfulEntryModal(modalMessage, afterModalDisplaysRoute)
                } else if (newVolunteerConfirmation === false) {
                    launchGenericDatabaseErrorModal();
                }
            }
        });
    }
</script>


<script type="text/javascript">
    function launchVerifyNewEmployeeInfoWizard() {
        if(ErrorPromptCheck() == true){
            return;
        }
        var serializedEmployeeForm = $('#newVolunteerEmployeeForm').serialize();
        launchConfirmVolunteerEntriesModal(serializedEmployeeForm);
        $('#modal').modal({
            backdrop: 'static'
        });
    }
</script>
<?php include("../app-shell/Footer.php"); ?>
