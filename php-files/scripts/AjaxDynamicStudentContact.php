<div>
    <div class="form-group">
        <div class="col-sm-6">
            <div id="floatingFirstName" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input id="contactFirstName" class="mdl-textfield__input" onfocus="addFirstNameFocus()" onblur="removeFirstNameFocus()" name="contactFirstName"
                       type="text"/>
                <label class="mdl-textfield__label" for="contactFirstName">First Name</label>
            </div>
        </div>

        <div class='col-sm-6'>
            <div id="floatingLastName"  class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactLastName' class='mdl-textfield__input' onfocus="addLastNameFocus()" onblur="removeLastNameFocus()" name='contactLastName' type='text'/>
                <label class='mdl-textfield__label' for='contactLastName'>Last Name</label>
                <span class='mdl-textfield__error'>Last Name is Required</span>
            </div>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-sm-6'>
            <div id="floatingPrimaryPhone" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactPrimaryPhone' class='mdl-textfield__input' onfocus='addPrimaryPhoneFocus()' onblur="removePrimaryPhoneFocus()" name='contactPrimaryPhone' type='text'/>
                <label class='mdl-textfield__label' for='contactPrimaryPhone'>Primary Phone</label>
            </div>
        </div>

        <div class='col-sm-6'>
            <div id="floatingSecondaryPhone" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactSecondaryPhone' class='mdl-textfield__input' onfocus="addSecondaryPhoneFocus()" onblur="removeSecondaryPhoneFocus()" name='contactSecondaryPhone' type='text'/>
                <label class='mdl-textfield__label' for='contactSecondaryPhone'>Secondary Phone</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-6">
            <div id="floatingEmail" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactEmail' class='mdl-textfield__input' onfocus="addEmailFocus()" onblur="removeEmailFocus()" name='contactEmail' type='text'/>
                <label class='mdl-textfield__label' for='contactEmail'>Email</label>
            </div>
        </div>

        <div class="col-sm-6">
            <div id="floatingRelationship" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactRelationToStudent' class='mdl-textfield__input' onfocus="addContactRelationToStudentFocus()" onblur="removeContactRelationToStudentFocus()" name='contactRelationToStudent' type='text'/>
                <label class='mdl-textfield__label' for='contactRelationToStudent'>Relationship To Student</label>
            </div>
        </div>
    </div>
    <h4 class='heading'><i class='fa fa-home'></i> Address</h4>
    <div class='blue-line-color'></div>
    <div class='form-group'>
        <div class='col-sm-6'>
            <div id="floatingAddressOne" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactAddressOne' class='mdl-textfield__input' onfocus="addAddressOneFocus()" onblur="removeAddressOneFocus()" name='contactAddressOne' type='text'/>
                <label class='mdl-textfield__label' for='contactAddressOne'>Address</label>
            </div>
        </div>
        <div class='col-sm-6'>
            <div id="floatingAddressTwo" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactAddressTwo' class='mdl-textfield__input' onfocus="addAddressTwoFocus()" onblur="removeAddressTwoFocus()" name='contactAddressTwo' type='text'/>
                <label class='mdl-textfield__label' for='contactAddressTwo'>Apt/Suite</label>
            </div>
        </div>
    </div>
    <div class='form-group'>
        <div class='col-sm-4'>
            <div id="floatingCity" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactCity' class='mdl-textfield__input' onfocus="addCityFocus()" onblur="removeCityFocus()" name='contactCity' type='text'/>
                <label class='mdl-textfield__label' for='contactCity'>City</label>
            </div>
        </div>
        <div class='col-sm-4'>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
                <input type="text" class="mdl-textfield__input"
                       id="contactState" readonly>
                <input type="hidden" value="" name="contactState">
                <i class="mdl-icon-toggle__label fa fa-caret-down"></i>
                <label for="contactState" class="mdl-textfield__label">State</label>
                <ul id="contactState"
                    class="overflow mdl-menu mdl-menu--bottom-left mdl-js-menu">
                    <?php include("../scripts/States.php");
                    echo stateDropdown("contactState")
                    ?>
                </ul>
            </div>
        </div>
        <div class='col-sm-4'>
            <div id="floatingZipCode" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactZip' class='mdl-textfield__input' onfocus="addZipCodeFocus()" onblur="removeZipCodeFocus()" name='contactZip' type='text'/>
                <label class='mdl-textfield__label' for='contactZip'>Zip Code</label>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../../js/modals/show-tables/DynamicInputStyles.js"></script>