<div class="tab-pane active" role="tabpanel" id="studentInfo">
    <form id="newStudentForm" name="newStudentForm">
        <div class="header"><i class="fa fa-graduation-cap"></i> Student Info</div>
        <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
        <div class="blue-line-color"></div>
        <div class="row">
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
        <div class="row">
            <div class="col-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="middleName" class="mdl-textfield__input"
                           name="studentMiddleName" type="text"
                           pattern="^[A-Z]([ \-']?[a-zA-Z]+)*$"/>
                    <label class="mdl-textfield__label" for="middleName">Middle Name</label>
                    <span class="mdl-textfield__error">Invalid Middle Name Data Entered</span>
                </div>
            </div>

            <div class="col-6">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="suffix" class="mdl-textfield__input" name="studentSuffix"
                           type="text" onkeypress="return suppressEnter()"
                           pattern="^[A-Z](([ \.]|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                    <label class="mdl-textfield__label" for="suffix">Suffix</label>
                    <span class="mdl-textfield__error">Invalid Suffix Data Entered</span>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-sm-4">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="dob" class="mdl-textfield__input" name="dob" type="text"
                           onkeypress="return suppressEnter()"
                           pattern="^((0[1-9])|(1[0-2]))\/((0[1-9])|([1-2][0-9])|(3[0-1]))\/[1-9][0-9]{3}$"/>
                    <label class="mdl-textfield__label" for="dob">D.O.B.</label>
                    <span class="mdl-textfield__error">Invalid D.O.B. Data Entered</span>
                </div>
            </div>

            <div class="col-6 col-sm-4">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="ethnicity" class="mdl-textfield__input" name="ethnicity"
                           type="text" onkeypress="return suppressEnter()"
                           pattern="^[A-Z](([ \-|(\, )])?[a-zA-Z]+)*$"/>
                    <label class="mdl-textfield__label" for="ethnicity">Ethnicity</label>
                    <span class="mdl-textfield__error">Invalid Ethnicity Data Entered</span>
                </div>
            </div>

            <div class="col-6 col-sm-4">
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
        <div class="row">
            <div class="col-8 col-sm-6">
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
            <div class="col-4 col-sm-6">
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
        <div class="row">
            <div class="col-12 col-sm-4">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input id="studentCity" class="mdl-textfield__input" name="studentCity"
                           type="text" onkeypress="return suppressEnter()"
                           pattern="^[A-Z](([ \-\,\.']|(\. )|(\, ))?[a-zA-Z]+)*\.?$"/>
                    <label class="mdl-textfield__label" for="studentCity">City</label>
                    <span class="mdl-textfield__error">Invalid City Data Entered</span>
                </div>
            </div>
            <div class="col-6 col-sm-4">
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
            <div class="col-6 col-sm-4">

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
        <div class="row">
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
        <div class="row">
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
    </form>
</div>