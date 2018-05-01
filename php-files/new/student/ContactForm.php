<div class="tab-pane" role="tabpanel" id="studentContact">
    <form name="newStudentContactForm" id="newStudentContactForm">
        <div class="header"><i class="fa fa-address-book"></i> Contact Info</div>
        <div class="blue-line-color"></div>
        <h4 class="heading"></h4>
        <div class="row">
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
        <div class="collapse" id="collapseContactOne">
            <div class="card card-body">
                <h4 class="heading"><i class="fa fa-user"></i> Personal Info</h4>
                <div class="blue-line-color"></div>
                <div class="row">
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
                <div class='row'>
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
                <div class="row">
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
                <div class='row'>
                    <div class='col-sm-6'>
                        <div id="floatingAddressOne"
                             class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                            <input id='contactAddressOne' class='mdl-textfield__input'
                                   name='contactAddressOne' type='text'
                                   onkeypress="return suppressEnter()"
                                   pattern="^[A-Z0-9]+(([ \-\.']|(\. ))?[a-zA-ZZ0-9]+)*\.?$"/>
                            <label class='mdl-textfield__label'
                                   for='contactAddressOne'>Address</label>
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
                <div class='row'>
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
    </form>
</div>