<?php
include("../scripts/header.php");

//connect to database
include("../../db/config.php");
?>
<script src="../../js/supressEnter.js"></script>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <form class="form-horizontal" action="../add/AddVolunteerEmployee.php" method="POST" id="NewVolunteerEmployee">
                <div class="form-content">
                    <div class="header">Volunteer/Employee Information</div>
                    <h4 class="heading"><i class="fa fa-user"></i>Personal Info</h4>
                    <div class="blue-line-color"><div>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerFirstName" class="mdl-textfield__input" name="volunteerFirstName"
                                 type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$" onkeypress="return supressEnter()"/>
                                <label class="mdl-textfield__label" for="volunteerFirstName">First Name</label>
                                <span class="mdl-textfield__error">Invalid First Name Entered</span>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerLastName" class="mdl-textfield__input" name="volunteerLastName"
                                 type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$" onkeypress="return supressEnter()"/>
                                <label class="mdl-textfield__label" for="volunteerLastName">Last Name</label>
                                <span class="mdl-textfield__error">Invalid Last Name Entered</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-5">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerMiddleName" class="mdl-textfield__input" name="volunteerMiddleName"
                             type="text" pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$" onkeypress="return supressEnter()"/>
                            <label class="mdl-textfield__label" for="volunteerMiddleName">Middle Name</label>
                            <span class="mdl-textfield__error">Invalid Middle Name Entered</span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <label class="control-label" for="volunteerPrefix">Prefix</label>
                            <select id="volunteerPrefix" class="form-control" name="volunteerPrefix">
                                <option value="Mr.">Mr.</option>
                                <option value="Ms ">Ms.</option>
                                <option value="Mrs.">Mrs.</option>
                                <option value="Dr.">Dr.</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input id="volunteerSuffix" class="mdl-textfield__input" name="volunteerSuffix"
                             type="text" pattern="^[A-Z](([ \.]|(\, )|(\. ))?[a-zA-Z]+)*\.?$" onkeypress="return supressEnter()"/>
                            <label class="mdl-textfield__label" for="volunteerSuffix">Suffix</label>
                            <span class="mdl-textfield__error">Invalid Suffix Entered</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerPrimaryPhone" class="form-control" type="text" name="volunteerPrimaryPhone"
                                 pattern="^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$" onkeypress="return supressEnter()"/>
                                <label class="mdl-textfield__label" for="volunteerPrimaryPhone">Primary Phone</label>
                                <span class="mdl-textfield__error">Invalid Phone Number Entered</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerSecondaryPhone" class="form-control" type="text" name="volunteerSecondaryPhone"
                                        pattern="^[2-9][0-9]{2}-[2-9][0-9]{2}-[0-9]{4}$" onkeypress="return supressEnter()"/>
                                <label class="mdl-textfield__label" for="volunteerSecondaryPhone">Secondary Phone</label>
                                <span class="mdl-textfield__error">Invalid Phone Number Entered</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerAddressOne" class="form-control" type="text" name="volunteerAddressOne"
                                       pattern="^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-Z]+)*\.?$" onkeypress="return supressEnter()"/>
                                <label class="mdl-textfield__label" for="volunteerAddressOne">Address</label>
                                <span class="mdl-textfield__error">Invalid Address Entered</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerAddressTwo" class="form-control" type="text" name="volunteerAddressTwo"
                                 pattern="^[a-zA-Z0-9]+(([ \-\.]|(\. ))[a-zA-Z0-9]+)*$" onkeypress="return supressEnter()"/>
                                <label class="mdl-textfield__label" for="volunteerAddressTwo">Apt/Suite</label>
                                <span class="mdl-textfield__error">Invalid Apt/Suite Entered</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerCity" class="form-control" type="text" name="volunteerCity"
                                       pattern="^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*\.?$" onkeypress="return supressEnter()"/>
                                <label class="mdl-textfield__label" for="city">City</label>
                                <span class="mdl-textfield__error">Invalid City Entered</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                                <input type="text" value="" class="mdl-textfield__input" id="volunteerState" readonly>
                                <input type="hidden" value="" name="volunteerState">
                                <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                                <label for="volunteerState" class="mdl-textfield__label">State</label>
                                <ul id="volunteerState" class="overflow mdl-menu mdl-menu--bottol-left mdl-js-menu">
                                    <?php
                                        include("../scripts/States.php");
                                        echo stateDropdown("volunteerState")
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input id="volunteerZip" class="form-control" type="text" name="volunteerZip"
                                       pattern="^[0-9]{5}(-[0-9]{4})?$" onkeypress="return supressEnter()"/>
                                <label class="mdl-textfield__label" for="volunteerZip">Zip</label>
                                <span class="mdl-textfield__error">Invalid Zip Code Entered</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <input id="volunteerEmail" class="form-control" type="text" name="volunteerEmail"
                                   pattern="" onkeypress="return supressEnter()"/>
                            <label class="mdl-textfield__label" for="email">Email</label>
                            <span class="mdl-textfield__error">Invalid Email Entered</span>
                        </div>
                        <div class="col-sm-4">
                            <label class="mdl-textfield__label" for="volunteerType">Type</label>
                                <select id="volunteerType" class="form-control" name="volunteerType">
                                    <option value="Volunteer">Volunteer</option>
                                    <option value="Employee">Employee</option>
                                </select>
                        </div>
                        <div class="col-sm-4">
                            <label class="mdl-textfield__label" for="volunteerProgram">Program</label>
                                <select id="volunteerProgram" class="form-control" name="volunteerProgram">
                                    <option value="G.E.M.S">G.E.M.S</option>
                                    <option value="Sons of Thunder">Sons of Thunder</option>
                                    <option value="Both">Both</option>
                                </select>
                        </div>
                        <div class="col-sm-4">
                            <label class="mdl-textfield__label" for="volunteerActiveFlag">Active Employee?</label>
                                <select id="volunteerActiveFlag" class="form-control" name="volunteerActiveFlag">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                        </div>
                    </div>
                </div>
                <input id="submit" class="btn btn-primary btn-lg btn-block" type="submit" value="Submit" /><br><br>
            </form>
        </div>
    </div>
</div>
<?php include("../scripts/footer.php"); ?>
