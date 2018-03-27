<link rel="stylesheet" href="../../css/input-stylings.css"/>
<form class="form-horizontal col-sm-12" action="../add/AddContact.php" method="POST" name="newContactForm" id="newContactForm">
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
            <div id="floatingMiddleName" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactMiddleName' class='mdl-textfield__input' onfocus="addMiddleNameFocus()" onblur="removeMiddleNameFocus()" name='contactMiddleName' type='text'/>
                <label class='mdl-textfield__label' for='contactMiddleName'>Middle Name</label>
            </div>
        </div>

        <div class='col-sm-6'>
            <div id="floatingSuffix" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactSuffix' class='mdl-textfield__input' onfocus="addSuffixFocus()" onblur="removeSuffixFocus()" name='contactSuffix' type='text'/>
                <label class='mdl-textfield__label' for='contactSuffix'>Suffix</label>
            </div>
        </div>
    </div>
    <h4 class='heading'><i class='glyphicon glyphicon-home'></i> Address</h4>
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
            <label for='state'>State:</label>
            <?php
            include("States.php");
            $output = '';
            echo stateDropdown();
            ?>
        </div>
        <div class='col-sm-4'>
            <div id="floatingZipCode" class='mdl-textfield mdl-js-textfield mdl-textfield--floating-label'>
                <input id='contactZip' class='mdl-textfield__input' onfocus="addZipCodeFocus()" onblur="removeZipCodeFocus()" name='contactZip' type='text'/>
                <label class='mdl-textfield__label' for='contactZip'>Zip Code</label>
            </div>
        </div>
    </div>
</form>

<script defer src="../../node_modules/pretty-dropdowns/dist/js/jquery.prettydropdowns.js"></script>
<script>
    $(document).ready(function () {
        $dropdown = $('select').prettyDropdown({
            height: 40,
            classic: true
        });
    });
    // When <select> state changes...
    $dropdown.refresh();
</script>
<script type="text/javascript" src="../../js/ajax-inputs.js"></script>