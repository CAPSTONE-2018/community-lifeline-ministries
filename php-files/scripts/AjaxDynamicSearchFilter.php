<?php
$dynamicSearchFilterId = $_POST['dynamicSearchFilter'];
?>
<div class="form-group">
<div class="col-sm-6">
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input id="searchInput <?php echo $dynamicSearchFilterId; ?>" class="mdl-textfield__input"
               name="searchInput<?php echo $dynamicSearchFilterId; ?>" type="text"/>
        <label class="mdl-textfield__label" for="searchInput<?php echo $dynamicSearchFilterId; ?>">Search Filter</label>
    </div>
</div>
<div class="col-sm-6 ">
    <div id="floatingFilterLabel<?php echo $dynamicSearchFilterId; ?>"
            class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select">
        <input type="text" value="First Name" class="mdl-textfield__input" id="FilterType<?php echo $dynamicSearchFilterId; ?>" readonly>
        <input type="hidden" value="" name="FilterType<?php echo $dynamicSearchFilterId; ?>">
        <i class="mdl-icon-toggle__label glyphicon glyphicon-chevron-down"></i>
        <label for="FilterType<?php echo $dynamicSearchFilterId; ?>" class="mdl-textfield__label">Filter Type</label>
        <ul for="FilterType<?php echo $dynamicSearchFilterId; ?>" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
            <li class="mdl-menu__item" data-val="First_Name">First Name</li>
            <li class="mdl-menu__item" data-val="Last_Name">Last Name</li>
            <li class="mdl-menu__item" data-val="Address_one">Address One</li>
            <li class="mdl-menu__item" data-val="Address_two">Address Two</li>
            <li class="mdl-menu__item" data-val="City">City</li>
            <li class="mdl-menu__item" data-val="State">State</li>
            <li class="mdl-menu__item" data-val="Zip">Zip</li>
            <li class="mdl-menu__item" data-val="Ethnicity">Ethnicity</li>
            <li class="mdl-menu__item" data-val="Birth_Date">Birth Date</li>
            <li class="mdl-menu__item" data-val="School">School</li>
        </ul>
    </div>
</div>
</div>

