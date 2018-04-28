<?php
include("../scripts/header.php");
include("../scripts/States.php");
//connect to database
include("../../db/config.php");
?>
<script src="../../js/suppressEnter.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal" action="../add/AddVolunteerEmployee.php" method="POST"
                          id="NewVolunteerEmployee">
                        <div class="form-content">
                            <div class="header">Volunteer / Employee Info</div>
                            <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
                            <div class="blue-line-color"></div>
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
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
                                               name="volunteerFirstName"
                                               type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                               onkeypress="return suppressEnter()"/>
                                        <label class="mdl-textfield__label" for="volunteerFirstName">First
                                            Name</label>
                                        <span class="mdl-textfield__error">Invalid First Name Entered</span>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="volunteerLastName" class="mdl-textfield__input"
                                               name="volunteerLastName"
                                               type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"
                                               onkeypress="return suppressEnter()"/>
                                        <label class="mdl-textfield__label" for="volunteerLastName">Last
                                            Name</label>
                                        <span class="mdl-textfield__error">Invalid Last Name Entered</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
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
                                <div class="col-sm-12">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                        <input id="volunteerEmail" class="mdl-textfield__input" name="volunteerEmail"
                                               type="text" pattern="^(?!\.).+@.+\..{2,5}$"
                                               onkeypress="return suppressEnter()"/>
                                        <label class="mdl-textfield__label" for="volunteerEmail">Email</label>
                                        <span class="mdl-textfield__error">Invalid Email Entered</span>
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
                            <div class="form-group">
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
                            <table id="volunteerAvailabilityTable"
                                   class="table table-condensed table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th class="col-sm-2.4 text-center text-muted small">Monday</th>
                                    <th class="col-sm-2.4 text-center text-muted small">Tuesday</th>
                                    <th class="col-sm-2.4 text-center text-muted small">Wednesday</th>
                                    <th class="col-sm-2.4 text-center text-muted small">Thursday</th>
                                    <th class="col-sm-2.4 text-center text-muted small">Friday</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                                        <label class="radio-label" for="mondayCheckBox">
                                            <input type="checkbox" name="mondayCheckBox" value="1"
                                                   id="mondayCheckBox"/>
                                            <span class="custom-check-mark blue-check"></span>
                                        </label>
                                    </td>
                                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                                        <label class="radio-label" for="tuesdayCheckBox">
                                            <input type="checkbox" name="tuesdayCheckBox" value="1"
                                                   id="tuesdayCheckBox"/>
                                            <span class="custom-check-mark blue-check"></span>
                                        </label>
                                    </td>
                                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                                        <label class="radio-label" for="wednesdayCheckBox">
                                            <input type="checkbox" name="wednesdayCheckBox" value="1"
                                                   id="wednesdayCheckBox"/>
                                            <span class="custom-check-mark blue-check"></span>
                                        </label>
                                    </td>
                                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                                        <label class="radio-label" for="thursdayCheckBox">
                                            <input type="checkbox" name="thursdayCheckBox" value="1"
                                                   id="thursdayCheckBox"/>
                                            <span class="custom-check-mark blue-check"></span>
                                        </label>
                                    </td>
                                    <td class="radio-input-wrapper col-sm-1 align-middle text-center">
                                        <label class="radio-label" for="fridayCheckBox">
                                            <input type="checkbox" name="fridayCheckBox" value="1"
                                                   id="fridayCheckBox"/>
                                            <span class="custom-check-mark blue-check"></span>
                                        </label>
                                    </td>
                                </tbody>
                            </table>

                            <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit"
                                   value="Submit"/><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("../scripts/footer.php"); ?>
