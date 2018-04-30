<?php
$prefix = $_POST['volunteerPrefix'];
$firstName = $_POST['volunteerFirstName'];
$lastName = $_POST['volunteerLastName'];
$primaryPhone = $_POST['volunteerPrimaryPhone'];
$secondaryPhone = $_POST['volunteerSecondaryPhone'];
$volunteerEmail = $_POST['volunteerEmail'];
$volunteerType = $_POST['volunteerType'];
$program = $_POST['volunteerProgram'];
$addressOne = $_POST['volunteerAddressOne'];
$addressTwo = $_POST['volunteerAddressTwo'];
$city = $_POST['volunteerCity'];
$state = $_POST['volunteerState'];
$zipCode = $_POST['volunteerZip'];
$monday = $_POST['mondayCheckBox'];
$tuesday = $_POST['tuesdayCheckBox'];
$wednesday = $_POST['wednesdayCheckBox'];
$thursday = $_POST['thursdayCheckBox'];
$friday = $_POST['fridayCheckBox'];
$saturday = $_POST['saturdayCheckBox'];
$sunday = $_POST['sundayCheckBox'];


if ($monday == 1) {
    $mondayChecked = 'checked';
} else {
    $mondayChecked = '';
}

if ($tuesday == 1) {
    $tuesdayChecked = 'checked';
} else {
    $tuesdayChecked = '';
}

if ($wednesday == 1) {
    $wednesdayChecked = 'checked';
} else {
    $wednesdayChecked = '';
}

if ($thursday == 1) {
    $thursdayChecked = 'checked';
} else {
    $thursdayChecked = '';
}

if ($friday == 1) {
    $fridayChecked = 'checked';
} else {
    $fridayChecked = '';
}

if ($saturday == 1) {
    $saturdayChecked = 'checked';
} else {
    $saturdayChecked = '';
}

if ($sunday == 1) {
    $sundayChecked = 'checked';
} else {
    $sundayChecked = '';
}

?>
<div class="card">
    <div class="card-body">
        <form class="form-horizontal" id="confirmNewVolunteerEmployee" name="confirmNewVolunteerEmployee">
            <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
            <div class="blue-line-color"></div>
            <div class="form-group">
                <div class="col-sm-2">
                    <div class="upgradeOnDynamic mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                        <input type="text" class="mdl-textfield__input" id="volunteerPrefix" readonly>
                        <input type="hidden" name="volunteerPrefix">
                        <i class="mdl-icon-toggle__label fa fa-angle-down"></i>
                        <label for="volunteerPrefix" class="mdl-textfield__label">Prefix</label>
                        <ul for="volunteerPrefix" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                            <li class="mdl-menu__item" data-val="Mr.">Mr.</li>
                            <li class="mdl-menu__item" data-val="Ms.">Ms.</li>
                            <li class="mdl-menu__item" data-val="Mrs.">Mrs.</li>
                            <li class="mdl-menu__item" data-val="Dr.">Dr.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerFirstName" class="mdl-textfield__input"
                               type="text" value="<?php echo $firstName; ?>" readonly/>
                        <label class="mdl-textfield__label" for="volunteerFirstName">First Name</label>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerLastName" class="mdl-textfield__input"
                               type="text" value="<?php echo $lastName; ?>" readonly/>
                        <label class="mdl-textfield__label" for="volunteerLastName">Last Name</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerPrimaryPhone" class="mdl-textfield__input"
                               type="text" value="<?php echo $primaryPhone; ?>" readonly/>
                        <label class="mdl-textfield__label" for="volunteerPrimaryPhone">Primary Phone</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerSecondaryPhone" class="mdl-textfield__input"
                               type="text" value="<?php echo $secondaryPhone; ?>" readonly/>
                        <label class="mdl-textfield__label" for="volunteerSecondaryPhone">Secondary Phone</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerEmail" class="mdl-textfield__input"
                               type="text" value="<?php echo $email; ?>" readonly/>
                        <label class="mdl-textfield__label" for="volunteerEmail">Email</label>
                    </div>
                </div>


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
                            <li class="mdl-menu__item" data-val="G.E.M.S">G.E.M.S</li>
                            <li class="mdl-menu__item" data-val="Sons of Thunder">Sons of Thunder</li>
                            <li class="mdl-menu__item" data-val="Blessing Table">Blessing Table</li>
                        </ul>
                    </div>
                </div>

            </div>
            <h4 class="heading"><i class="fa fa-home"></i> Address</h4>
            <div class="blue-line-color"></div>
            <div class="form-group">
                <div class="col-sm-6">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerAddressOne" class="mdl-textfield__input"
                               type="text" value="<?php echo $addressOne; ?>" readonly/>
                        <label class="mdl-textfield__label"
                               for="volunteerAddressOne">Address</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerAddressTwo" class="mdl-textfield__input"
                               type="text" value="<?php echo $addressTwo; ?>" readonly/>
                        <label class="mdl-textfield__label"
                               for="volunteerAddressTwo">Apt/Suite</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerCity" class="mdl-textfield__input"
                               type="text" value="<?php echo $city; ?>" readonly/>
                        <label class="mdl-textfield__label" for="volunteerCity">City</label>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                        <input type="text" value="" class="mdl-textfield__input" id="volunteerState"
                               readonly/>
                        <input type="hidden" value="<?php echo $state; ?>" name="volunteerState"/>
                        <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                        <label for="volunteerState" class="mdl-textfield__label">State</label>
                        <ul id="volunteerState"
                            class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input id="volunteerZip" class="mdl-textfield__input"
                               type="text" value="<?php echo $zipCode; ?>" readonly/>
                        <label class="mdl-textfield__label" for="volunteerZip">Zip Code</label>
                    </div>
                </div>
            </div>

            <h4 class="heading"><i class="fa fa-calendar"></i> Availability</h4>
            <div class="blue-line-color"></div>
            <table id="volunteerAvailabilityTable"
                   class="table table-condensed table-hover table-responsive">
                <thead>
                <tr>
                    <th class="col-sm-1 text-center text-muted small">Monday</th>
                    <th class="col-sm-1 text-center text-muted small">Tuesday</th>
                    <th class="col-sm-1 text-center text-muted small">Wednesday</th>
                    <th class="col-sm-1 text-center text-muted small">Thursday</th>
                    <th class="col-sm-1 text-center text-muted small">Friday</th>
                    <th class="col-sm-1 text-center text-muted small">Saturday</th>
                    <th class="col-sm-1 text-center text-muted small">Sunday</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                        <label class="radio-label" for="mondayCheckBox">
                            <input type="checkbox" <?php echo $mondayChecked; ?> />
                            <span class="custom-check-mark blue-check"></span>
                        </label>
                    </td>
                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                        <label class="radio-label" for="tuesdayCheckBox">
                            <input type="checkbox" <?php echo $tuesdayChecked; ?>/>
                            <span class="custom-check-mark blue-check"></span>
                        </label>
                    </td>
                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                        <label class="radio-label" for="wednesdayCheckBox">
                            <input type="checkbox" <?php echo $wednesdayChecked; ?>/>
                            <span class="custom-check-mark blue-check"></span>
                        </label>
                    </td>
                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                        <label class="radio-label" for="thursdayCheckBox">
                            <input type="checkbox" <?php echo $thursdayChecked; ?>/>
                            <span class="custom-check-mark blue-check"></span>
                        </label>
                    </td>
                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                        <label class="radio-label" for="fridayCheckBox">
                            <input type="checkbox" <?php echo $fridayChecked; ?> />
                            <span class="custom-check-mark blue-check"></span>
                        </label>
                    </td>
                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                        <label class="radio-label" for="saturdayCheckBox">
                            <input type="checkbox" name="saturdayCheckBox" <?php echo $saturdayChecked; ?>/>
                            <span class="custom-check-mark blue-check"></span>
                        </label>
                    </td>
                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                        <label class="radio-label" for="sundayCheckBox">
                            <input type="checkbox" name="sundayCheckBox" <?php echo $sundayChecked; ?>/>
                            <span class="custom-check-mark blue-check"></span>
                        </label>
                    </td>
                </tbody>
            </table>
        </form>
    </div>
    <div id="card-footer" class="card-footer">

    </div>
</div>

<script type="text/javascript">

    var submitButton = document.createElement("BUTTON");
    var buttonTitle = document.createTextNode("Submit");
    submitButton.classList.add("btn btn-primary btn-lg btn-block");
    submitButton.appendChild(buttonTitle);
    submitButton.setAttribute("onClick", "sendEmployeeForm()");
    var cardFooter = document.getElementById("#card-footer");
    cardFooter.appendChild(submitButton);

    function sendEmployeeForm() {
        var serializedForm = $('#confirmNewVolunteerEmployee');
        alert(serializedForm);
        $.ajax({
            url: '../../add/AddVolunteerEmployee.php',
            type: 'POST',
            data: serializedForm
            success: function () {
                alert("hello");
            }
        })
    }

</script>